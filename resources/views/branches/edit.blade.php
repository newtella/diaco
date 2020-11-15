@extends('layouts.app')

@section('body-class', 'profile-page')
@section('content')

<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Editar Sucursal</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('branches.index') }}"> Back</a>
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
  
    <form action="{{ route('branches.update',$branch->id) }}" method="POST">
        @csrf
        @method('PUT')
        

        <div class="form-row">
    <diV class="col-sm-7">
        <div class="form-group label-floating">
         <label class="control-label">Nombre</label>
    
        <input type="text" name="name" value="{{ $branch->name }}" class="form-control" placeholder="Nombre">
    
         </div>
    </diV>

    <div class="col-sm-5">
         <div class="form-group label-floating">
         <label class="control-label">Telefono</label>
    
          <input type="text" name="phone" value="{{ $branch->phone }}" class="form-control" placeholder="Telefono">
    
        </div>
    </div>

</div>

<div class="form-row">
   

    <div class="col-sm-12">
        <div class="form-group label-floating">
          <label class="control-label">Direccion</label>
          <input type="text" name="address" value="{{ $branch->address }}" class="form-control" placeholder="Direccion">
        </div>
    </div>
</div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="inputState">Region</label>
                <div>
                  <select class="form-control" id="region_id">
                    <option value="{{$branch->municipality->department->region->id}}" selected>{{$branch->municipality->department->region->name}}</option>
                    @foreach($regions as $region)
                        <option value="{{$region->id}}">{{$region->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>

            
            <div class="form-group col-md-3">
                <label for="inputState">Departamento</label>
                <div>
                  <select class="form-control" id="department_id">
                    <option value="{{$branch->municipality->department->id}}" selected>{{$branch->municipality->department->name}}</option>
                    @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="inputState">Municipalidad</label>
                <div>
                  <select class="form-control" name="municipality_id"  id="municipality_id">
                    <option value="{{$branch->municipality_id}}" selected>{{$branch->municipality->name}}</option>
                    @foreach($municipalities as $municipality)
                        <option value="{{$municipality->id}}">{{$municipality->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="inputState">Comercio</label>
                <div>
                  <select class="form-control" name="shop_id" id="shop_id">
                  <option value="{{$branch->shop_id}}" selected>{{$branch->shop->name}}</option>
                    @foreach($shops as $shop)
                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    
    
   
    </form>
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
      departmentelements();
      municipalityelements();
    });
</script>
@endsection




