<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('servicios_experiencias', function (Blueprint $table) {
            //
$table->timestamps();
        });
    }

    /**
     * Esta funcion la podriamos aplicar para eliminar las columnas down()
     */
    public function down(): void
    {
        Schema::table('servicios_experiencias', function (Blueprint $table) {
            //
            $table->dropTimestamps();
        });
    }
};
