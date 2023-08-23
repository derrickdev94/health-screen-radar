@props([
    'labelvalue'=>'',
    'disabled'=>false,
    'name',
    'options'=>[],
    'messages'=>[],
    'direction'=>'col',
    'labelClass'=>'',
    'comment'=>'',
    'previewmode'=> 0,
    'required'=>true,


])
@php
$block;
    if($direction=='col'){
        $block=true;
    }elseif($direction == 'row'){
        $block=false;
    }
@endphp

<div class="flex flex-col grow">
    <div @class(['flex', 'flex-col'=>$block, 'flex-row'=>!$block, 'gap-2'=>!$block, 'items-center'=>!$block,'justify-items-start'=>$block])>
        <x-input-label :labelfor="$name" :labelvalue="$labelvalue" class="{{$labelClass}}" />
        <x-select-input :id="$name" :previewmode="$previewmode" :required="$required" :disabled="$disabled" :name="$name" :options="$options" />
    </div>
    <p class=" text-sm">{{ ($comment) }}</p>
    <x-input-error class="mt-2" :messages="$messages" />
</div>
