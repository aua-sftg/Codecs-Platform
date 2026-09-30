<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PHPMailer\PHPMailer\Exception;

class DataFormatSeeder extends Seeder
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

            foreach ($this->pool() as $format){
                \App\Models\DataFormat::create([
                    'name'=>$format
                ]);
            }
            \DB::commit();
        }catch (Exception $e){
            \DB::rollBack();
        }
    }

    private function pool():array
    {
        return [
            'PDF',
            'ODP',
            'PPT',
            'PPTX',
            'CSV',
            'TXT',
            'HTML',
            'MP4',
            'TIFF',
            'PNG',
        ];
    }
}
