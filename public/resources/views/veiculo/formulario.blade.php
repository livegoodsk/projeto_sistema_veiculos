{{-- LAYOUT PRINCIPAL --}}
@extends(layout())

@section("content")
    <div class="container">
        <div class="row">
            <div class="col col-md-12">
                <h3>Cadastrar Veículo</h3>
            </div>
        </div>
        <form  action = "{{url("veiculos/cadastrar")}}" method = "post" name = "UserCreateForm">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col col-md-6">
                    <label for="FormInputPlaca">Placa:</label>

                    <input type="text" name="placa" title="Informe a placa do veículo" value="{{old("placa")}}" class="form-control" id="" aria-describedby="p" placeholder="Informe a placa">
                    @if ($errors->has("placa"))
                        <div class="has-error">
                            <span class="help-block"> {{ $errors->first("placa")}} </span>
                        </div>
                    @endif
                </div>

                <div class="form-group col col-md-6">
                    <label for="FormInputRenavam">Renavam</label>
                    <input type="text" name="renavam" class="form-control" value="{{old("renavam")}}" id="" placeholder="Informe o Renavam" >
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
                        <input type="text" name="modelo" class="form-control" value="{{old("renavam")}}" id="" placeholder="Informe o Modelo" >
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
                        <input type="text" name="marca" class="form-control"  value="{{old("marca")}}" id="" placeholder="Informe a Marca" >
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
                        <input type="text" name="ano" class="form-control" value="{{old("ano")}}" id="" placeholder="Informe o Ano" >
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
                        <input type="text" name="proprietario" class="form-control" value="{{old("proprietario")}}" id="" placeholder="Informe o Proprietário" >
                        @if ($errors->has("proprietario"))
                            <div class="has-error">
                                <span class="help-block"> {{ $errors->first("proprietario")}} </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit"  class="btn btn-primary">Cadastrar Veículo</button>
                </div>
            </div>

        </form>

    </div>
@endsection