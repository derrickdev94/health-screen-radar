@props([
    'labelvalue'=>'',
    'labelfor'=>'',
])
<label @isset($labelfor)  for={{ str_replace(' ', '-', $labelfor)}} @endif {{ $attributes->merge(['class' => 'block font-medium text-md text-gray-700 dark:text-gray-300']) }}>
    {{ ucfirst($labelvalue ?? $slot)}}
</label>
