@extends('layouts.main')
@section('breadcrumb')

<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
    </ol>
</nav>

@endsection
@section('content')

@endsection

@section ( "js" )
<script src="{{ asset('js/view/dashboard.js') }}" defer></script>
@endSection