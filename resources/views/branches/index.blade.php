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
                <h2>Sucursales</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('branches.create') }}">Nueva Sucursal</a>
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
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Municipalidad</th>
            <th>Comercial</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($branches as $branch)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $branch->name }}</td>
            <td>{{ $branch->phone }}</td>
            <td>{{ $branch->address }}</td>
            <td>{{ $branch->municipality->name }}</td>
            <td>{{ $branch->shop->name }}</td>
            <td>
                <form action="{{ route('branches.destroy',$branch->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('branches.show',$branch->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('branches.edit',$branch->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $branches->links() !!}
</div>
@endsection

</div>

</div>
</div>