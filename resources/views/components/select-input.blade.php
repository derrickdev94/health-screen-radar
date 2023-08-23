@props([
    'disabled' => false,
    'name',
    'options'=>['Yes','No'],
    'previewmode'=>0,
    'required'=>true
])
@php
    $inPreview = false;
    $noPreview = false;
    if($previewmode == 1){
        $inPreview = true;
    }else{
        $noPreview = true;
        $inPreview = false;
    }
@endphp

@if($inPreview)
    <input type="hidden" wire:model={{ str_replace(' ','_',$name)}} id={{ 'hidden-'.str_replace(' ','-',$name)}} />
@endif
<select  wire:model={{ str_replace(' ','_',$name)}} id={{ str_replace(' ','-',$name)}} name={{ str_replace(' ','_',$name)}}
 @readonly($previewmode==1) @required($required==true) @disabled($previewmode==1)
    {!! $attributes->class([
            'w-full dark:bg-gray-900 dark:text-gray-300 mt-1 block',
            'border-gray-300 py-1 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600'=>$noPreview,
            'rounded-sm bg-gray-50 py-1 my-0 outline-none border-0 focus:ring-0'=>$inPreview,
        ])
    !!}>
    <option disabled>make a selection ...</option>
        @foreach ($options as $option )
            <option @selected(old(str_replace(' ','_',$name))== $option) value="{{$option}}">{{$option}}</option>
        @endforeach
</select>

