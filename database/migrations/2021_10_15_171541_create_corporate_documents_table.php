<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_documents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('corporate_id');
            $table->unsignedBigInteger('documents_id');
            $table->string('S_archivo_url',255);

            $table->foreign('corporate_id')
                ->references('id')
                ->on('corporates')
                ->onDelete('Cascade')
                ->onUpdate('Cascade');

            $table->foreign('documents_id')
                ->references('id')
                ->on('documents')
                ->onDelete('Cascade')
                ->onUpdate('Cascade');
            
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
        Schema::dropIfExists('corporate_documents');
    }
}
