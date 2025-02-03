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
        Schema::table('agenda', function (Blueprint $table) {
            // Adicionando novas colunas
            $table->timestamp('fim')->nullable()->after('inicio');

            // Removendo a coluna desnecessária
            $table->dropColumn('data_horario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('agenda', function (Blueprint $table) {
            // Revertendo as alterações
            $table->dropColumn('fim');
            $table->timestamp('data_horario')->nullable();
        });
    }
};