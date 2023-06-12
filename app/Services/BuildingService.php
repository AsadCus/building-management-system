<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Room;
use App\Models\Floor;
use App\Models\Form;
use Illuminate\Http\Request;
use App\Models\LoginLocation;
use App\Models\Value;

class BuildingService
{
    public function __construct(LoginLocation $loginlocation, Floor $floor, Room $room,Form $form ,Value $value)
    {
        $this->loginlocation = $loginlocation;
        $this->floor = $floor;
        $this->room = $room;
        $this->form = $form;
        $this->value = $value;
    }

    public function handleGetAllBuilding($request)
    {
        $maintenance_id = $request->input('maintenance_id');
        $location_id = $request->input('location_id');
        $floor_id = $request->input('floor_id');
        $room_id = $request->input('room_id');
        $fromDate = Carbon::now()->subDays(1);
        $toDate = Carbon::now()->subDays(0);

        $datas = $this->loginlocation
        ->with([
            'floors' => function ($query) use($floor_id){
                $query->where('status', 'active');
                $query->when($floor_id, function ($query, $floor_id){return $query->where('id', $floor_id);});
            }, 
            'floors.rooms' => function ($query) use($room_id){
                $query->where('status', 'active');
                $query->when($room_id, function ($query, $room_id){return $query->where('id', $room_id);});
            }, 
            'floors.rooms.values' => function ($query) use($maintenance_id){$query->when($maintenance_id, function ($query, $maintenance_id){
                return $query->whereHas('form', function ($query) use($maintenance_id){
                    $query->where('maintenance_id', $maintenance_id);
                });
            });}, 
        ])
        ->when($location_id, function ($query, $location_id){return $query->where('id', $location_id);})
        ->get();

        $forms = $this->form->get();
        
        $datas->map(function ($data) use($fromDate, $toDate, $forms){
            $data->floors->map(function ($floor) use($fromDate, $toDate, $forms){
                $valueFloor = $floor->values
                // ->whereBetween('created_at', [$fromDate, $toDate])
                ;
                if (count($floor->values)) {
                    $floor['checked_at'] = (count($valueFloor) ? $valueFloor->last()->updated_at->format('d-m-Y H:i:s') : null);
                } else {
                    $floor['checked_at'] = null;
                }
                $floor->rooms->map(function ($room) use($fromDate, $toDate, $forms){
                    $valueRoom = $room->values
                    // ->whereBetween('updated_at', [$fromDate, $toDate])
                    ;
                    if (count($room->values)) {
                        $room['checked_at'] = (count($valueRoom) ? $valueRoom->last()->updated_at->format('d-m-Y H:i:s') : null);
                    } else {
                        $room['checked_at'] = null;
                    }
                    // unset($room->values);
                    return $room;
                });
                // unset($floor->values);
                return $floor;
            });
            return $data;
        });

        return $datas;
    }

    public function handlePostStoreBuilding($request)
    {
        $reqData = $request->validate([
            'location_name' => 'required|unique:login_locations',
            'regional' => 'required',
            'latitude' => '',
            'longitude' => '',
            'description' => 'required',
            'address' => 'required',
        ]);

        $reqData['status'] = 'active';
        $reqData['latitude'] = $request->latitude ?? '';
        $reqData['longitude'] = $request->longitude ?? '';

        $data = $this->loginlocation->create($reqData);
        return ($data);
    }

    public function handleGetAllFloor($request)
    {
        $location_id = $request->input('location_id');
        $data = $this->floor
        ->when($location_id, function ($query, $location_id){return $query->where('location_id', $location_id);})->get();
        return $data;
    }

    public function handlePostStoreFloor($request)
    {
        $reqData = $request->validate([
            'location_id' => 'required',    
            'name' => 'required',
            'no_room_category' => '',
            'description' => 'required',     
            'status' => '',
        ]);

        $reqData['status'] = 'active';

        $data = $this->floor->create($reqData);
        return ($data);
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

        $data = $this->room->create($reqData);
        return ($data);
    }

    public function handleGetAllBuildingForSelect()
    {
        return $this->loginlocation->select("location_name")->get();
    }
}