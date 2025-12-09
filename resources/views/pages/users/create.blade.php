@extends('layouts.admin')

@section('content')
        <x-form-component
            :fields="[
                'name' => ['label' => 'Name', 'type' => 'text'],
                'email' => ['label' => 'Email', 'type' => 'email'],
                'password' => ['label' => 'Password', 'type' => 'password'],
            ]"
            :errors="$errors"
            :action="route('users.store')"
            method="POST"
            submitText="Simpan User"
        />

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>

@endsection