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
        Schema::table('barang', function (Blueprint $table) {
            $table->date('date_in')->nullable()->after('quantity_in');
            $table->date('date_out')->nullable()->after('quantity_out');
        });
    }

    public function down()
    {
        Schema::table('barang', function (Blueprint $table) {
            $table->dropColumn(['date_in', 'date_out']);
        });
    }
};
