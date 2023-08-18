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
        Schema::create('pengguna', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->bigInteger('id_roles')->unsigned();
            $table->foreign('id_roles')->references('id')->on('roles')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('email');
            $table->string('password');
            $table->string('jk');
            $table->string('alamat');
            $table->bigInteger('no_telp');
            $table->char('foto');
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
