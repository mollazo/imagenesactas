@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.8.0/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" />
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
                        <!-- <form action="/acta/{{$acta->id}}/imagenes" method="POST">
                            {{ csrf_field() }}
                            <label for="exampleFormControlSelect1">Seleccione tipo de acta</label>
                            <select class="" name="tipo"id="exampleFormControlSelect1">
                                <option value="departamental" selected>Departamental</option>
                                <option value="municipal">Municipal</option>
                            </select>
                            <button type="submit">hola</button>

                        </form> -->
                        <form action="/acta/{{$acta->id}}/imagenes"
                            class="dropzone" id="my-awesome-dropzone">
                            {{ csrf_field() }}
                            <label for="exampleFormControlSelect1">Seleccione tipo de acta</label>
                            <select class="" name="tipo"id="exampleFormControlSelect1">
                                <option value="departamental" selected>Departamental</option>
                                <option value="municipal">Municipal</option>
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

@endsection