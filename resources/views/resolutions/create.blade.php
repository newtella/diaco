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
                        <h2>Resolucion</h2>
                    </div>
                    <div class="text-right">
                        <a class="btn btn-danger" href="javascript:history.back()"> Regresar</a>
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
        <form action="{{ route('resolutions.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <diV class="col-sm-12">
                    <div class="form-group label-floating">
                        <label class="control-label">Detalle de la resolucion</label>
                        <input type="text" class="form-control" name="detail">
                    </div>
                    <input type="hidden" name="complain_id" value="{{ $complain->id }}" class="form-control">
                </diV>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
        <div class="card">
            <div class="container">
                <h3> - Detalle de la Queja:</h3>
            </div>
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
                        <select class="form-control" name="status_id" disabled>
                            <option value="{{$complain->status_id}}" selected>{{$complain->status->name}}</option>
                            @foreach($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection