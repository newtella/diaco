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
                <h2>Queja</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('complains.index') }}"> Atras</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $complain->document }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefono:</strong>
                {{ $complain->reason }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Direccion:</strong>
                {{ $complain->request}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comercio:</strong>
                {{ $complain->branch->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Estado:</strong>
                {{ $complain->status->name}}
            </div>
        </div>
    </div>
    <table class="table">
        @if(!$complain->resolution)
        <tr>
            <th class="text-center">Resolucion</th>
        </tr>
        <tr >
            <td class="text-center">Sin resolucion</td>  
        </tr>
        
        @else
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Detail</th>
            </tr>
            <tr>
                <td>{{ $complain->resolution->id }}</td>
                <td>{{ $complain->resolution->date }}</td>
                <td>{{ $complain->resolution->detail }}</td>
            </tr>
        
        @endif
    </table>
</div>
@endsection
</div>
</div>
</div>
