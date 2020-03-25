<?php

namespace App\Console\Commands;

use App\Mail\SendMailable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class RegisteredUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registered:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia un correu amb el número de usuaris registrats';

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
     * @return mixed
     */
    public function handle()
    {
        $totalUsers = \DB::table('users')
        ->whereRaw('Date(created_at) = CURDATE()')
        ->count();

        Mail::to('mescoda97@gmail.com')->send(new SendMailable($totalUsers));
    }
}
