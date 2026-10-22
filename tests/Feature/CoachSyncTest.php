<?php

namespace Tests\Feature;

use App\Models\Coach;
use App\Services\CoachSheetImporter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CoachSyncTest extends TestCase
{
    use RefreshDatabase;

    private function csv(): string
    {
        return file_get_contents(base_path('tests/fixtures/coaches.csv'));
    }

    public function test_importer_creates_rows_from_fixture(): void
    {
        app(CoachSheetImporter::class)->importFromCsv($this->csv());

        $this->assertSame(2, Coach::count());

        $laura = Coach::where('submission_id', 'SUB-001')->first();
        $this->assertNotNull($laura);
        $this->assertSame('active', $laura->status);
        $this->assertSame('Laura', $laura->first_name);

        $marco = Coach::where('submission_id', 'SUB-002')->first();
        $this->assertSame('pending', $marco->status);
    }

    public function test_only_active_coach_appears_on_directory(): void
    {
        app(CoachSheetImporter::class)->importFromCsv($this->csv());

        $response = $this->get('/coaches');

        $response->assertOk();
        $response->assertSeeText('Laura Example');
        $response->assertDontSeeText('Marco Pending');
    }

    public function test_profile_404s_for_non_active_coach(): void
    {
        app(CoachSheetImporter::class)->importFromCsv($this->csv());

        $marco = Coach::where('submission_id', 'SUB-002')->first();
        $this->get('/coaches/'.$marco->slug)->assertNotFound();
    }

    public function test_certifications_split_from_newlines_and_commas(): void
    {
        app(CoachSheetImporter::class)->importFromCsv($this->csv());

        $laura = Coach::where('submission_id', 'SUB-001')->first();
        $this->assertSame(['ICF ACC', 'Certified Career Coach', 'PMP'], $laura->certifications);
    }

    public function test_bio_paragraphs_render_as_separate_p_elements(): void
    {
        app(CoachSheetImporter::class)->importFromCsv($this->csv());

        $laura = Coach::where('submission_id', 'SUB-001')->first();
        $response = $this->get('/coaches/'.$laura->slug);

        $html = $response->getContent();

        // Both paragraphs are wrapped in <p>...</p> independently.
        $this->assertMatchesRegularExpression(
            '#<p[^>]*>\s*Laura has coached hundreds of clients\.\s*</p>#',
            $html,
            'First paragraph not wrapped in its own <p>'
        );
        $this->assertMatchesRegularExpression(
            '#<p[^>]*>\s*She focuses on executive career transitions\.\s*</p>#',
            $html,
            'Second paragraph not wrapped in its own <p>'
        );
    }

    public function test_style_keyword_mapping_covers_all_four(): void
    {
        $importer = new CoachSheetImporter;

        $this->assertSame('fast-track', $importer->mapStyle('I love action and momentum'));
        $this->assertSame('heart-first', $importer->mapStyle('compassion drives me'));
        $this->assertSame('game-plan', $importer->mapStyle('I value research and planning'));
        $this->assertSame('game-plan', $importer->mapStyle('data informs my work'));
        $this->assertSame('deep-dive', $importer->mapStyle('structure matters most'));
        $this->assertNull($importer->mapStyle('something unexpected'));
    }

    public function test_rate_stored_as_integer_and_client_price_is_plus_100(): void
    {
        app(CoachSheetImporter::class)->importFromCsv($this->csv());

        $laura = Coach::where('submission_id', 'SUB-001')->first();
        $this->assertSame(350, $laura->session_rate);
        $this->assertSame(450, $laura->client_price);

        $response = $this->get('/coaches/'.$laura->slug);
        $response->assertSeeText('$450 per 60-minute session');
    }

    public function test_hidden_fields_do_not_appear_on_any_public_page(): void
    {
        app(CoachSheetImporter::class)->importFromCsv($this->csv());

        $laura = Coach::where('submission_id', 'SUB-001')->first();

        foreach (['/coaches', '/coaches/'.$laura->slug] as $url) {
            $response = $this->get($url);
            $html = $response->getContent();

            // Strip inline <style> and <script> blocks so numeric CSS
            // values can't false-match. The regression check is about
            // user-visible rendered content.
            $rendered = preg_replace('#<(style|script)\b.*?</\1>#is', '', $html);

            $this->assertStringNotContainsString('laura@example.com', $rendered);
            $this->assertStringNotContainsString('555-0100', $rendered);
            $this->assertStringNotContainsString('10.0.0.1', $rendered);
            $this->assertStringNotContainsString('"client_count":250', $rendered);
            $this->assertStringNotContainsString('250 clients', $rendered);
            $this->assertStringNotContainsString('Transformed a VP', $rendered);
            $this->assertStringNotContainsString('jotform.com/edit', $rendered);
        }
    }

    public function test_sync_upserts_existing_rows(): void
    {
        $importer = app(CoachSheetImporter::class);
        $importer->importFromCsv($this->csv());

        $csv = str_replace('Laura', 'Lauren', $this->csv());
        $summary = $importer->importFromCsv($csv);

        $this->assertSame(2, Coach::count());
        $this->assertSame(2, $summary['updated']);
        $this->assertSame(0, $summary['created']);

        $laura = Coach::where('submission_id', 'SUB-001')->first();
        $this->assertSame('Lauren', $laura->first_name);
    }
}
