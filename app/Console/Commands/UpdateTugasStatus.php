<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateTugasStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-tugas-status';

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
        //
        $users = User::where('is_tugas', true)->get();

        foreach ($users as $user) {
            if ($user->tugas) {
                    if ($user->tugas->status == 'pending' && $user->tugas->tanggal_selesai < now()) {
                    $user->update([
                        'is_tugas' => false
                    ]);
                    $user->tugas->update([
                        'status' => 'tidak dikerjakan'
                    ]);
                } elseif ($user->tugas->status == 'dikerjakan' && $user->tugas->tanggal_selesai < now()) {
                    $user->update([
                        'is_tugas' => false
                    ]);
                    $user->tugas->update([
                        'status' => 'tidak selesai'
                    ]);
            }
        }

        return Command::SUCCESS;
    }
}
}