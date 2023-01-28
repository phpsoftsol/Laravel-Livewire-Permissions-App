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
            $table->string('first_name', 50)
            ->after('password')
            ->nullable();
            $table->text('last_name', 50)
            ->after('first_name')
            ->nullable();
            $table->text('title')
            ->after('password')
            ->nullable();
            $table->string('mobile', 10)
            ->after('title')
            ->nullable();
              //
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
           $table->dropColumn('first_name');
           $table->dropColumn('last_name');
           $table->dropColumn('title');
           $table->dropColumn('mobile');
            //
        });
    }
};
