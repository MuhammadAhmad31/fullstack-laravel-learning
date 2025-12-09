@extends('layouts.admin')

@section('content')
        <x-data-table 
            :headers="['ID', 'Title', 'Content']"
            :items="$dataTable"

            creatable="true"
            editable="true"
            deletable="true"

            createRoute="posts.create"
            editRoute="posts.edit"
            deleteRoute="posts.delete"
        />

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
@endsection