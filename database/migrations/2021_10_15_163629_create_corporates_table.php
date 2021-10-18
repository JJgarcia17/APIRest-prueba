<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('S_nombre_corto', 45);
            $table->string('S_nombre_completo', 45);
            $table->string('S_logo_url', 255)->nullable();
            $table->string('S_db_name', 45);
            $table->string('S_db_usuario', 45);
            $table->string('S_db_password', 45);
            $table->string('S_system_url', 255);
            $table->boolean('S_activo')->nullable()->default(true);
            $table->dateTime('D_fecha_incorporacion');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('corporates');
    }
}
