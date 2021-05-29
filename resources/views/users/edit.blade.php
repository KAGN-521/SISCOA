@extends('adminlte::page')

@section('content_header')
<h1>Editar Usuario</h1>
@stop

@section('content')
<div class="container text-style">

    <form action="/users/{{ $user->id }}" method="POST" id="edit-user-form">

        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="col">

                <div class="form-group">
                    <x-input name="name" title="Nombre Completo" value="{{$user->name}}"></x-input>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="col">

                <div class="form-group">
                    <x-input name="email" title="Correo electrónico" value="{{$user->email}}" kind="email"></x-input>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-4">

                <div class="form-group">
                    <x-input name="phone" title="Teléfono" value="{{$user->phone}}"></x-input>
                </div>

            </div>

            <div class="col-4">

                <div class="form-group">
                    <x-input name="position" title="Puesto" value="{{$user->position}}"></x-input>
                </div>

            </div>

            <div class="col-4">
                <div class="form-group">
                    <label for="role" class="col control-label required" id="role">Rol</label>
                    <div class="col">
                        <select class="form-control {{ $errors->has('role_id') ? 'is-invalid' : '' }}"
                            value="{{ old('role_id') ?? $user->role_id}}" name="role_id" id="role_id-input">

                            @foreach ($roles as $role)
                                <option {{ $user->role_id == $role->id ? 'selected' : '' }} value="{{$role->id}}">
                                    {{ $role->label }}
                                </option>
                            @endforeach
                            
                        </select>
                        @error('role_id')
                            <div id="error" class="invalid-feedback">{{ ucfirst($message) }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <div class="form-group">
                    <x-input name="password" title="Contraseña" kind="password"></x-input>
                </div>

            </div>
            <div class="col">

                <div class="form-group">
                    <x-input name="password_confirmation" title="Confirmar Contraseña" kind="password"></x-input>
                </div>

            </div>
        </div>


        <div class="row mb-4">
            <div class="col d-flex flex-row-reverse">
                <button id="edit-user-btn" type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar </button>
                <button type="button" class="btn btn-danger mr-2" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-times"></i> Cancelar
                </button>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Regresar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            ¿Seguro que desea cancelar?
                        </div>

                        <div class="modal-footer">
                            <a href="/users" class="btn btn-secondary mr-2">
                                <i class="fas fa-check"></i> Si
                            </a>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i> No </button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>

</div>

@include('users._change')

@stop

@section('footer')
        
    <div class="row">
      <strong> © 2021 Universidad Nacional de Costa Rica. Sistema de Control de Asistencia (SISCOA). </strong>
    </div>

    <div class="row">
      <strong> Desarrollado por Jefferson Hernández Flores. </strong>
   </div>

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
@stop

@section('js')
<script src="{{ asset('js/users/edit.js') }}"></script>

@stop
