<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     *
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username' ,45);
            $table->string('email',45)->unique();
            $table->string('password',100);
            $table->string('S_nombres',45)->nullable();
            $table->string('S_apellidos',45)->nullable();
            $table->string('S_foto_perfil_url',255)->nullable();
            $table->boolean('S_activo')->nullable()->default(true);
            $table->string('verifed',191);
            $table->string('verification_token',191)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
}
