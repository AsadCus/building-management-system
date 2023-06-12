@extends('layouts.main')
@section('breadcrumb')

<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Master</li>
        <li class="breadcrumb-item"><a href="{{ Route('maintenance.get.view') }}">Maintenance</a></li>
        {{-- @if (count($maintenances) == 1)
        <li class="breadcrumb-item"><a href="#">{{ $maintenances[0]->maintenance }}</a></li>
        @endif --}}
    </ol>
</nav>

@endsection
@section('content')

<div class="grid grid-cols-12 gap-6 mt-5">
    <div id="master-maintenance" class="intro-y col-span-12 overflow-auto lg:overflow-visible"></div>
</div>

{{-- <button class="btn" id="button-tes" data-id="1">coba</button> --}}

{{-- @if (count($maintenances) > 1)
<div class="text-2xl font-medium leading-8 mt-3"><a href="{{ Route('maintenance.view') }}">Maintenance</a></div>
<div class="grid grid-cols-12 gap-6 mt-5">
    @foreach ($maintenances as $item)
    <a href="/maintenance?maintenance_id={{ $item->id }}" class="col-span-12 sm:col-span-4 xl:col-span-2 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">   
                <div class="font-medium leading-8 mt-3">
                    {{ $item->maintenance }} 
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<hr class="mt-8">
@endif
<div class="text-2xl font-medium leading-8 mt-3">{{ (count($maintenances) > 1) ? 'Forms' : $maintenances[0]->maintenance }}</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    @foreach ($forms as $item)
    <a href="#" class="col-span-12 sm:col-span-4 xl:col-span-2 intro-y">
        <div class="report-box zoom-in">
            <div class="box p-5">   
                <div class="font-medium leading-8 mt-3">{{ $item->title }}</div>
            </div>
        </div>
    </a>
    @endforeach
</div> --}}

{{-- MODAL --}}

<div id="modal-delete" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-slate-500 mt-2">Do you really want to delete these records? <br>This process cannot
                        be undone.</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <form action="/maintenance/delete" method="post" id="delete-maintenance">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" class="input-maintenance-id">
                        <a data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button form="delete-maintenance" class="btn btn-danger w-24">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section ( "js" )
<script src="{{ asset('js/view/maintenance.js') }}" defer></script>
@endSection