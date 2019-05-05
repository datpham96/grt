<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('post_business')) {
            Schema::create('post_business', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('business_id');
                $table->string('name');
                $table->string('description');
                $table->longText('content');
                $table->string('avatar');
                $table->integer('total_view')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_business');
    }
}
