@extends('layouts.main')
@section('breadcrumb')

<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Master</li>
        <li class="breadcrumb-item"><a href="{{ Route('form.get.view') }}">Form</a></li>
    </ol>
</nav>

@endsection
@section('content')

<div class="grid grid-cols-12 gap-6 mt-5">
    <div id="master-form" class="intro-y col-span-12 overflow-auto lg:overflow-visible"></div>
</div>

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
                    <form action="/form/delete" method="post" id="delete-form">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" class="input-form-id">
                        <a data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button form="delete-form" class="btn btn-danger w-24">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section ( "js" )
<script src="{{ asset('js/view/form.js') }}" defer></script>
@endSection