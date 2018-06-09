<?php

namespace FederalSt\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table  = 'users';

    public function listar(Array $dados = [])
    {
        $query = $this->query();

        if(!empty($dados['id']) )
        {
            $id = (int) $dados['id'];
            $query->where('id',"=",$id);
        }
        
        return $query->get();
    }


    public function listarUm($id)
    {
        return $this->query()->find($id);
    }


}
