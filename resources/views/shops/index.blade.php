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
                        <h2>Comercios</h2>
                    </div>
                    <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('shops.create') }}">Nuevo Comercio</a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <table class="table">
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Fecha de Registro</th>
                  
                    <th width="280px">Acciones</th>
                </tr>
                @foreach ($shops as $shop)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->created_at }}</td>
                    <td>
                        <form action="{{ route('shops.destroy',$shop->id) }}" method="POST">


                            <a class="btn btn-primary" href="{{ route('shops.edit',$shop->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                  
                </tr>
                @endforeach
            </table>

            {!! $shops->links() !!}
        </div>
        @endsection

    </div>

</div>
</div>