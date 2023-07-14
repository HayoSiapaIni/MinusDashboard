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
        Schema::create('produks', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('nama_produk');
            $table->integer('harga_produk');
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->unsignedBigInteger('id_user');
            $table->string('varietas_produk');
            $table->string('panen_usia');
            $table->string('bobot_rata_rata');
            $table->string('ks_ruangan');
            $table->string('ks_kulkas');
            $table->string('pestisida');
            $table->text('deskripsi_produk');
            $table->string('kapasitas_produksi');
            $table->string('opsi_pengiriman');
            $table->string('photo_produk_1')->nullable();
            $table->string('photo_produk_2')->nullable();
            $table->string('photo_produk_3')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};


