<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Sertifikat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pojok', function (Blueprint $table) {
            $table->bigIncrements('idpojok');
            $table->string("namapojok")->unique();
            $table->timestamps();
        });

        Schema::create('konten', function (Blueprint $table) {
            $table->bigIncrements('idkonten');
            $table->integer("idpojok");
            $table->string("judul");
            $table->longText("isi");
            $table->date("tanggal");
            $table->string("gambar");
            $table->timestamps();
        });

        Schema::create('pengunjung', function (Blueprint $table) {
            $table->bigIncrements('idpengunjung');
            $table->String("namapengunjung");
            $table->enum("jk", ["L", "P"]);
            $table->String("alamat");
            $table->timestamps();
        });

        Schema::create('sertifikat', function (Blueprint $table) {
            $table->bigIncrements('idsertifikat');
            $table->string("nomor");
            $table->string("namapeserta");
            $table->string("file");
            $table->timestamps();
        });

        Schema::create('komentar', function (Blueprint $table) {
            $table->bigIncrements('idkomentar');
            $table->String("nama");
            $table->longText("komentar");
            $table->timestamps();
        });

        Schema::create('galeri', function (Blueprint $table) {
            $table->bigIncrements('idgaleri');
            $table->String("file");
            $table->String("judul");
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
        Schema::drop('pojok');
        Schema::drop('konten');
        Schema::drop('pengunjung');
        Schema::drop('sertifikat');
        Schema::drop('komentar');
        Schema::drop('galeri');
    }
}
