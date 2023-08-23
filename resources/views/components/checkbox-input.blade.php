@props([
    'disabled' => false,
    'name',
    'value',
    'type'=>'checkbox',
    'previewmode'=>0,
    'required'=>true,
    'keyindex'=>1
])

@php
    $checkbox;
    $inPreview = false;
    $noPreview = false;
    if($type=='checkbox'){
        $checkbox =true;
    }else{
        $checkbox=false;
    }
    if($previewmode == 1){
        $inPreview = true;
    }else{
        $noPreview = true;
        $inPreview = false;
    }
@endphp
<div class="flex items-center">
    <input wire:model={{str_replace(' ','_',$name)}} type={{$type}}
        name={{ str_replace(' ','_',$name)}}
        @isset($value) value="{{$value}}" @endif
        id={{ $keyindex.'-'.str_replace(' ', '-', $name)}}
        name={{ str_replace(' ','_',$name)}}
        @readonly($previewmode==1) @required($required==true) @disabled($inPreview)
        {!! $attributes->class([
            'w-4 h-4 border-gray-300 dark:border-gray-700 dark:bg-gray-900',
            'dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600',
            'focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm',
            'rounded-full'=>!$checkbox,
            'rounded'=>$checkbox,
            'bg-gray-100 text-gray-300'=>$inPreview
            ])
    !!}>
    <label for={{ $keyindex.'-'.str_replace(' ','-',$name)}} class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">{{ucfirst($value)}}</label>
</div>
