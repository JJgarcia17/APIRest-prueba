<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('corporate_id');
            $table->string('S_nombre', 45);
            $table->string('S_puesto', 45);
            $table->string('S_comentarios', 255)->nullable();
            $table->string('S_telefono_fijo', 30)->nullable();
            $table->string('S_telefono_movil', 30)->nullable();
            $table->string('S_email', 45);

            $table->foreign('corporate_id')
            ->references('id')
            ->on('corporates')
            ->ondelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('corporate_contacts');
    }
}
