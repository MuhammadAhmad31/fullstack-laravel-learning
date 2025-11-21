<div class="w-full max-w-xl mx-auto bg-white p-6 rounded shadow">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if ($method !== 'POST')
            @method($method)
        @endif

        @foreach ($fields as $key => $field)
            @php
                $name = strtolower($key);

                $labelText = is_array($field) ? $field['label'] ?? $key : $field;
                $inputType = is_array($field) ? $field['type'] ?? 'text' : 'text';

                $value = $model[$name] ?? null;

                $formatter = $formatters[$name] ?? null;
            @endphp

            <div class="mb-5">
                <label class="block font-medium mb-1">{{ $labelText }}</label>

                @if ($formatter)
                    @php
                        $view = is_array($formatter) ? $formatter['view'] : $formatter;
                        $options = is_array($formatter) ? $formatter['options'] ?? [] : [];
                    @endphp

                    @include($view, [
                        'name' => $name,
                        'valueSelected' => $value,
                        'value' => $value,
                        'options' => $options,
                        'model' => $model,
                        'errors' => $errors,
                    ])
                @else
                    <input type="{{ $inputType }}" name="{{ $name }}" value="{{ old($name, $value) }}"
                        class="w-full border px-3 py-2 rounded">
                @endif

                @if ($errors && $errors->has($name))
                    <p class="text-red-500 text-sm mt-1">
                        {{ $errors->first($name) }}
                    </p>
                @endif
            </div>
        @endforeach


        <div class="mt-6 flex justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">
                {{ $submitText }}
            </button>
        </div>
    </form>
</div>
