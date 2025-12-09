@extends('layouts.admin')

@section('content')
        <x-form-component
            :fields="[
                'title' => ['label' => 'Title', 'type' => 'text'],
                'content' => ['label' => 'Content'],
            ]"
            :errors="$errors"
            :action="route('posts.store')"
            :formatters="[
                'content' => 'components.partials.formFormat.textarea',
            ]"
            method="POST"
            submitText="Simpan Content"
        />

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>

@endsection