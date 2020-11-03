@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row py-2">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Agrega una Sucursal</h2>
            </div>
            <div class="text-right">
                <a class="btn btn-primary" href="{{ route('branches.index') }}"> Regresar</a>
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
   
    <form action="{{ route('branches.store') }}" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Nombre</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Telefono</label>
                <input type="text" class="form-control" name="phone">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Direccion</label>
            <input type="text" class="form-control col-md-8" name="address" placeholder="Col. Villas del Rosario">
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
                <label for="inputState">Comercio</label>
                <div>
                  <select class="form-control" name="shop_id" id="shop_id">
                    <option>Seleccionar</option>
                    @foreach($shops as $shop)
                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<!--Catalogos-->
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
    });
</script>

@endsection