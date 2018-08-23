<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index();//推荐人id
            $table->unsignedInteger('musician_id')->index();//音乐人id
            $table->string('name');//歌曲名字
            $table->string('brief');//精选歌词
            $table->text('lyric');//歌词
            $table->text('recommendation');//推荐语
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
        Schema::dropIfExists('songs');
    }
}
