<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    DB::statement("
        CREATE VIEW cidade_bairro_view AS
        SELECT cidades.id, cidades.nome, cidades.estado, cidades.data_fundacao, bairros.nome AS bairro_nome
        FROM cidades
        LEFT JOIN bairros ON cidades.id = bairros.cidade_id
    ");
}


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS cidade_bairro_view");
    }
    
};
