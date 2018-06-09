{{-- LAYOUT PRINCIPAL --}}
@extends(layout())

@section("content")

  @php          
            //Verifica se existe a variável $veiculo e se tem um veículo cadastrado!
            if(!empty($veiculo) ):
                $rota =  "editar/" . $veiculo->id; 
                $acao = 'Atualizar';                    
            else:
                $rota = 'cadastrar';  
                $acao = 'Cadastrar';             
            endif;
                
    @endphp
           

    <div class="container">
        <div class="row">
            <div class="col col-md-12">
                <h3>@php echo "{$acao} Veículo";   @endphp</h3>
            </div>
        </div>
      

        <form  action = "{{url("admin/veiculos/". $rota)}}" method = "post" name = "UserCreateForm">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col col-md-6">
                    <label for="FormInputPlaca">Placa:</label>

                    <input type="text" name="placa" title="Informe a placa do veículo" value="@if(isset($veiculo->placa)) {{$veiculo->placa}} @else {{old("placa")}} @endif"
                           class="form-control" id="" aria-describedby="p" placeholder="Informe a placa">
                    @if ($errors->has("placa"))
                        <div class="has-error">
                            <span class="help-block"> {{ $errors->first("placa")}} </span>
                        </div>
                    @endif
                </div>

                <div class="form-group col col-md-6">
                    <label for="FormInputRenavam">Renavam</label>
                    <input type="text" name="renavam" class="form-control" value="@if(isset($veiculo->renavam)) {{$veiculo->renavam}} @else {{old("renavam")}}@endif"
                           id="" placeholder="Informe o Renavam" >
                    @if ($errors->has("renavam"))
                        <div class="has-error">
                            <span class="help-block"> {{ $errors->first("renavam")}} </span>
                        </div>
                    @endif
                </div>
            </div>


            <div class="row">
                <div class="col col-md-6">
                    <div class="form-group">
                        <label for="FormInputModelo ">Modelo</label>
                        <input type="text" name="modelo" class="form-control" value="@if(isset($veiculo->modelo)) {{$veiculo->modelo}} @else {{old("modelo")}}@endif"
                               id="" placeholder="Informe o Modelo" >
                        @if ($errors->has("modelo"))
                            <div class="has-error">
                                <span class="help-block"> {{ $errors->first("modelo")}} </span>
                            </div>
                        @endif
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="FormInputMarca ">Marca</label>
                        <input type="text" name="marca" class="form-control"  value="@if(isset($veiculo->marca)) {{$veiculo->marca}} @else {{old("marca")}}@endif"
                               id="" placeholder="Informe a Marca" >
                        @if ($errors->has("marca"))
                            <div class="has-error">
                                <span class="help-block"> {{ $errors->first("marca")}} </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="FormInputAno">Ano</label>
                        <input type="text" name="ano" class="form-control" value="@if(isset($veiculo->ano)) {{$veiculo->ano}} @else {{old("ano")}}@endif"
                               id="" placeholder="Informe o Ano" >
                        @if ($errors->has("ano"))
                            <div class="has-error">
                                <span class="help-block"> {{ $errors->first("ano")}} </span>
                            </div>
                        @endif
                    </div>
                </div>


<div class="col-md-6">
                    <div class="form-group">
                        <label for="FormInputProprietario ">Proprietário </label>
                        <select name="proprietario" class="form-control">
                            @if(!empty($proprietarios) )
                                @foreach( $proprietarios as $proprietario )
                                    <option value="{{$proprietario->id}}"
                                        @if( isset($veiculo->proprietario) && $veiculo->proprietario ==  $proprietario->id) {{"selected"}} @endif
                                        @if( !empty(old("proprietario")) && old("proprietario") ==  $proprietario->id)) {{"selected"}} @endif
                                        >{{ $proprietario->name  }}
                                    </option>
                                @endforeach
                            @endif
                        </select>

                        @if ($errors->has("proprietario"))
                            <div class="has-error">
                                <span class="help-block"> {{ $errors->first("proprietario")}} </span>
                            </div>
                        @endif
                    </div>
                </div>            

            <div class="row">
                <div class="col-md-12 text-right">
                <a href="{{url("veiculos/" )}}" type="button" class="btn btn-primary">Listar</a>
                    <button type="submit"  class="btn btn-primary">{{$acao}} Veículo</button>
                </div>
            </div>

        </form>

    </div>
@endsection