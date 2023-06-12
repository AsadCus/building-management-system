@extends('layouts.main')
@section('breadcrumb')
<nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Master</li>
        <li class="breadcrumb-item"><a href="{{ Route('building.get.view') }}">Building</a></li>
    </ol>
</nav>
@endsection
@section('content')

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Add Building</h2>
</div>

<!-- BEGIN: Form Layout -->
<form id="createBuilding" action="{{ Route('building.post.store') }}" method="post" class="intro-y box p-5 mt-5">
    @csrf
    <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
        <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 mr-2">
                <polyline points="6 9 12 15 18 9"></polyline>
            </svg> Building
        </div>
        <div class="mt-3">
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Building Name</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="" name="location_name" type="text" class="form-control" placeholder="Building name" required>
                    {{-- <div class="form-help text-right">Maximum character 0/70</div> --}}
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Description</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                        <div class="leading-relaxed text-slate-500 text-xs mt-3">
                            <div>Make sure the building description provides a detailed explanation of building so that it is easy to understand.</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    {{-- <input id="" name="maintenance" type="text" class="form-control" placeholder="Maintenance name"> --}}
                    <textarea class="w-full p-2 rounded" name="description" id="" rows="5" required>Description here</textarea>
                    {{-- <div class="form-help text-right">Maximum character 0/70</div> --}}
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Regional</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="" name="regional" type="text" class="form-control" placeholder="Jakarta, Surabaya, etc" required>
                    {{-- <div class="form-help text-right">Maximum character 0/70</div> --}}
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Latitude</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Optional</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="" name="latitude" type="text" class="form-control" placeholder="">
                    {{-- <div class="form-help text-right">Maximum character 0/70</div> --}}
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Longitude</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Optional</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <input id="" name="longitude" type="text" class="form-control" placeholder="">
                    {{-- <div class="form-help text-right">Maximum character 0/70</div> --}}
                </div>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                <div class="form-label xl:w-64 xl:!mr-10">
                    <div class="text-left">
                        <div class="flex items-center">
                            <div class="font-medium">Address</div>
                            <div
                                class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">
                                Required</div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-3 xl:mt-0 flex-1">
                    <textarea class="w-full p-2 rounded" name="address" id="" rows="5" required>Address here</textarea>
                    {{-- <div class="form-help text-right">Maximum character 0/70</div> --}}
                </div>
            </div>
        </div>
    </div>
</form>
<div class="flex justify-end flex-row gap-2 mt-5">
    <a type="button" href="{{Route('building.get.view')}}" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 md:w-52">Cancel</a>
    <a form="createBuilding" href="{{Route('building.create')}}" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 md:w-52">Save &amp; Add New</a>
    <button form="createBuilding" class="btn py-3 btn-primary md:w-52">Create</button>
</div>

<!-- END: Form Layout -->

@endsection