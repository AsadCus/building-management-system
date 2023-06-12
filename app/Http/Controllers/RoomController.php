<?php

namespace App\Http\Controllers;

use App\Services\FloorService;
use App\Services\RoomService;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function __construct(RoomService $roomService, FloorService $floorService)
    {
        $this->roomService = $roomService;
        $this->floorService = $floorService;
    }

    public function index(Request $request)
    {
        $rooms = $this->roomService->handleGetAllRoom($request);
        return view('master.room.index', [
            'rooms' => $rooms,
        ]);
    }

    public function create(Request $request)
    {
        $floors = $this->floorService->handleGetAllFloorSelect();
        return view('master.room.create', [
            'floors' => $floors,
        ]);
    }

    public function store(Request $request)
    {
        $this->roomService->handlePostStoreRoom($request);
        return redirect('room');
    }

    // Api
    public function getAllRoomApi(Request $request)
    {
        return response()->JSON(['status' => 200,'message' => 'success','data' => $this->roomService->handleGetAllRoom($request)], 200);
    }

    public function getAllRoomForSelect()
    {
        $floor = $this->roomService->handleGetallRoomForSelect();
        $data = [];
        foreach ($floor as $item) {
            $data[] = $item->title;
        }
        return response()->JSON($data,200);
    }
}
