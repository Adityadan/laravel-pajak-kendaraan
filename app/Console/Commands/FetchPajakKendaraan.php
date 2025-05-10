<?php

namespace App\Console\Commands;

use App\Models\Kendaraan;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchPajakKendaraan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-pajak-kendaraan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $response = Http::get('https://tech-test-kominfo-api.fly.dev/v1/bapenda/kendaraan');
            $data = $response->json('data');
            foreach ($data as $item) {
                Kendaraan::updateOrCreate(
                    ['plat_nomor' => $item['plat_nomor']],
                    $item
                );
            }
            return 0; // Return code 0 for success
        } catch (\Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
            return 1; // Return code 1 for error
        }
    }
}
