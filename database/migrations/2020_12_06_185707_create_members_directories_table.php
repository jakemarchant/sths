<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersDirectoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_directories', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('colour_1')->nullable();
            $table->string('colour_2')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->string('content_left')->nullable();
            $table->string('content_right')->nullable();
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
        Schema::dropIfExists('members_directories');
    }
}
