@extends('layouts.main')

    @section('title')
        Agregar Documento
    @endsection

    @section('content')
        <div class="section white z-depth-1">
            @include('layouts.errors')
            <div class="row">
                <form class="col s8 offset-s2" action="/document" method="post">
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col s12  input-field">
                            <input type="text" name="document" id="document" class="validate" required data-length="50" maxlength="50" minlength="3" value="{{ old('document')}}">
                            <label data-error="incorrecto" data-success="correcto" for="document">Documento</label>
                        </div>
                    </div>
                    <a href="/document" class="btn-flat waves-effect waves-red red-text text-darken-3">Atr&aacute;s</a>
                    <button class="btn yellow darken-3 waves-effect right" type="submit">Agregar</button>
                </form>
            </div>
        </div>
    @endsection
