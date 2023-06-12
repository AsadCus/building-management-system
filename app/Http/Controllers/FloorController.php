<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FloorService;
use App\Services\BuildingService;
use Illuminate\Support\Facades\Redirect;

class FloorController extends Controller
{
    public function __construct(FloorService $floorService, BuildingService $buildingService)
    {
        $this->floorService = $floorService;
        $this->buildingService = $buildingService;
    }

    public function index(Request $request)
    {
        try {
            $floors = $this->floorService->handleGetAllFloor($request);
            return view('master.floor.index', [
                'floors' => $floors,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function create(Request $request)
    {
        try {
            $buildings = $this->buildingService->handleGetAllBuilding($request);
            return view('master.floor.create', [
                'buildings' => $buildings
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
    
    public function store(Request $request)
    {
        try {
            $this->floorService->handlePostStoreFloor($request);
            return redirect('floor');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    // API

    public function getAllFloorApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->floorService->handleGetAllFloor($request)], 200);
    }

    public function getAllFLoorForSelect()
    {
        $form = $this->floorService->handleGetAllFormForSelect();
        $data = [];
        foreach ($form as $item) {
            $data[] = $item->title;
        }
        return response()->JSON($data,200);
    }
}
