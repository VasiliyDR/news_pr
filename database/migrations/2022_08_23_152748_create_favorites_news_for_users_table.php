<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesNewsForUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites_news_for_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('news_id');

            $table->index('user_id', 'favorites_news_for_users_user_idx');
            $table->index('news_id', 'favorites_news_for_users_news_idx');

            $table->foreign('user_id', 'favorites_news_for_users_user_fk')->on('users')->references('id');
            $table->foreign('news_id', 'favorites_news_for_users_news_fk')->on('news')->references('id');
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
        Schema::dropIfExists('favorites_news_for_users');
    }
}
