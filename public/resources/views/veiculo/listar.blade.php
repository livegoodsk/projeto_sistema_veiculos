{{-- LAYOUT PRINCIPAL --}}
@extends("layouts/app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Veículos!</h3>
            </div>
        </div>


        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Placa</th>
                <th scope="col">Renavam</th>
                <th scope="col">Modelo</th>
                <th scope="col">Marca</th>
                <th scope="col">Ano</th>
                <th scope="col">Proprietário</th>
                <th scope="col">Ação</th>
            </tr>
            </thead>

            <tbody>
                @if( isset($veiculos) )
                    @foreach($veiculos as $veiculo)
                        <tr>
                            <th scope="row">{{$veiculo->id}}</th>
                            <td>{{$veiculo->placa}}</td>
                            <td>{{$veiculo->renavam}}</td>
                            <td>{{$veiculo->modelo}}</td>
                            <td>{{$veiculo->marca}}</td>
                            <td>{{$veiculo->ano}}</td>
                            <td>{{$veiculo->proprietario}}</td>
                            <td>
                                <a href="{{url("veiculo/" . $veiculo->id )}}" type="button" class="btn btn-primary">Editar</a>
                                <a href="{{url("veiculo/excluir/" . $veiculo->id )}}" type="button" class="btn btn-danger">Excluir</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection