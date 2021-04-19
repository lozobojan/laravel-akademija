<?php

namespace App\Console\Commands;

use App\Models\ApplicationLog;
use App\Models\User;
use App\Notifications\CheckConnectionNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;


class CheckConnectionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:connection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks the connection to GOOGLE.COM';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $output = [];
        $result = 0;
        exec('ping google.com', $output, $result);
        ApplicationLog::query()->create([
            'output' => json_encode($output),
            'result' => $result
        ]);
        $admins = User::query()->where('is_admin', '=', true)->get();
        Notification::send($admins, new CheckConnectionNotification($output, $result));
//        foreach ($admins as $admin) {
//            $admin->notify(new CheckConnectionNotification($output, $result));
//        }
        return $result;
    }
}
