<?php
namespace App\Http;

use MyCLabs\Enum\Enum;

class CodeBook extends Enum
{

    /**
     * Esses são os estados possíveis para um formulário
     * Para inserir um novo estado, basta adicionar um novo item no array mantendo o padrão
     * 
     * 
     * Nenhuma alteração deve ser feita nos itens já existentes
     * 
     * 
     * O código do estado deve ser único e não pode ser alterado
     * Adiocione no padrão camelCase.
     * 
     */
    const Aberto = 1;
    const Fechado = 2;
    const Pendente = 3;
    const Aprovado = 4;
    const Reprovado = 5;
    const Cancelado = 6;
    const Aguardando = 7;
    const EmAndamento = 8;
    const Finalizado = 9;
    const EmAnalise = 10;
    
}
