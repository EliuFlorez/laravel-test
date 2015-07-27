@extends('layouts.default')

@section('title')
@parent
: Editar
@stop

@section('content')
	{!! Form::open(['route' => array('recibos.update', $data->id), 'method' => 'PUT', 'class' => 'form-style', 'autocomplete' => 'off']) !!}
		<div style="padding:15px;background-color:#fff;border-radius:6px;">
			<fieldset>
				<legend>Recibo</legend>
				<h2 class="form-signin-heading text-center">Actualizar Datos</h2>
				<div class="form-group {{{ $errors->has('identificacion') ? 'error' : '' }}}">
					<label for="identificacion">Identificacion <span style="color:red;">(*)</span></label>
					<input type="text" id="identificacion" name="identificacion" placeholder="Identificacion.." required="true" class="form-control" value="{{{ Request::old('identificacion', $data->identificacion) }}}" />
					{{{ $errors->first('identificacion') }}}
				</div>
				<div class="form-group {{{ $errors->has('cliente_id') ? 'error' : '' }}}">
					<label for="cliente">Cliente <span style="color:red;">(*)</span></label>
					<input type="text" id="cliente_id" name="cliente_id" placeholder="Cliente.." required="true" class="form-control" value="" />
				</div>
				<div class="form-group {{{ $errors->has('deuda') ? 'error' : '' }}}">
					<label for="deuda">Deuda <span style="color:red;">(*)</span></label>
					<input type="text" id="deuda" name="deuda" placeholder="Deuda.." required="true" class="form-control" value="{{{ Request::old('deuda', $data->deuda) }}}" />
					{{{ $errors->first('deuda') }}}
				</div>
				<div class="form-group {{{ $errors->has('fecha') ? 'error' : '' }}}">
					<label for="fecha">Fecha <span style="color:red;">(*)</span></label>
					<input type="text" id="fecha" name="fecha" placeholder="Fecha.." required="true" class="form-control" value="{{{ Request::old('fecha', $data->fecha) }}}" />
					{{{ $errors->first('fecha') }}}
				</div>
				<div class="form-group {{{ $errors->has('descripcion') ? 'error' : '' }}}">
					<label for="descripcion">Descripcion</label>
					<textarea type="textarea" id="descripcion" name="descripcion" placeholder="Descripcion.." class="form-control">{{{ Request::old('descripcion', $data->descripcion) }}}</textarea>
					{{{ $errors->first('descripcion') }}}
				</div>
				<button type="submit" class="btn btn-lg btn-primary btn-block">Actualizar</button>
			</fieldset>
		</div>
	{!! Form::close() !!}
@stop