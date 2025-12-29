@props(['type' => 'text'])

<input
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
        'block w-full rounded-lg border-gray-300 px-4 py-3 text-base
         focus:border-indigo-500 focus:ring-indigo-500'
    ]) }}
/>
