<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_type',function(Blueprint $table){
            $table->id();
            $table->string('trans_code');//nyambung ke transaction, cuma ada 2
            $table->string('nama_transaksi');// cuma ada barang keluar dan barang masuk
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
