<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAnggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('kegiatan_id');
            $table->foreignId('kegiatan_id')
                ->constrained('kegiatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('uraian');
            $table->integer('volume');
            $table->string('satuan');
            $table->integer('harga_satuan');
            $table->integer('jumlah_total');
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
        Schema::dropIfExists('anggaran');
    }
}
