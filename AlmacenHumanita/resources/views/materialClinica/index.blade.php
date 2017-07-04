@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Administrar Material Clínica</h2>
	        </div>
	        <div class="pull-right">
	        	
	            <a class="btn btn-success" href="{{ route('materialClinica.create') }}"> Crear nuevo material</a>
	            
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
			<th>Nombre</th>
			<th>Descripción</th>
			<th width="280px">Acción</th>
		</tr>
	@foreach ($materiales as $key => $material)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $material->nombre }}</td>
		<td>{{ $material->descripcion }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('materialClinica.show',$material->id) }}">Ver</a>
			
			<a class="btn btn-primary" href="{{ route('materialClinica.edit',$material->id) }}">Editar</a>
			
			{!! Form::open(['method' => 'Delete','route' => ['materialClinica.destroy', $material->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        
		</td>
	</tr>
	@endforeach
	</table>
	{!! $materiales->render() !!}
@endsection