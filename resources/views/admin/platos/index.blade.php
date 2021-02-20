@extends('adminlte::page')

@section('title', 'Restaurante a domicilio')

@section('content_header')
    <h1>Lista de platos</h1>
@stop

@section('content')
    @livewire('admin.platos-index')
@endsection

