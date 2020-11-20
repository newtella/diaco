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
                        <h2>Editar Resolucion</h2>
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

     

        <form action="{{ route('resolutions.update',$resolution->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <diV class="col-sm-12">
                    <div class="form-group label-floating">
                        <label class="control-label">Detalle de la resolucion</label>
                        <input type="text" class="form-control" name="detail" value="{{ $resolution->detail }}"   >
                    </div>
                    <input type="hidden" name="compmlain_id" value="{{ $resolution->id }}" class="form-control">
                </diV>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    
    </div>
</div>
@endsection