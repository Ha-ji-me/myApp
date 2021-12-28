<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUserIdToIncidentPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incident_posts', function (Blueprint $table) {
            //追加カラム
            $table->unsignedBigInteger('user_id')->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incident_posts', function (Blueprint $table) {
            //ロールバック時の処理
            $table->dropColumn('user_id');
        });
    }
}
