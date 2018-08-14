@extends('layouts.dashboard')
@section('content')
<!-- Bread crumb -->
<div class="row page-titles card_ch">
    <div class="col-md-5 align-self-center">
        <h3 class="text-white">Actualizar pedido</h3> </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="hov_a_ch" href="javascript:void(0)">Inicio</a></li>
            <li class="breadcrumb-item active">Actualizar pedidos</li>
        </ol>
    </div>
</div>
<!-- End Bread crumb -->

<div class="container-fluid">
    <form class="row" action="{{ url("admin/order/$order->id") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <div class="card card_ch">
                <div class="card-body">
                    <h3 class="card-title">Datos de facturación</h3>
                    <h5 class="my-3">Cliente</h5>
                    <div class="media my-3">
                        <div class="media-left">
                            <img src="{{ asset('images/avatar.png') }}" class="media-object rounded-circle" style="width:60px">
                        </div>
                        <div class="p-l-15 media-body">
                            <h4 class="media-heading">{{ $order->customer->name }} <small><i>{{ $order->customer->phone }}</i></small></h4>
                            <p>{{ $order->customer->email }}</p>
                        </div>
                    </div>
                    <h4 class="my-3">Datos del pedido</h4>
                    <div class="form-row">
                        @if($order->name)
                        <h5 class="my-3">Datos de la persona a recojer</h5>
                        <div class="form-group col-md-12">
							<label class="control-label">Nombre</label>
							<input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" value="{{ old('name', $order->name) }}">
							@if ($errors->has('name'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
							@endif
						</div>

                        <div class="form-group col-md-12">
							<label class="control-label">Apellidos</label>
							<input class="form-control {{ $errors->has('surnames') ? 'is-invalid' : '' }}" type="text" name="surnames" value="{{ old('surnames', $order->surnames) }}">
							@if ($errors->has('surnames'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('surnames') }}</strong>
								</span>
							@endif
						</div>

                        <div class="form-group col-md-6">
							<label class="control-label">Celular/Telefono</label>
							<input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" value="{{ old('phone', $order->phone) }}">
							@if ($errors->has('phone'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('phone') }}</strong>
								</span>
							@endif
						</div>
                        @endif
                        @if($order->note_customer)
                        <div class="form-group col-md-12">
							<label for="exampleTextarea">Nota del cliente</label>
							<textarea class="form-control {{ $errors->has('note_customer') ? 'is-invalid' : '' }}" name="note_customer" rows="3">{{ $order->note_customer }}</textarea>
							@if ($errors->has('note_customer'))
								<span class="form-control-feedback text-danger">
									<strong>{{ $errors->first('note_customer') }}</strong>
								</span>
							@endif
						</div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="card card_ch">
                <div class="card-body">
                    <h4 class="card-title"><b><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Actualización de pedido</b></h4>
                    <p> ¿Estás seguro de actualizar?, No podrás recuperar 
                        los datos cambiados jamas.
                    </p>
                    <a href="{{ url('admin/order') }}" class="btn btn-seconday hov_a_ch" >
							<i class="fa fa-times-circle" aria-hidden="true"></i>
							 Cancelar
					</a>
                   <input name="_method" type="hidden" value="PUT">
						<button class="btn btn-primary" type="submit" name="">
							<i class="fa fa-exclamation-triangle"></i>
							Actualizar
					</button>
                </div>
            </div>
        </div> 
        <div class="col-md-6">
            <div class="card card_ch">
                <div class="card-body">
                    <h4 class="card-title">Productos</h4>
                        @if (session('error'))
                            <div class="alert alert-danger col-md-12">
                                {{ session('error') }}
                            </div>
                         @endif
                    <div class="table-responsive">
                        <table class="table table-striped my-3">
                            <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->products as $product)
                                <tr>
                                    <td class="hidden"><input type="hidden" name="products[]" value="{{ $product->id}}"></td>
                                    <td>{{ $product->name }}</td>
                                    <td>S/.{{ $product->price }}</td>                                
                                    <td class="text-center">{{ $product->pivot->quantity }}</td>
                                    <td id="deleteProductoOrder"><i class="fa fa-close"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card card_ch">
                <div class="card-body">
                    <h4 class="card-title">Estado de Pedido</h4>
                    <div class="row">
                        <h5 class="my-3 col-md-7">Comprobante de pago</h5>
                        <div class="col-md-6">
                            @if($order->voucher)
                                <img class="img-responsive" src="{{ $order->voucher }}">
                            @else
                                <img class="img-responsive" src="{{ asset('images/default.jpg') }}">
                            @endif
                        </div>
                        <div class="form-group col-md-6 my-3">
                            <label class="mr-sm-2" for="inlineFormCustomSelect">Estado de pedido</label>
                            <select class="form-control text-uppercase" name="states">
                                @foreach ($states as $state)
                                    @if ($order->state->id == $state->id)
                                        <option selected="true" value="{{ $state->id }}">{{ $state->name}}</option>
                                    @else
                                        <option value="{{ $state->id }}">{{ $state->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card_ch">
                <div class="card-body">
                    <h4 class="card-title">Notas del pedido</h4>
                    
                    <ul class="order_notes">
                        @foreach ($order->notes as $note)
                            <li id="liNote{{ $note->id}}" class="system-note">
                                <div class="note_content">
                                    <p>{{ $note->text }}</p>
                                </div>
                                <p class="meta">
                                    <abbr class="exact-date">añadido el {{ $note->formatDate() }}</abbr>
                                    por {{ $note->user->name }} <a href="javascript:void(0)" data-id="{{ $note->id }}" class="delete_note">Borrar nota</a>
                                </p>
                            </li>
                        @endforeach	
				    </ul>
                    <a href="javascript:void(0)" data-user="{{ Auth::guard('user')->user()->id }}" data-order="{{ $order->id }}" class="hov_a_ch text-white addNote">
                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar nueva nota
                    </a>
                </div>
            </div>

        </div>   
    </form>        
</div>
@endsection
@section('myjsfile')
	<script>
        $(document).on('click','#deleteProductoOrder',function()
        {
            var trDelete = $(this).parent();
            swal({
            title: "¿Estás seguro de eliminar?",
            text: "No podrás recuperar este producto jamas !!",
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
                    swal("¡Eliminado!", "¡Oye, tu producto  ha sido eliminado!", "success");
                    trDelete.remove();
                }
                else 
                {
                    swal("Cancelado !!", "Oye, tu producto esta seguro !!", "error");
                }
            });
        });

        $(document).on('click','.delete_note',function()
        {
            var id = $(this).data('id');
            $.ajax({
                type: 'DELETE',
                url: '{{ url('admin/note') }}/'+ id,
                data: 
                {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) 
                {
                    $('#liNote'+ id).remove();
                }
            });
        });

        $(document).on('click','.addNote',function()
        {
            var user_id = $(this).data('user');
            var order_id = $(this).data('order');
            
            swal({
                title: "¡Nueva nota de pedido!",
                text: "<textarea class='form-control m-b-3' id='noteText'></textarea>",
                html: true,
                showCancelButton: true,
                closeOnConfirm: false,
                animation: "slide-from-top",
                inputPlaceholder: "Write something"
                }, function() 
                {
                    $('.sa-input-error').hide();
                    var val =  $('#noteText').val();
                    if (val === false) return false;
                    if (val === "") 
                    {
                        swal.showInputError("You need to write something!");
                        return false
                    }

                    $.ajax({
                        type: 'POST',
                        url: '{{ url('admin/note') }}',
                        data: 
                        {
                            '_token': $('input[name=_token]').val(),
                            'text': val,
                            'user_id': user_id,
                            'order_id': order_id,
                        },
                        success: function(data) 
                        {
                            swal("!Oye!", "Nueva Nota: " + val, "success");
                            $('.order_notes').append('<li id="liNote'+ data.id +'" class="system-note">\
                                <div class="note_content">\
                                    <p>'+ data.text +'</p>\
                                </div>\
                                <p class="meta">\
                                    <abbr class="exact-date">añadido el '+ data.date +'</abbr>\
                                    por '+ data.user.name+' <a href="javascript:void(0)" data-id="'+data.id+'" class="delete_note">Borrar nota</a>\
                                </p>\
                            </li>');                         
                        },
                        error: function(data) 
                        {
                            console.log(data);
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