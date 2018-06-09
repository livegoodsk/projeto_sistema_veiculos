@extends(layout())

@section('content')


 <div class="row">
         <div class="col-md-6 text-right">       
            <a href="{{url("veiculos/" )}}" type="button" class="btn btn-primary">Listar Veículos</a>
         </div>
   </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{trans('auth.logado')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
