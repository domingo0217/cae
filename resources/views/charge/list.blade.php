@extends('layouts.main')
    @section('title')
        Lista de Cargos
    @endsection

    @section('content')
        <div class="row">
            <div class="section white z-depth-1">
                @include('layouts.status')
                @include('layouts.statusNeg')
                <table class="stripped responsive centered">
                    <thead>
                        <tr>
                            <th data-field="id">C&oacute;digo</th>
                            <th data-field="city">Cargos</th>
                            <th data-field="">
                                <a class="btn-floating tooltipped btn-large waves-effect waves-light yellow darken-3 hoverable center" href="/charge/create" data-position="top" data-delay="50" data-tooltip="Agregar">
                                    <i class="material-icons">add</i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($charge as $charges)
                            <tr>
                                <td>{{ $charges->id }}</td>
                                <td>{{ $charges->charge }}</td>
                                <td>
                                    <a href="/charge/{{ $charges->id }}" class="btn-floating btn-flat waves-effect waves-dark tooltipped" data-position="top" data-delay="50" data-tooltip="Ver">
                                        <i class="material-icons yellow-text text-darken-3">visibility</i>
                                    </a>
                                    <a href="/charge/{{ $charges->id }}/edit" class="btn-floating btn-flat waves-effect waves-dark tooltipped" data-position="top" data-delay="50" data-tooltip="Editar">
                                        <i class="material-icons yellow-text text-darken-3">edit</i>
                                    </a>
                                    <form method="post" action="/charge/{{$charges->id}}" style="display:inline;">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" name="submit" class="btn-floating btn-flat waves-effect waves-dark tooltipped" data-position="top" data-delay="50" data-tooltip="Eliminar">
                                            <i class="material-icons red-text text-darken-3">delete</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $charge->links() }}
                <ul class="pagination center">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
            </div>
        </div>
    @endsection
