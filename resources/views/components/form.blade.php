@props([
    'method' =>'POST',
    'action',
    'hasFiles'=> false,
    'direction'=>'col'
])

@php
$block;
    if($direction=='col'){
        $block=true;
    }elseif($direction == 'row'){
        $block=false;
    }
@endphp

<form
    method ="{{$method !== 'GET'? 'POST': 'GET'}}"
    @isset($action)
        action ="{{$action}}"
    @endif
    {!! $hasFiles ? 'enctype="multipart/form-data': '' !!}
    {{$attributes->class(['flex','flex-col'=>$block, 'flex-row'=>!$block, 'flex-wrap'=>!$block, 'gap-2'=>!$block, 'items-center'=>!$block,'justify-items-start'=>$block])->merge()}}
   >
    @csrf
    @method($method)

    {{ $slot}}

</form>
