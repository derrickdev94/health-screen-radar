@props([
    'labelvalue'=>'',
    'disabled'=>false,
    'name',
    'messages'=>[],
    'direction'=>'col',
    'labelClass'=> '',
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
    $block;
    if($direction=='col'){
        $block=true;
    }elseif($direction == 'row'){
        $block=false;
    }
@endphp
<textarea wire:model={{ str_replace(' ','_',$name)}} id={{str_replace(' ', '-', $name)}} name={{ str_replace(' ','_',$name)}}
    @readonly($previewmode==1) @required($required==true) @disabled($disabled==true)

    {!! $attributes->class([
        'w-full dark:bg-gray-800 dark:border-gray-700 dark:text-gray-100 rounded-md',
        'border-gray-300 py-1 rounded-md shadow-sm focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600'=>$noPreview,
        'rounded-md bg-gray-50 py-1 my-0 outline-none border-0 focus:ring-0'=>$inPreview,
        ])->merge()
    !!} >
</textarea>



