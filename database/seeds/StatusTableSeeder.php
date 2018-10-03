<?php

use Illuminate\Database\Seeder;
use App\Models\Cats\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Status::insert([
            ['description' => 'Active','created_at'=>date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')],
            ['description' => 'Pending','created_at'=>date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')],
            ['description' => 'Approved','created_at'=>date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')],
            ['description' => 'Cancelled','created_at'=>date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')],
            ['description' => 'Finished','created_at'=>date('Y-m-d H:i:s'),'updated_at'=> date('Y-m-d H:i:s')]
        ]);
    }
}
