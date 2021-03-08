@extends('layouts.app')

@section('css')
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.2/css/lightgallery.css" /> -->
<link href="{{ asset('css/lightgallery.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row justify-content-center">
                        <form class="form-inline">
                        <input class="form-control" type="number" name="busqueda" placeholder="Introduzca Codigo" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                            
                        </form>
                    </div>
                    
                    @if(isset($acta))
                    <div class="card mt-3">
                        <div class="card-header">
                            <b>Provincia->Municipio->Localidad->Recinto->Mesa</b><br>
                            {{$acta->provincia}}->{{$acta->municipio}}->{{$acta->localidad}}->{{$acta->recinto}}->{{$acta->mesa}}
                            
                        </div>
                        <div class="card-body">
                        @if(!isset($imagenes))
                        <div class="row justify-content-center mt-2">
                            <div class="alert alert-danger col-6" role="alert">
                                No tiene imagenes que mostrar
                            </div>
                        </div>
                        @else
                        <div id="aniimated-thumbnials">
                        @foreach($imagenes as $imagen)
                            <a href="{{$imagen->url_path}}" >
                                <img src="{{$imagen->url_path}}" width="200" height="200" />
                            </a>
                        @endforeach
                        </div>
                        @endif
                        </div>                        
                    </div>
                    @elseif($msg!="")
                    <div class="row justify-content-center mt-2">
                    <div class="alert alert-danger col-6" role="alert">
                        {{$msg}}
                    </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="{{ asset('js/lightgallery-all.min.js')}}"></script>
<script src="{{ asset('js/jquery.mousewheel.min.js')}}"></script>
<script type="text/javascript">
$('#aniimated-thumbnials').lightGallery({
    thumbnail:true
});
</script>




@endsection