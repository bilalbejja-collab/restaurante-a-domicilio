@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    @if (Auth::user()->roles->first()->name == 'Admin')
        <a class="btn btn-secondary btn-sm float-right" href="{{ route('admin.repartidores.create') }}">
            Nuevo repartidor
        </a>
    @endif

    <h1>Lista de repartidores</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>
                {{ session('info') }}
            </strong>
        </div>
    @endif

    @livewire('admin.repartidores-index')
@endsection
