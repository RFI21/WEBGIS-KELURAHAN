<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('bansos', function (Blueprint $table) {
        $table->integer('bpjs')->default(0);
    });
}

public function down()
{
    Schema::table('bansos', function (Blueprint $table) {
        $table->dropColumn('bpjs');
    });
}
};
