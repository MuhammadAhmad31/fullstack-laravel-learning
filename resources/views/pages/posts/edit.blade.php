@extends('layouts.admin')

@section('content')
       <x-form-component
            :fields="[
                'title' => ['label' => 'Title', 'type' => 'text'],
                'content' => ['label' => 'Content'],
            ]"
            :model="$existingPosts"
            :action="route('posts.update', $existingPosts['id'])"
            method="PUT"
            submitText="Update Content"
            :formatters="[
                'content' => 'components.partials.formFormat.textarea',
            ]"
        />

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
@endsection