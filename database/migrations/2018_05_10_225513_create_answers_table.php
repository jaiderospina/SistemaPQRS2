<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id')->unsigned();
            $table->integer('attached_document_id')->unsigned();
            $table->integer('user_id')->unsigned(); 
            
            //--Foreign Key 
            $table->foreign('document_id')->references('id')->on('documents')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('attached_document_id')->references('id')->on('attached_documents')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');            
            //--Foreign Key
                        
            $table->text('answer');
            
            //--Campos por defecto.
            $table->softDeletes();
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
        Schema::dropIfExists('answers');
    }
}
