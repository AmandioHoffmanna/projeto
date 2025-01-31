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
            $table->dropColumn(['nome', 'email', 'telefone']); // Remova as colunas que já existem em users
            $table->unsignedBigInteger('user_id'); // Adicione a referência ao id da tabela users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('data_horario')->nullable()->change(); // Ajuste o campo data_horario para permitir nulos
            $table->string('descricao')->nullable(); // Nova coluna para descrição do compromisso
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('agenda', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('descricao');
            $table->string('nome')->nullable();
            $table->string('email')->nullable();
            $table->string('telefone')->nullable();
        });
    }
};
