@extends('layouts.default')

@section('title')
@parent
: Nuevo
@stop

@section('content')
	{!! Form::open(['url' => 'recibos', 'route' => 'recibos.store', 'class' => 'form-style', 'autocomplete' => 'off']) !!}
		<div style="padding:15px;background-color:#fff;border-radius:6px;">
			<fieldset>
				<legend>Recibo</legend>
				<h2 class="form-signin-heading text-center">Agregar Nuevo</h2>
				<div class="form-group {{{ $errors->has('cliente_id') ? 'error' : '' }}}">
					<label for="cliente">Cliente <span style="color:red;">(*)</span></label>
					<input type="text" id="cliente_id" name="cliente_id" placeholder="Cliente.." required="true" class="form-control" value="" />
				</div>
				<div class="form-group {{{ $errors->has('deuda') ? 'error' : '' }}}">
					<label for="deuda">Deuda <span style="color:red;">(*)</span></label>
					<input type="text" id="deuda" name="deuda" placeholder="Deuda.." required="true" class="form-control" value="{{{ Input::old('deuda') }}}" />
					{{{ $errors->first('deuda') }}}
				</div>
				<div class="form-group {{{ $errors->has('fecha') ? 'error' : '' }}}">
					<label for="fecha">Fecha <span style="color:red;">(*)</span></label>
					<input type="text" id="fecha" name="fecha" placeholder="Fecha.." required="true" class="form-control" value="{{{ Input::old('fecha') }}}" />
					{{{ $errors->first('fecha') }}}
				</div>
				<div class="form-group {{{ $errors->has('descripcion') ? 'error' : '' }}}">
					<label for="descripcion">Descripcion</label>
					<textarea type="textarea" id="descripcion" name="descripcion" placeholder="Descripcion.." class="form-control">{{{ Input::old('descripcion') }}}</textarea>
					{{{ $errors->first('descripcion') }}}
				</div>
				<button type="submit" class="btn btn-lg btn-primary btn-block">Agregar</button>
			</fieldset>
		</div>
	{!! Form::close() !!}
@stop