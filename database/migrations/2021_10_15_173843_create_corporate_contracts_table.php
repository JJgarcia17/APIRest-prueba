<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corporate_id');
            $table->dateTime('D_fecha_inicio');
            $table->dateTime('D_fecha_fin');
            $table->string('S_url_contrato')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('corporate_contracts');
    }
}
