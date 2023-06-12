<?php

namespace App\Http\Controllers;

use App\Services\BuildingService;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    public function __construct(BuildingService $buildingService)
    {
        $this->buildingService = $buildingService;
    }

    public function index(Request $request)
    {
        $buildings = $this->buildingService->handleGetAllBuilding($request);
        $floors = $this->buildingService->handleGetAllFloor($request);
        return view('master.building.index', [
            'buildings' => $buildings,
            'floors' => $floors,
        ]);
    }

    public function create(Request $request)
    {
        $buildings = $this->buildingService->handleGetAllBuilding($request);
        return view('master.building.create', [
            'buildings' => $buildings
        ]);
    }
    
    public function store(Request $request)
    {
        $this->buildingService->handlePostStoreBuilding($request);
        return redirect('building');
    }

    // BGN API

    public function getAllBuildingApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->buildingService->handleGetAllBuilding($request)], 200);
    }

    public function postStoreBuildingApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->buildingService->handlePostStoreBuilding($request)], 200);
    }

    public function postStoreBuildingFloorApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->buildingService->handlePostStoreFloor($request)], 200);
    }

    public function postStoreBuildingRoomApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->buildingService->handlePostStoreRoom($request)], 200);
    }

    public function getAllBuildingForSelect()
    {
        $building = $this->buildingService->handleGetAllBuildingForSelect();
        $data = [];
        foreach ($building as $item) {
            $data[] = $item->location_name;
        }
        return response()->JSON($data,200);
    }

    // END API
}
