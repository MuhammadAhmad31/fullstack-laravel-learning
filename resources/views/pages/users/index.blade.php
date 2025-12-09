@extends('layouts.admin')

@section('content')
        <x-data-table 
            :headers="['ID', 'Name', 'Email']"
            :items="$dataTable"

            creatable="true"
            editable="true"
            deletable="true"

            createRoute="users.create"
            editRoute="users.edit"
            deleteRoute="users.delete"
        />

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
@endsection
