@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/guatecity.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <h5>{{ $message }}</h5>
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    <form class="form" action="{{ route('searches.search') }}" method="POST">
                        @csrf
                        <div class="header header-primary text-center">
                            <h4>Buscar Solicitud</h4>
                        </div>
                        <p class="text-divider">Ingresa el numero de solicitud</p>
                        <div class="content">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons"></i>
                                </span>
                                <input id="document" type="text" placeholder="No. Solicitud" class="form-control" name="document" value="{{ old('document') }}" required autofocus>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary"> {{ __('Buscar') }}</button>
                            <a class="btn btn-success" href="{{ route('searches.create') }}">Crear Queja</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <!-- <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="http://www.creative-tim.com">
                            Creative Tim
                        </a>
                    </li>
                    <li>
                        <a href="http://presentation.creative-tim.com">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="http://blog.creative-tim.com">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="http://www.creative-tim.com/license">
                            Licenses
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; 2016, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com" target="_blank">Creative Tim</a>
            </div>
        </div> -->
    </footer>

</div>
@endsection