@extends('layouts.app')

@section('body-class', 'signup-page')

@section('content')
<div class="header header-filter" style="background-image: url('{{ asset('img/guatecity.jpg') }}'); background-size: cover; background-position: top center;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <div class="card card-signup">
                    <form class="form" method="POST" action="{{ route('shops.store') }}">
                    @csrf

                        <div class="header header-primary text-center">
                            <h4>Nuevo Comercio</h4>
                            <!-- <div class="social-line">
                                <a href="#" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </a>
                                <a href="#" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-simple btn-just-icon">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div> -->
                        </div>
                        <p class="text-divider">Ingresa los datos</p>
                        <div class="content">

                            <div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">add_business</i>
										</span>
										<input type="text" class="form-control" placeholder="Nombre..." name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
							</div>

                           


                           
                        </div>
                        <div class="footer text-center">
                        <button type="submit" class="btn btn-primary"> {{ __('Confirmar Registro') }}</button>
                        <a class="btn btn-danger" href="{{ route('shops.index') }}">Cancelar</a>
                           <!-- <a href="#pablo" class="btn btn-simple btn-primary btn-lg">Ingresar</a>  -->

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection