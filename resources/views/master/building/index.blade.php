@extends('layouts.main')
@section('breadcrumb')

<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Master</li>
        <li class="breadcrumb-item"><a href="{{ Route('building.get.view') }}">Building</a></li>
        @if (count($buildings) == 1)    
        <li class="breadcrumb-item"><a href="#">{{ $buildings[0]->location_name }}</a></li>
        @endif
    </ol>
</nav>

@endsection
@section('content')

<div class="grid grid-cols-12 gap-6 mt-5">
    <div id="master-building" class="intro-y col-span-12 overflow-auto lg:overflow-visible"></div>
</div>

{{-- @if (count($buildings) > 1)
<div class="text-2xl font-medium leading-8 mt-3"><a href="{{ Route('building.view') }}">Building</a></div>
<div class="grid grid-cols-12 gap-6 mt-5">
    @foreach ($buildings as $item)
    <a href="/building?location_id={{ $item->id }}" class="col-span-12 sm:col-span-4 xl:col-span-2 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">   
                <div class="font-medium leading-8 mt-3">{{ $item->location_name }}</div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<hr class="mt-8">
@endif
<div class="text-2xl font-medium leading-8 mt-3">{{ (count($buildings) > 1) ? 'Floors' : $buildings[0]->location_name }}</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    @foreach ($floors as $item)
    <a href="#" class="col-span-12 sm:col-span-4 xl:col-span-2 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">   
                <div class="font-medium leading-8 mt-3">{{ $item->name }}</div>
            </div>
        </div>
    </a>
    @endforeach
</div> --}}

@endsection