<?php

namespace App\Observers;

use App\Models\Cadastro;

class CadastroObserver
{

    public function creating(Cadastro $cadastro)
    {
        //Executa antes de criar no banco
    }

    public function created(Cadastro $cadastro)
    {
        //$festa->cliente->update(['status' => 'com-proposta']);
    }

    public function updating(Cadastro $cadastro)
    {
        /* if ($festa->valor > 0) {
            $festa->cliente->update(['status' => 'festa-agendada']);
        } */
    }

    public function updated(Cadastro $cadastro)
    {
        /* if ($festa->valor > 0) {
            $festa->cliente->update(['status' => 'festa-agendada']);
        } */
    }

    public function deleting(Cadastro $cadastro)
    {
        //Executa antes de deletar no banco
    }

    public function deleted(Cadastro $cadastro)
    {
        //$festa->cliente->update(['status' => 'sem-proposta']);
    }
}
