<?php

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if (App::enviroment() === 'production') {
            exit('I just stopped you getting fired. Love Phil');
        }

        Eloquent::unguard();
        $tables = ['users', 'merchants'];

        collect($tables)->each(function ($table) {
            DB::table($table)->truncate();
        });

        $this->call('UserTableSeeder');
        $this->call('MerchantTableSeeder');
    }
}
