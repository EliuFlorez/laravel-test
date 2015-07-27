@extends('layouts.default')

@section('title')
@parent
: Detalle
@stop

@section('content')
	<form class="form-style">
		<div class="form-signin" style="padding:15px;background-color:#fff;border-radius:6px;">
			<fieldset>
				<legend>Cliente</legend>
				<h2 class="form-signin-heading text-center">Detalle</h2>
				<div class="form-group">
					<label for="identificacion">Identificacion: </label>
					<span>{{{ $data->identificacion }}}</span>
				</div>
				<div class="form-group">
					<label for="nombre">Nombre: </label>
					<span>{{{ $data->nombre }}}</span>
				</div>
				<div class="form-group">
					<label for="apellido">Apellido: </label>
					<span>{{{ $data->apellido }}}</span>
				</div>
				<div class="form-group">
					<label for="contacto">Contacto: </label>
					<span>{{{ $data->contacto }}}</span>
				</div>
				<div class="form-group">
					<label for="telf">Teléfono: </label>
					<span>{{{ $data->telf }}}</span>
				</div>
				<div class="form-group">
					<label for="email">Email: </label>
					<span>{{{ $data->email }}}</span>
				</div>
				<div class="col-md-12" style="padding:10px;">
					{{ link_to_route('clientes.create', 'Agregar', array(), array('class' => 'btn btn-primary')) }}
					{{ link_to_route('clientes.edit', 'Editar', array($data->id), array('class' => 'btn btn-primary')) }}
				</div>
			</fieldset>
		</div>
	</form>
@stop