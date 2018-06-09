{{-- LAYOUT PRINCIPAL --}}
@extends("layouts/app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Veículos!</h3>
            </div>
        </div>

        @if( !Gate::denies('isAdmin')  )
            <div class="row" style="margin-bottom: 20px">
                <div class="col col-md-12 text-right ">
                    <a href="{{ url("admin/veiculos/cadastrar") }}" class="btn btn-primary">Cadastrar</a>
                </div>
            </div>
        @endif


        <div class="row">
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
                    @if( !Gate::denies('isAdmin') )
                    <th scope="col">Ação</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                <!-- Verifica se a variável tem um valor truthy, pois
                a variável $veiculos já existe!
                -->
                @if( $veiculos )   
              

                    @foreach($veiculos as $veiculo)
                        <tr>
                            <th scope="row">{{$veiculo->id}}</th>
                            <td>{{$veiculo->placa}}</td>
                            <td>{{$veiculo->renavam}}</td>
                            <td>{{$veiculo->modelo}}</td>
                            <td>{{$veiculo->marca}}</td>
                            <td>{{$veiculo->ano}}</td>                          
                            <td>{{$veiculo->user->name}}</td>
                         
                            <td>
                     
                               
                               
                               
                            @if( !Gate::denies('isAdmin') )
                               
                                <a href="{{url("veiculos/editar/" . $veiculo->id )}}" type="button" class="btn btn-primary">Editar</a>
                               
                               
                               
                               
                               
                                <a href="{{ url("admin/veiculos/excluir/" . $veiculo->id)  }}" type="button" class="btn btn-danger">Excluir</a>

   @endif

                            </td>
                        
                        </tr>
                    @endforeach
             
                @endif
              
                </tbody>
                <a href="{{url("home/" )}}" type="button" class="btn btn-primary">Página Inicial</a>    
            </table>
        </div>


    </div>
@endsection