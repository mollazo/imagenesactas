@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.0/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />
<link href="{{ asset('css/lightgallery.min.css') }}" rel="stylesheet">
<style type="text/css">
.contenedor{
    position: relative;
    display: inline-block;
    text-align: center;
}
.texto-encima{
    position: absolute;
    top: 10px;
    left: 10px;
}
.centrado{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
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
                            <P>{{$acta->codigo}}</P>
                            
                        </div>
                        <div class="card-body">
                        @if(!isset($imagenes))
                        <div class="row justify-content-center mt-2">
                            <div class="alert alert-danger col-6" role="alert">
                                No tiene imagenes que mostrar
                            </div>
                        </div>
                        @else
                        <div id="aniimated-thumbnials ">
                        @foreach($imagenes as $imagen)
                        
                            <!-- <a href="http://localhost/imagenesactas/public{{$imagen->url}}" > -->
                                <div class="contenedor">
                                <img src="{{$imagen->url_path}}" width="200" height="200" />
                                <div class="centrado " style="color:black;font-size: x-large;font-weight: bold;" >{{$imagen->tipo}}</div>
                                </div>                         
                        @endforeach
                        </div>
                        <BR></BR>
                        @endif
                        <!-- <form action="{{ route('upload', ['id' => $acta->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <label for="exampleFormControlSelect1">Seleccione tipo de acta</label>
                            <select class="" name="tipo"id="exampleFormControlSelect1">
                                <option value="departamental" selected>Departamental</option>
                                <option value="municipal">Municipal</option>
                            </select>
                            <button type="submit">hola</button>

                        </form> -->
                        <form action="{{ route('upload', ['id' => $acta->id]) }}"
                            class="dropzone" id="my-awesome-dropzone">
                        
                            {{ csrf_field() }}
                            <label for="exampleFormControlSelect1">Seleccione tipo de acta</label>
                            <select class="" name="tipo"id="exampleFormControlSelect1">
                                <option value="Departamental" selected>Departamental</option>
                                <option value="Municipal">Municipal</option>
                            </select>
                        </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.0/min/dropzone.min.js"></script>
<script>
    Dropzone.options.myAwesomeDropzone={
        dictDefaultMessage: "Arrastre una imagen al recuadro para subir",
        acceptedFiles: "image/*",
    };
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="{{ asset('js/lightgallery-all.min.js')}}"></script>
<script src="{{ asset('js/jquery.mousewheel.min.js')}}"></script>


@endsection