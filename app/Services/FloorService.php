<?php

namespace App\Services;

use App\Models\Floor;
use Illuminate\Http\Request;

class FloorService
{
    public function __construct(Floor $floor)
    {
        $this->floor = $floor;
    }

    public function handleGetAllFloorSelect()
    {
        $data = $this->floor->with('loginlocation')->where('no_room_category', 0)->get();
        return $data;
    }

    public function handleGetAllFloor($request)
    {
        $location_id = $request->input('location_id');
        $data = $this->floor->with('loginlocation')
        ->when($location_id, function ($query, $location_id){return $query->where('location_id', $location_id);})->get();
        return $data;
    }

    public function handlePostStoreFloor($request)
    {
        $reqData = $request->validate([
            'location_id' => 'required',    
            'name' => 'required|unique:floors',
            'no_room_category' => '',
            'description' => 'required',     
        ]);

        if ($request->no_room_category == "true" || $request->no_room_category == "on") {
            $noRoom = true;
        } else {
            $noRoom = false;
        }
        $reqData['no_room_category'] = $noRoom;
        $reqData['status'] = 'active';
        

        $data = $this->floor->create($reqData);
        return ($data);
    }

    public function handleGetAllFloorForSelect()
    {
        return $this->floor->select("name")->get();
    }
}