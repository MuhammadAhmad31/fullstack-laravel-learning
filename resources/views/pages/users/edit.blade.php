@extends('layouts.admin')

@section('content')
        <x-form-component
            :fields="[
                'name' => ['label' => 'Name', 'type' => 'text'],
                'email' => ['label' => 'Email', 'type' => 'email'],
            ]"
            :model="$existingUser"
            :action="route('users.update', $existingUser['id'])"
            method="PUT"
            submitText="Simpan User"
        />

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
@endsection
