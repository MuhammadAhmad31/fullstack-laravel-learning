@extends('layouts.admin')

@section('title', 'Dashboard Admin')
@section('header', 'Dashboard')

@section('content')
    <x-data-table 
        :headers="['ID', 'Title', 'Content']"
        
        :items="$dataTable"
        editable="true"
        creatable="true"
        deletable="true"

        createRoute="posts.create"
        deleteRoute="posts.delete"
        editRoute="posts.edit"
    />

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
@endsection