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
                        <h2>Quejas</h2>
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
                    <th>Documento</th>
                    <th>Fecha</th>
                    <th>Razon</th>
                    <th>Sucursal</th>
                    <th>Estado</th>
                    <th width="280px">Acciones</th>
                </tr>
                @foreach ($complains as $complain)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $complain->document }}</td>
                    <td>{{ $complain->date }}</td>
                    <td>{{ $complain->reason }}</td>
                    <td>{{ $complain->branch->name }}</td>
                    <td>{{ $complain->status->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('complains.edit',$complain->id) }}">Actualizar Estado</a>
                    </td>
                </tr>
                @endforeach
            </table>

            {!! $complains->links() !!}
        </div>
        @endsection

    </div>

</div>
</div>