<?php

use Illuminate\Database\Seeder;

class RekeningTujuan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('rekening_tujuan')->insert(array(
          array('rekening_tujuan' => 'BANK MUAMALAT<br>No. Rekening: 60.200.11.999<br>a/n: Irfan Mahfudz Guntur<br>Kode Transfer: 147')
          ));
    }
}
