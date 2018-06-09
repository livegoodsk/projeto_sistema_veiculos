<?php

namespace FederalSt\Model;

use FederalSt\Events\Event;
use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{

    protected $table  = 'veiculos';
    protected $primaryKey   = 'id';
    protected $fillable     = ['placa','renavam','modelo','marca','ano','proprietario'];
    public $timestamps      = false;


    public function user()
    {
        return $this->belongsTo(User::class,"proprietario");
    }



    public function salvar(Array $dados)
    {
        try{
            $registro =  $this->query()->create($dados);

            $user = (new User())->listarUm($registro->proprietario);
            event(new Event($user));

            return $registro;

        } catch (\Exception $e){
            return false;
        }
    }


    public function listar($dados)
    {
        $query = $this->query()
            ->with("user:id,name");

        if(!empty($dados['id']) )
        {
            $id = (int) $dados['id'];
            $query->where('proprietario',"=",$id);
        }

        return $query->get();
    }


    public function listarUm($id)
    {
        return $this->query()->find($id);
    }


    public function atualizar($id,Array $dados)
    {
        try{
            $registro = $this->listarUm($id);

            if( $registro ){
                $user = (new User())->listarUm($registro->proprietario);
                event(new Event($user));

                return $registro->fill($dados)->save();
            }

            return null;
        } catch (\Exception $e){
            false;
        }

    }

    public function excluir($id)
    {
        $registro = $this->listarUm($id);

        if($registro)
            return $registro->delete();

        return null;
    }


}