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
            $table->string('titulo', 255)->after('id')->nullable(false);
            $table->timestamp('inicio')->after('titulo')->nullable(false);
            $table->timestamp('fim')->after('inicio')->nullable(false);

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
            $table->dropColumn('titulo');
            $table->dropColumn('inicio');
            $table->dropColumn('fim');
            $table->timestamp('data_horario')->nullable();
        });
    }
};