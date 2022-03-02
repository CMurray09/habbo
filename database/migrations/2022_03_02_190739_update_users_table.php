<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('current_team_id');
            $table->dropColumn('profile_photo_path');
            $table->dropColumn('email');
            $table->dropColumn('email_verified_at');
            $table->string('username')->unique();
            $table->string('habboname')->unique();
            $table->string('role')->default(Role::STANDARD->value);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->dropColumn('username');
            $table->dropColumn('habboname');
            $table->dropColumn('role');
        });
    }
};
