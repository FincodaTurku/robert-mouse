<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
 
        $this->call('Projects_table_seeder');
        $this->call('tasks_table_seeder');
    
        Model::reguard();
    }
}
