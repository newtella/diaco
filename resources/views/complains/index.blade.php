@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Quejas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('complains.create') }}">Tus Quejas</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Documento</th>
            <th>Fecha</th>
            <th>Razon</th>
            <th>Solicitud</th>
            <th>Sucursal</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($complains as $complain)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $complain->document }}</td>
            <td>{{ $complain->date }}</td>
            <td>{{ $complain->reason }}</td>
            <td>{{ $complain->request }}</td>
            <td>{{ $complain->branch->name }}</td>
            <td>{{ $complain->status->name }}</td>
            <td>
                <form action="{{ route('complains.destroy',$complain->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('complains.show',$complain->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('complains.edit',$complain->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $complains->links() !!}
      
@endsection