<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\KasabianPeminjaman;

class updateOverdue extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-overdue';

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
        $today = Carbon::now();

        KasabianPeminjaman::where('tanggalPengembalian', '<', $today)
            ->where('statusPeminjaman', '!=', 'Dikembalikan')
            ->update(['statusPeminjaman' => 'Terlambat']);

        $this->info('Overdue status updated successfully.');
    }
}
