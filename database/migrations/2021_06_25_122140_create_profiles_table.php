<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('profile_image',200)->nullable();
            $table->string('profile_banner',200)->nullable();
            $table->string('mobile');
            $table->string('email',200);
            $table->string('facebook',200)->nullable();
            $table->string('linkedin',200)->nullable();
            $table->string('github',200)->nullable();
            $table->string('twitter',200)->nullable();
            $table->string('address',200)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
