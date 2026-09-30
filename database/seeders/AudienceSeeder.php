<?php

namespace Database\Seeders;

use App\Models\Audience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AudienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            \DB::beginTransaction();
            foreach ($this->pool() as $audience_name)
            {
                Audience::create([
                    'name'=>$audience_name
                ]);
            }

            DB::commit();
        }catch (\Exception $e)
        {
            DB::rollBack();
        }
    }

    private function pool():array
    {
        return [
            'Researcher',
            'Policy Maker',
            'Advisor',
            'Farmer/Forester',
            'Producer of Digital Technology',
        ];
    }
}
