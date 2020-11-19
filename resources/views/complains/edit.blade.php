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
            <h2>Detalle de la Queja</h2>
          </div>
          <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('complains.index') }}"> Atras</a>
            @if($complain->resolution == null)
            <a class="btn btn-primary" href="{{ route('resolutions.create', $complain->id) }}">Agregar Resolucion</a>
            @else
            <a class="btn btn-primary" href="{{ route('resolutions.show', $complain->id) }}">Ver Resolucion</a>
            @endif
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

      <form action="{{ route('complains.update',$complain->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
          <diV class="col-sm-3">
            <div class="form-group label-floating">
              <label class="control-label">Documento</label>
              <input type="text" name="document" value="{{ $complain->document }}" class="form-control" disabled>
            </div>
          </diV>

          <div class="col-sm-3">
            <div class="form-group label-floating">
              <label class="control-label">Fecha</label>
              <input type="text" name="date" value="{{ $complain->date }}" class="form-control" disabled>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group label-floating">
              <label class="control-label" for="inputState">Sucursal</label>
              <input type="text" name="branch_id" value="{{ $complain->branch->name }}" class="form-control" disabled>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="form-group label-floating">
              <label class="control-label" for="inputState">Estado</label>
              <select class="form-control" name="status_id">
                <option value="{{$complain->status_id}}" selected>{{$complain->status->name}}</option>
                @foreach($statuses as $status)
                <option value="{{$status->id}}">{{$status->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="col-sm-12">
            <div class="form-group label-floating">
              <label class="control-label">Razon</label>
              <input type="text" name="reason" value="{{ $complain->reason }}" class="form-control" disabled>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="inputState">Solicitud</label>
            <input type="text" name="request" value="{{ $complain->request }}" class="form-control" disabled>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
  @endsection