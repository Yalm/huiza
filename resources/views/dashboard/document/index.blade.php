@extends('layouts.dashboard')
@section('content')
<!-- Bread crumb -->
<div class="row page-titles card_ch">
    <div class="col-md-5 align-self-center">
        <h3 class="text-white">Todos los productos</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="hov_a_ch" href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item active">Todos los productos</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->
@if (session('success'))
    <input type="hidden" id="statusProduct" value="{{ session('success') }}">
@endif
<!-- Container fluid  -->
<div class="container-fluid">
<!-- Start Page Content -->
<div class="row">
	<div class="col-12">
		<div class="card card_ch">
			<div class="card-body">
				<h4 class="card-title"><a id="CreateDocument" href="javascript:void(0)" class="btn btn-primary">Nueva Categoría</a></h4>
				<div class="table-responsive">
					<table id="myTable" class="table table-striped">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Acciones</th>
							</tr>
							@csrf
						</thead>
						<tbody>         
							@foreach ($documents as $document)
								<tr id="{{ "trDocumentName$document->id" }}">
									<td>{{ $document->name }}</td>
									<td class="text-center">
										<a href="javascript:void(0)" id="updateDocument" data-id="{{ $document->id }}" data-name="{{ $document->name }}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
										<a href="javascript:void(0)" id="deleteDocument" data-url="{{url("admin/document/$document->id")}}" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End PAge Content -->
<form method="post" role="form" id="deleteDocumentForm">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
</form>
@endsection
@section('myjsfile')
	<script src="{{ asset('js/lib/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('js/lib/datatables/datatables-init.js') }}"></script>

<script type="text/javascript">

	$('#CreateDocument').on("click", function() 
	{
		swal({
				title: "¡Ingresa un nuevo documento!",
				text: "¡Escribe algo interesante!",
				type: "input",
				showCancelButton: true,
				closeOnConfirm: false,
				animation: "slide-from-top",
				inputPlaceholder: "Documento de identidad"
			},
			function(inputValue)
			{
				if (inputValue === false) return false;
				if (inputValue === "") 
				{
					swal.showInputError("¡Tienes que escribir algo!");
					return false
				}
				$.ajax({
					type: 'post',
					url: 'document',
					data: 
					{
						'_token': $('input[name=_token]').val(),
						'name': inputValue
      				},
					success: function(data) 
					{
						swal("!Oye!", "Nueva Documento: " + inputValue, "success");
						
						var datatable = $('#myTable').DataTable();
						var trDOM = datatable.row.add( [
							data.name,
							"<a href='javascript:void(0)' id='updateDocument' data-id="+data.id+" data-name="+data.name+" class='btn btn-primary'><i class='fa fa-refresh' aria-hidden='true'></i></a>\
							<a href='javascript:void(0)' id='deleteDocument' data-url='{{url('admin/document')}}/"+data.id+"' class='btn btn-primary'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"
						] ).draw().node();

						$(trDOM).find('td').eq(1).addClass('text-center');
						$(trDOM).attr('id', 'trDocumentName'+ data.id );						
						
					},
					error: function(data) 
					{
						swal.showInputError(data.responseJSON.errors.name);
						return false
					}
    			});
			});
	});

	$(document).on('click','#deleteDocument', function() 
	{
		var urlSend = $(this).data('url');
		swal({
			title: "¿Estás seguro de eliminar?",
			text: "No podrás recuperar este documento jamas !!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#BED001",
			confirmButtonText: "Sí, eliminarlo !!",
			cancelButtonText: "No, cancelalo !!",
			closeOnConfirm: false,
			closeOnCancel: false
			},
			function(isConfirm)
			{
				if (isConfirm) 
				{
					$('#deleteDocumentForm').attr('action', urlSend);
					$('#deleteDocumentForm').trigger('submit');
				}
				else 
				{
					swal("Cancelado !!", "Oye, tu documento de indentidad esta segura !!", "error");
				}
			});
	});

	$(document).on('click','#updateDocument', function() 
	{
		var name = $(this).data('name');
		var id = $(this).data('id');
		var rowClick = $(this).parent().parent();
		swal({
				title: "¡Actualizar Documento de identidad!",
				text: "¡Escribe algo interesante!",
				type: "input",
				showCancelButton: true,
				closeOnConfirm: false,
				animation: "slide-from-top",
				inputPlaceholder: "Documento de identidad",
				inputValue : name,
			},
			function(inputValue)
			{
				if (inputValue === false) return false;
				if (inputValue === "") 
				{
					swal.showInputError("¡Tienes que escribir algo!");
					return false
				}
				$.ajax({
					type: 'PUT',
					url: 'document/'+ id,
					data: 
					{
						'_token': $('input[name=_token]').val(),
						'name': inputValue
      				},
					success: function(data) 
					{
						swal("!Oye!", "Documento de identidad Actualizado: " + inputValue, "success");
						var datatable = $('#myTable').DataTable();
						datatable.row(rowClick).data([
							data.name,
							"<a href='javascript:void(0)' id='updateDocument' data-id="+data.id+" data-name="+data.name+" class='btn btn-primary'><i class='fa fa-refresh' aria-hidden='true'></i></a>\
							<a href='javascript:void(0)' id='deleteDocument' data-url='{{url('admin/document')}}/"+data.id+"' class='btn btn-primary'><i class='fa fa-trash-o' aria-hidden='true'></i></a>"
						]).draw();

						rowClick.find('td').eq(1).addClass('text-center');
					},
					error: function(data) 
					{
						if(data.responseJSON.errors == null)
						{
							swal.showInputError('Opps Algo salio mal');
							return false
						}
						swal.showInputError(data.responseJSON.errors.name);
						return false
					}
    			});
			});
	});	
</script>
@endsection
