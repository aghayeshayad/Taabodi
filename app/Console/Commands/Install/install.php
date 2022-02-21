<?php

namespace App\Console\Commands\Install;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Nwidart\Modules\Facades\Module;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $this->info('Install reboot project');
        $this->info('Migrations freshed');
        $this->call('migrate:fresh');
        $this->info('Creating root user');
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'mobile' => '09398084577',
            'password' => Hash::make('kachar'),
            'verified' => '1'
        ]);

        $role = Role::create(['name' => 'Admin']);

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);

        $admin->assignRole([$role->id]);

        $this->info('Created root user');
        $this->info('Run Seeders');
        $this->call("module:seed");
        $this->call("db:seed");
        $this->info('Running Seeders');
    }

}
