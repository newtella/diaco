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
                <h2>Detalle de Resolución</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('resolutions.index') }}"> Regresar</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha:</strong>
                {{ $resolution->date }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detalle:</strong>
                {{ $resolution->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Documento de Queja:</strong>
                {{ $resolution->complain->document }}
            </div>
        </div>
        
    </div>
</div>
@endsection

</div>

</div>
</div>