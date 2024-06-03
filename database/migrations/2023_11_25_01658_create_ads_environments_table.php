<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultingEnvironmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads_environments', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('cod_verif_dom_facebook');
            $table->string('cod_header_facebook');
            $table->string('cod_body_google');
            $table->string('cod_header_google');
            $table->text('PiexelPageViwer')->nullable();
            $table->text('PiexelAddToCart')->nullable();
            $table->text('PiexelPurchase')->nullable();
            
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads_environments');
    }
}
