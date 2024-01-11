<?php

namespace App\Jobs;

use App\Enums\Imports\ImportSources;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\Imports\OpenLibraryTrait;

class ImportFromApiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    use OpenLibraryTrait;

    /**
     * Create a new job instance.
     */
    public function __construct(
        private ImportSources $source = ImportSources::OPEN_LIBRARY,
        private array $query = ['first_publish_year:[0 TO 2024]'],
    )
    {}

    /**
     * Execute the job.
     * @throws Exception
     */
    public function handle(): void
    {
        // validate if query array is key only and not key-value pair
        foreach ($this->query as $key => $value) {
            if (is_string($key)) {
                throw new Exception('Query array must not be key-value pair');
            }
        }

        // replace with switch statement once more sources are added
        if ($this->source == ImportSources::OPEN_LIBRARY) {
            $this->importOpenLibrary($this->query);
        }
    }
}
