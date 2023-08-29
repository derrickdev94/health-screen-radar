@props([
    'disabled' => false,
    'name',
    'type'=>'text',
    'value'=>'',
    'previewmode'=>0,
    'required'=>false
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

<input wire:model={{ str_replace(' ','_',$name)}}
    @readonly($previewmode==1) @required($required==true)
    @disabled($disabled==true)  id={{str_replace(' ', '-', $name)}}
    name={{ str_replace(' ','_',$name)}} type={{$type}}
    {!! $attributes->class([
        'w-full block dark:bg-gray-900 dark:text-gray-300',
        'border-gray-300 py-1 dark:border-gray-700 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600'=>$noPreview,
        'rounded-sm bg-gray-50 py-1 my-0 outline-none border-0 focus:ring-0'=>$inPreview,
        ])->merge() !!}
 />
