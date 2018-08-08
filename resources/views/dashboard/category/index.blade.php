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
				<h4 class="card-title"><a id="CreateCategory" href="javascript:void(0)" class="btn btn-primary">Nueva Categoría</a></h4>
				<div class="table-responsive">
					<table id="myTable" class="table table-striped">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Acciones</th>
							</tr>
							@csrf
						</thead>
						<tbody id="CategoryTable">         
							@foreach ($categories as $category)
								<tr id="{{ "trCategoryName$category->id" }}">
									<td>{{ $category->name }}</td>
									<td class="text-center">
										<a href="javascript:void(0)" id="updateCategory" data-id="{{ $category->id }}" data-name="{{ $category->name }}" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>
										<a href="javascript:void(0)" id="deleteCategory" data-url="{{url("admin/category/$category->id")}}" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
<form method="post" role="form" id="deleteCategoryForm">
    @csrf
    <input name="_method" type="hidden" value="DELETE">
</form>
@endsection
@section('myjsfile')
	<script src="{{ asset('js/lib/datatables/datatables.min.js') }}"></script>
	<script src="{{ asset('js/lib/datatables/datatables-init.js') }}"></script>

<script type="text/javascript">
	var t = $('#myTable').DataTable();

	$('#CreateCategory').on("click", function() 
	{
		swal({
				title: "¡Ingresa una categoría!",
				text: "¡Escribe algo interesante!",
				type: "input",
				showCancelButton: true,
				closeOnConfirm: false,
				animation: "slide-from-top",
				inputPlaceholder: "Categoría"
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
					url: 'category',
					data: 
					{
						'_token': $('input[name=_token]').val(),
						'name': inputValue
      				},
					success: function(data) 
					{
						swal("!Oye!", "Nueva Categoría: " + inputValue, "success");						
						
						$('#CategoryTable').append('<tr id="trCategoryName'+ data.id +'">\
						<td>'+ data.name +'</td> \
						<td class="text-center">\
							<a href="javascript:void(0)" id="updateCategory" data-id="'+data.id+'" data-name="'+data.name+'" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>\
							<a href="javascript:void(0)" id="deleteCategory" data-url="{{url("admin/category")}}/'+data.id+'" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a>\
						</tr>');
						
					},
					error: function(data) 
					{
						swal.showInputError(data.responseJSON.errors.name);
						return false
					}
    			});
			});
	});

	$(document).on('click','#deleteCategory', function() 
	{
		var urlSend = $(this).data('url');
		swal({
			title: "¿Estás seguro de eliminar?",
			text: "No podrás recuperar esta categgoría jamas !!",
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
					$('#deleteCategoryForm').attr('action', urlSend);
					$('#deleteCategoryForm').trigger('submit');
				}
				else 
				{
					swal("Cancelado !!", "Oye, tu categoría esta segura !!", "error");
				}
			});
	});

	$(document).on('click','#updateCategory', function() 
	{
		var name = $(this).data('name');
		var id = $(this).data('id');
		swal({
				title: "¡Actualizar categoría!",
				text: "¡Escribe algo interesante!",
				type: "input",
				showCancelButton: true,
				closeOnConfirm: false,
				animation: "slide-from-top",
				inputPlaceholder: "Categoría",
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
					url: 'category/'+ id,
					data: 
					{
						'_token': $('input[name=_token]').val(),
						'name': inputValue
      				},
					success: function(data) 
					{
						swal("!Oye!", "Categoría Actualizada: " + inputValue, "success");
						$('#trCategoryName'+ data.id).replaceWith('<tr id="trCategoryName'+ data.id +'" >\
									<td>'+data.name+'</td>\
									<td class="text-center">\
										<a href="javascript:void(0)" id="updateCategory" data-id="'+data.id+'" data-name="'+data.name+'" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></a>\
										<a href="javascript:void(0)" id="deleteCategory" data-url="{{url("admin/category")}}/'+data.id+'" class="btn btn-primary"><i class="fa fa-trash-o" aria-hidden="true"></i></a>\
									</td></tr>');
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
