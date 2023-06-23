<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
        CREATE VIEW cidade_bairro_cep_view AS
        SELECT cidades.id, cidades.nome AS cidade,cidades.estado AS estado,cidades.data_fundacao AS data_fundacao, bairros.nome AS bairro, ceps.cep AS cep, ceps.rua AS rua
        FROM cidades
        LEFT JOIN bairros ON cidades.id = bairros.cidade_id
        LEFT JOIN ceps ON bairros.id = ceps.bairro_id;
    ");
    }

    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS cidade_bairro_cep_view");
    }
};
