@props([
    'disabled' => false,
    'name',
    'value',
    'type'=>'checkbox'
])

@php
    $checkbox;
    if($type=='checkbox'){
        $checkbox =true;
    }else{
        $checkbox=false;
    }
@endphp
<div class="flex items-center">
    <input wire:change="updateCheckedRisks($event.target.checked,$event.target.value)" wire:model={{str_replace(' ','_',$name)}} type={{$type}} name={{ str_replace(' ','_',$name)}} @isset($value) value="{{$value}}" @endif id={{str_replace(' ', '-', $value)}} name={{ str_replace(' ','_',$name)}} {{ $disabled ? 'disabled' : '' }} {!! $attributes->class(['w-4 h-4 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 shadow-sm','rounded-full'=>!$checkbox,'rounded'=>$checkbox]) !!}>
    <label for={{ str_replace(' ','-',$value)}} class="ml-2 text-md font-medium text-gray-900 dark:text-gray-300">{{ucfirst($value)?? $slot}}</label>
</div>
