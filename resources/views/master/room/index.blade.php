@extends('layouts.main')
@section('breadcrumb')

<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Master</li>
        <li class="breadcrumb-item"><a href="{{ Route('room.get.view') }}">Room</a></li>
    </ol>
</nav>

@endsection
@section('content')

<div class="grid grid-cols-12 gap-6 mt-5">
    <div id="master-room" class="intro-y col-span-12 overflow-auto lg:overflow-visible"></div>
</div>

@endsection