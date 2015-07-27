@extends('layouts.default')

@section('title')
@parent
: Editar
@stop

@section('content')
	{!! Form::open(['route' => array('clientes.update', $data->id), 'method' => 'PUT', 'class' => 'form-style', 'autocomplete' => 'off']) !!}
		<div style="padding:15px;background-color:#fff;border-radius:6px;">
			<fieldset>
				<legend>Paciente</legend>
				<h2 class="form-signin-heading text-center">Actualizar Datos</h2>
				<div class="form-group {{{ $errors->has('identificacion') ? 'error' : '' }}}">
					<label for="identificacion">Identificacion <span style="color:red;">(*)</span></label>
					<input type="text" id="identificacion" name="identificacion" placeholder="Identificacion.." required="true" class="form-control" value="{{{ Request::old('identificacion', $data->identificacion) }}}" />
					{{{ $errors->first('identificacion') }}}
				</div>
				<div class="form-group {{{ $errors->has('nombre') ? 'error' : '' }}}">
					<label for="nombre">Nombres <span style="color:red;">(*)</span></label>
					<input type="text" id="nombre" name="nombre" placeholder="Nombre.." required="true" class="form-control" value="{{{ Request::old('nombre', $data->nombre) }}}" />
					{{{ $errors->first('nombre') }}}
				</div>
				<div class="form-group {{{ $errors->has('apellido') ? 'error' : '' }}}">
					<label for="apellido">Apellidos <span style="color:red;">(*)</span></label>
					<input type="text" id="apellido" name="apellido" placeholder="Apellido.." required="true" class="form-control" value="{{{ Request::old('apellido', $data->apellido) }}}" />
					{{{ $errors->first('apellido') }}}
				</div>
				<div class="form-group {{{ $errors->has('contacto') ? 'error' : '' }}}">
					<label for="contacto">Contacto <span style="color:red;">(*)</span></label>
					<input type="text" id="contacto" name="contacto" placeholder="Contacto.." required="true" class="form-control" value="{{{ Request::old('contacto', $data->contacto) }}}" />
					{{{ $errors->first('contacto') }}}
				</div>
				<div class="form-group {{{ $errors->has('telf') ? 'error' : '' }}}">
					<label for="phone">Teléfono <span style="color:red;">(*)</span></label>
					<input type="text" id="telf" name="telf" placeholder="Teléfono.." required="true" class="form-control" value="{{{ Request::old('telf', $data->telf) }}}" />
					{{{ $errors->first('telf') }}}
				</div>
				<div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
					<label for="email">Email <span style="color:red;">(*)</span></label>
					<input type="text" id="email" name="email" placeholder="Email.." required="true" class="form-control" value="{{{ Request::old('email', $data->email) }}}" />
					{{{ $errors->first('email') }}}
				</div>
				<button type="submit" class="btn btn-lg btn-primary btn-block">Actualizar</button>
			</fieldset>
		</div>
	{!! Form::close() !!}
@stop