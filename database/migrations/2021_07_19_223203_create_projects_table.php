<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->timestamp('deadline')->nullable();
            $table->string('alamat_api')->nullable();
            $table->text('deskripsi')->nullable();
            $table->integer('himpunan_tim')->nullable();
            $table->string('website')->nullable();
            $table->integer('kegunan')->nullable();
            $table->integer('akses_pelanggan')->nullable();
            $table->integer('penerimaan')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
