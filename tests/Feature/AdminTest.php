<?php

namespace Tests\Feature;

use App\Models\Coach;
use App\Services\CoachSheetImporter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'admin.email' => 'admin@test',
            'admin.password_hash' => password_hash('secret', PASSWORD_BCRYPT),
        ]);
    }

    public function test_admin_dashboard_requires_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_login_rejects_bad_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@test',
            'password' => 'wrong',
        ]);

        $response->assertSessionHasErrors('email');
    }

    public function test_login_succeeds_with_env_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@test',
            'password' => 'secret',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
    }

    public function test_dashboard_lists_all_coaches_regardless_of_status(): void
    {
        app(CoachSheetImporter::class)->importFromCsv(
            file_get_contents(base_path('tests/fixtures/coaches.csv'))
        );

        $response = $this->withSession(['admin' => true])->get('/admin');

        $response->assertOk();
        $response->assertSeeText('Laura Example');
        $response->assertSeeText('Marco Pending');
    }

    public function test_dashboard_shows_status_counts(): void
    {
        app(CoachSheetImporter::class)->importFromCsv(
            file_get_contents(base_path('tests/fixtures/coaches.csv'))
        );

        $response = $this->withSession(['admin' => true])->get('/admin');

        $html = $response->getContent();
        // Count tiles render as <b>N</b><span>Label</span>.
        $this->assertMatchesRegularExpression('#<b>1</b>\s*<span>Pending</span>#', $html);
        $this->assertMatchesRegularExpression('#<b>1</b>\s*<span>Active</span>#', $html);
    }

    public function test_admin_coach_detail_renders(): void
    {
        app(CoachSheetImporter::class)->importFromCsv(
            file_get_contents(base_path('tests/fixtures/coaches.csv'))
        );

        $laura = Coach::where('submission_id', 'SUB-001')->first();

        $response = $this->withSession(['admin' => true])
            ->get(route('admin.show', $laura));

        $response->assertOk();
        $response->assertSeeText('Laura Example');
        $response->assertSeeText('ICF ACC');
    }

    public function test_logout_clears_session(): void
    {
        $this->withSession(['admin' => true])
            ->post('/admin/logout')
            ->assertRedirect(route('admin.login'));

        $this->get('/admin')->assertRedirect('/admin/login');
    }
}
