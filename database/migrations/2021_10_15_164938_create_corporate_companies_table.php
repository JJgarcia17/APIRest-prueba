<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corporate_id');
            $table->string('S_razon_social', 150);
            $table->string('S_rfd', 13);
            $table->string('S_pais', 75)->nullable();
            $table->string('S_estado', 75)->nullable();
            $table->string('S_municipio', 75)->nullable();
            $table->string('S_colonia_localidad', 75)->nullable();
            $table->string('S_domicilio', 100)->nullable();
            $table->string('S_codigo_postal', 75)->nullable();
            $table->string('S_uso_cfdi', 45)->nullable();
            $table->string('S_url_rfc', 255)->nullable();
            $table->string('S_url_acta_constitutiva', 255)->nullable();
            $table->boolean('activo')->nullable()->default(true);
            $table->string('S_comentarios', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('corporate_id')
            ->references('id')
            ->on('corporates')
            ->ondelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporate_companies');
    }
}
