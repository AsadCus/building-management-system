<?php

namespace App\Services;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomService
{
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function handleGetAllRoom($request)
    {
        $floor_id = $request->input('floor_id');
        $data = $this->room->with('floor')
        ->when($floor_id, function ($query, $floor_id){return $query->where('floor_id', $floor_id);})->get();
        return $data;
    }

    public function handlePostStoreRoom($request)
    {
        $reqData = $request->validate([
            'floor_id' => 'required',    
            'name' => 'required',
            'description' => 'required',     
            'status' => '',
        ]);

        $reqData['status'] = 'active';
        // dd($reqData);

        $data = $this->room->create($reqData);
        return $data;
    }

    public function handleGetAllFloorForSelect()
    {
        return $this->room->select("name")->get();
    }
}