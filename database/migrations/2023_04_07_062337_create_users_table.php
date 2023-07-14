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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_hp');
            $table->boolean('is_seller');
            $table->string('lokasi_toko')->default('Buah Batu');
            $table->string('alamat_toko')->nullable();
            $table->string('nama_toko')->default('Toko Hidroponik');
            $table->string('photo_profile')->default('Farmer.jpg');
            $table->text('deskripsi')->nullable('Masukan deskripsi Toko Anda');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
