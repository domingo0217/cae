{{-- Instanciando layout --}}
@extends('layouts/main')

{{-- Titulo de la pagina --}}
@section('title')
    Listado de  Permisos
@endsection

{{-- Contenido de la pagina --}}
@section('content')

    @include('layouts.status')
   @include('layouts.errors')

      <div class="section white z-depth-0">
      <div class="row">

<div class="col-md-12 box-white">

@foreach($roles as $rol)

    <div class="table-responsive" >

	    <table  class="table table-hover table-striped" cellspacing="0" width="100%">

                <thead>
                <th colspan="5" style="text-align: center; background-color: 	#FFD700;" >Permisos del Usuario {{ $rol->name }}</th>
                </thead>
				<thead>
						    <th>codigo</th>
								<th>nombre</th>
								<th>slug</th>
								<th>descripcion</th>
							    <th>Acción</th>

				</thead>
	    <tbody>


	    @foreach($rol->permissions as $permiso)


		 <tr role="row" class="odd" id="filaP_{{ $permiso->id }}">
			<td>{{ $permiso->id }}</td>
			<td><span class="label label-default">{{ $permiso->name or "Ninguno" }}</span></td>
			<td class="mailbox-messages mailbox-name"><a href="javascript:void(0);" style="display:block"></i>&nbsp;&nbsp;{{ $permiso->slug  }}</a></td>
			<td>{{ $permiso->description }}</td>

			</td>
            <td>

                         <td><a href="borrar_rol/{{ $rol->id }}"  class="btn-floating btn-flat waves-effect waves-dark white tooltipped" data-position="right" data-delay="50" data-tooltip="Eliminar"><i class="material-icons yellow-text text-darken-3">delete</i></a></td>

		   </tr>

	    @endforeach
		</tbody>
		</table>
</div>
</div>
	</div>
@endforeach
</div>
</div>
</div>
@endsection
