<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PHPMailer\PHPMailer\Exception;

class OrganizationsSeeder extends Seeder
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
            foreach ($this->pool() as $organization){
                \App\Models\Organization::create([
                    'name'=>$organization
                ]);
            }
            \DB::commit();
        }catch (Exception $e){
            \DB::rollBack();
        }
    }

    protected function pool():array
    {
        return [
            'UNIPI',
            'ACTA',
            'IFV',
            'IDELE',
            'IFIP',
            'CNR',
            'SZE',
            'AEIDL',
            'CIHEAM-',
            'IAMB',
            'EV ILVO',
            'ELGO-',
            'DEMETER',
            'CZU',
            'AUA',
            'BIOS',
            'UL',
            'ZSA',
            'UNI HOHENHEIM',
            'NEWEDU',
            'INRAE',
            'Institut Agro',
            'SUST',
            'BSC',
            'AGFT',
            'Pec. Toscano',
            'EMU',
            'CSITA',
            'ISO-TECH',
            'UCO',
            'UAL',
            'COEXPHAL',
            'WR',
            'LIT OUESTEREL',
            'HUTTON',
        ];
    }
}
