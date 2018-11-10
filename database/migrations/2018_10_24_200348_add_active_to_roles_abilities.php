<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActiveToRolesAbilities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->enum('active',['0','1'])->default(1)->after('scope');
        });

        Schema::table('abilities', function (Blueprint $table) {
            $table->enum('active',['0','1'])->default(1)->after('scope');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('active');
        });

        Schema::table('abilities', function (Blueprint $table) {
            $table->dropColumn('active');
        });
    }
}
