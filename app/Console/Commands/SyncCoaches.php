<?php

namespace App\Console\Commands;

use App\Services\CoachSheetImporter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncCoaches extends Command
{
    protected $signature = 'coaches:sync';

    protected $description = 'Download the Google Sheet CSV and upsert coach rows.';

    public function handle(CoachSheetImporter $importer): int
    {
        $url = config('services.google_sheet.csv_url');

        if (! $url) {
            $this->error('GOOGLE_SHEET_CSV_URL is not set.');

            return self::FAILURE;
        }

        $this->info('Fetching sheet…');
        $response = Http::timeout(30)->get($url);

        if (! $response->ok()) {
            $this->error('Failed to download sheet: HTTP '.$response->status());

            return self::FAILURE;
        }

        $summary = $importer->importFromCsv($response->body());

        $this->info(sprintf(
            'Done. read=%d created=%d updated=%d skipped=%d',
            $summary['read'],
            $summary['created'],
            $summary['updated'],
            $summary['skipped']
        ));

        return self::SUCCESS;
    }
}
