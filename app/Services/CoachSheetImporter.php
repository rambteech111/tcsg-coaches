<?php

namespace App\Services;

use App\Models\Coach;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use League\Csv\Reader;

class CoachSheetImporter
{
    private const COLUMNS = [
        'submission_date' => 'Submission Date',
        'first_name' => 'Name - First Name',
        'last_name' => 'Name - Last Name',
        'website' => 'Website',
        'linkedin' => 'LinkedIn',
        'instagram' => 'Instagram',
        'youtube' => 'YouTube',
        'bio' => 'In 350 words or less, share a bio',
        'certifications' => 'Please list all professional coaching',
        'client_levels' => 'What level(s) of client do you most often work with',
        'topics' => 'Topics on which you typically coach',
        'specializations' => 'Do you have any industry specializations',
        'primary_style' => 'We have all different parts to us',
        'secondary_style' => 'Please choose what feels like a strong #2',
        'rate' => 'What would you like to charge for a 60-minute session',
        'submission_id' => 'Submission ID',
        'status' => 'Status',
    ];

    public function importFromCsv(string $csvContent): array
    {
        $reader = Reader::createFromString($csvContent);
        $reader->setHeaderOffset(0);

        $headers = $reader->getHeader();
        $columnMap = $this->resolveColumns($headers);

        $read = 0;
        $created = 0;
        $updated = 0;
        $skipped = 0;

        foreach ($reader->getRecords() as $record) {
            $read++;

            $submissionId = trim((string) ($record[$columnMap['submission_id']] ?? ''));
            if ($submissionId === '') {
                $skipped++;
                continue;
            }

            $attributes = $this->mapRow($record, $columnMap);

            $existing = Coach::where('submission_id', $submissionId)->first();

            if ($existing) {
                $attributes['slug'] = $existing->slug;
                $existing->fill($attributes)->save();
                $updated++;
            } else {
                $attributes['slug'] = $this->generateSlug(
                    $attributes['first_name'] ?? '',
                    $attributes['last_name'] ?? '',
                    $submissionId
                );
                Coach::create($attributes);
                $created++;
            }
        }

        return compact('read', 'created', 'updated', 'skipped');
    }

    private function resolveColumns(array $headers): array
    {
        $map = [];
        foreach (self::COLUMNS as $key => $needle) {
            $match = null;
            foreach ($headers as $header) {
                if (stripos($header, $needle) !== false) {
                    $match = $header;
                    break;
                }
            }
            if ($match !== null) {
                $map[$key] = $match;
            }
        }

        return $map;
    }

    private function mapRow(array $record, array $columnMap): array
    {
        $get = fn (string $key): string => trim((string) ($record[$columnMap[$key] ?? ''] ?? ''));

        $statusRaw = strtolower($get('status'));
        $status = in_array($statusRaw, ['active', 'declined', 'pending'], true)
            ? $statusRaw
            : 'pending';

        return [
            'submission_id' => $get('submission_id'),
            'first_name' => $get('first_name'),
            'last_name' => $get('last_name'),
            'website' => $get('website') ?: null,
            'linkedin' => $get('linkedin') ?: null,
            'instagram' => $get('instagram') ?: null,
            'youtube' => $get('youtube') ?: null,
            'bio' => $this->normalizeBio($get('bio')),
            'certifications' => $this->splitList($get('certifications'), splitOnComma: true),
            'client_levels' => $this->splitList($get('client_levels')),
            'topics' => $this->splitList($get('topics')),
            'specializations' => $this->splitList($get('specializations')),
            'coaching_style' => $this->mapStyle($get('primary_style'), context: 'primary'),
            'secondary_style' => $this->mapStyle($get('secondary_style'), context: 'secondary'),
            'session_rate' => $this->parseRate($get('rate')),
            'status' => $status,
        ];
    }

    public function normalizeBio(string $raw): ?string
    {
        if ($raw === '') {
            return null;
        }

        return str_replace(["\r\n", "\r"], "\n", $raw);
    }

    public function splitList(string $raw, bool $splitOnComma = false): array
    {
        if ($raw === '') {
            return [];
        }

        $pattern = $splitOnComma ? "/[\r\n,]+/" : "/[\r\n]+/";
        $parts = preg_split($pattern, $raw) ?: [];

        return array_values(array_filter(
            array_map('trim', $parts),
            fn ($part) => $part !== ''
        ));
    }

    public function mapStyle(string $raw, string $context = 'primary'): ?string
    {
        if ($raw === '') {
            return null;
        }

        $lower = strtolower($raw);

        if (str_contains($lower, 'action')) {
            return 'fast-track';
        }
        if (str_contains($lower, 'compassion')) {
            return 'heart-first';
        }
        if (str_contains($lower, 'research') || str_contains($lower, 'data')) {
            return 'game-plan';
        }
        if (str_contains($lower, 'structure')) {
            return 'deep-dive';
        }

        Log::warning('Unmapped coaching style', [
            'context' => $context,
            'value' => $raw,
        ]);

        return null;
    }

    public function parseRate(string $raw): int
    {
        if ($raw === '') {
            return 0;
        }

        $cleaned = preg_replace('/[^\d.]/', '', $raw) ?? '';
        if ($cleaned === '') {
            return 0;
        }

        return (int) $cleaned;
    }

    public function generateSlug(string $first, string $last, string $submissionId): string
    {
        $base = Str::slug(trim($first.' '.$last)) ?: Str::slug($submissionId);

        if (! Coach::where('slug', $base)->exists()) {
            return $base;
        }

        return $base.'-'.Str::slug($submissionId);
    }
}
