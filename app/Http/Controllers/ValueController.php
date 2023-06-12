<?php

namespace App\Http\Controllers;

use App\Services\ValueService;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    public function __construct(ValueService $valueService)
    {
        $this->valueService = $valueService;
    }

    public function index(Request $request)
    {
        $values = $this->valueService->handleGetAllValueIndex($request);
        // dd($values);
        return view('master.value.index', [
            'values' => $values,
        ]);
    }

    public function create()
    {
        // $values = $this->valueService->handleGetAllValueIndex($request);
        return view('master.value.create', [
            // 'values' => $values,
        ]);
    }

    public function store(Request $request)
    {
        $this->valueService->handlePostStoreValue($request);
        return redirect()->route('master.value.index');
    }

    // API

    public function getAllValueIndexApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->valueService->handleGetAllValueIndex($request)], 200);
    }

    public function getAllValueApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->valueService->handleGetAllValue($request)], 200);
    }

    public function postStoreValueApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->valueService->handlePostStoreValue($request)], 200);
    }
    
    public function postStoreFileApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->valueService->handlePostFile($request)], 200);
    }

    // public function getAllValueForSelect()
    // {
    //     $value = $this->valueService->handleGetAllValueForSelect();
    //     $data = [];
    //     foreach ($value as $item) {
    //         $data[] = $item->title;
    //     }
    //     return response()->JSON($data,200);
    // }
}
