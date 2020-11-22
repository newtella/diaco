@extends('layouts.app')

@section('body-class', 'singup-page')

@section('css')

   
    <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet">

@endsection


@section('content')

<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

    <div class="main main-raised">
         <div class="profile-content">

            <div class="container">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                <p>{{ $message }}</p>
                </div>
                @endif
   
            
                <h2 class="mb-12">Sucursales Sin Quejas Reportadas</h2>
                        <font size="3" face="Times New Roman" >
                        <table class="table table-bordered yajra-datatable table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sucursal</th>
                                    <th>Comercio</th>
                                    <th>Municipio</th>
                                    <th>Departamento</th>
                                    <th>Region</th>
                                   

                                    </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        </font>
            
            
            </div>
        </div>

    </div>
</div>
@endsection

        


@section('scripts')


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



<script type="text/javascript">

  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            
            'copy', 'csv', {
            extend: 'excelHtml5',
            autoFilter: true,
            sheetName: 'Exported data'
        } , 'pdf', 'print'
        ],
        processing: true,
        serverSide: true,
        ajax: "{{ route('vsinquejas') }}",
        columns: [
            {data: 'Sucursal', name: 'Sucursal'},
            {data: 'Comercio', name: 'Comercio'},
            {data: 'Municipio', name: 'Municipio'},
            {data: 'Departamento', name: 'Departamento'},
            {data: 'Region', name: 'Region'},
            
        ]
    });
    
  });
</script>
@endsection