@extends('layouts.app')
@section('body-class', 'profile-page')
@section('content')


<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row py-2">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Agregar una Queja</h2>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-danger" href="{{ route('complains.index') }}"> Regresar</a>
                    </div>
                </div>
            </div>
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('complains.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <diV class="col-sm-7">
                    <div class="form-group label-floating">
                    <label class="control-label">Razon</label>
                
                    <input type="text" class="form-control" name="reason">
                
                    </div>
                </diV>
                <div class="col-sm-5">
                    <div class="form-group label-floating">
                    <label class="control-label">Solicitud</label>
                    <input type="text" class="form-control" name="request">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputState">Region</label>
                    <div>
                        <select class="form-control" id="region_id">
                        <option>Seleccionar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Departamento</label>
                    <div>
                        <select class="form-control" id="department_id">
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Municipalidad</label>
                    <div>
                        <select class="form-control" name="municipality_id"  id="municipality_id">
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Sucursal</label>
                    <div>
                        <select class="form-control" name="branch_id" id="branch_id">
                        </select>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>

    </div>
</div>

<!--Catalogos-->
<script src="{{asset ('js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/queries.js') }}" ></script>
<script>
    $(document).ready(function(){
      //Token para la peticion de sitios cruzados.
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      //Funciones a ejecutar
      regionelements();
      departmentelements();
      municipalityelements();
      branchelements();
    });
</script>

@endsection