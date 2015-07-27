@extends('layouts.default')

@section('title')
@parent
: Cliente
@stop

@section('content')
	<div style="padding:35px;background-color:#fff;border-radius:6px;">
		<fieldset>
			<legend>Clientes</legend>
			<div class="row">
				<div class="col-xs-6 col-md-6">
					{!! link_to_route('clientes.create', 'Nuevo', array(), array('class' => 'btn btn-primary')) !!}
				</div>
				<div class="col-xs-6 col-md-6">
					{!! Form::open(['url' => 'clientes', 'method' => 'GET', 'class' => 'navbar-form pull-right', 'role' => 'search']) !!}
						<div class="{{{ $errors->has('q') ? 'error' : '' }}}">
							<label style="padding:5px;" for="name">Buscar: </label>
							<input type="text" id="q" name="q" autofocus="true" class="form-control" placeholder="Por nombre..." />
							{{{ $errors->first('q') }}}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>ID</td>
						<td>Nombre</td>
						<th>Consulta</th>
						<th>Ver</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
				@foreach($clientes as $key => $value)
					<tr>
						<td>{{ $id = $value->id }}</td>
						<td>{{{ $value->nombre }}}</td>
						<td>{{ link_to_route('recibos.create', 'Recibo', array('id' => $id), array('class' => 'btn btn-info')) }}</td>
						<td>{{ link_to_route('clientes.show', 'Ver', array($id), array('class' => 'btn btn-info')) }}</td>
						<td>{{ link_to_route('clientes.edit', 'Editar', array($id), array('class' => 'btn btn-warning')) }}</td>
						<td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('clientes.destroy', $id))) }}
							{{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
							{{ Form::close() }}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<?php echo $clientes->render(); ?>
		</fieldset>
	</div>
@stop