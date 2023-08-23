@props([
    'labelvalue'=>'',
    'value'=>'',
    'disabled'=>false,
    'type'=>'text',
    'name',
    'messages'=>[],
    'direction'=>'col',
    'labelClass'=> '',
    'previewmode'=> 0,
    'required'=>true,
    'inputClass'=>''

])
@php
    $block;
    $readonlyClass = '';
    if($direction=='col'){
        $block=true;
    }elseif($direction == 'row'){
        $block=false;
    }

    if($previewmode ==1){
        $readonlyClass = $inputClass;
    }
@endphp
    <div class="flex flex-col mb-0 pb-0 grow">
        <div @class(['flex', 'flex-col'=>$block, 'flex-row'=>!$block, 'gap-2'=>!$block, 'items-center'=>!$block,'justify-items-start'=>$block])>
            <x-input-label :labelfor="$name" :labelvalue="$labelvalue" class="{{$labelClass}}" />
            <x-text-input :id="$name" :previewmode="$previewmode" :required="$required" :disabled="$disabled" :name="$name" :value="$value" :type="$type" class="{{$inputClass}}" />
        </div>
        <x-input-error class="mt-2" :messages="$messages" />
    </div>

