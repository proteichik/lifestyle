<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Cerbero\CommandValidator\ValidatesInput;
use App\User;
use Auth;

class CreateUser extends Command
{
    use ValidatesInput;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ];
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => bcrypt($this->argument('password')),
            'is_admin' => true,
        ]);

        $this->info(sprintf('User created. Id: %s', $user->id));
    }
}
