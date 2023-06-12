<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Value;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceService
{
    public function __construct(Maintenance $maintenance, Value $value)
    {
        $this->maintenance = $maintenance;
        $this->value = $value;
    }
    
    public function handleGetAllMaintenance()
    {
        $data = $this->maintenance->with('forms.values')->get();
        return $data;
    }

    public function handleGetAllMaintenanceApi($request)
    {
        $maintenance_id = $request->input('maintenance_id');
        $location_id = $request->input('location_id'); 
        $floor_id = $request->input('floor_id');
        $room_id = $request->input('room_id');
        $maintenances = $this->maintenance->with('forms.values')
        ->when($maintenance_id, function ($query, $maintenance_id){return $query->where('id', $maintenance_id);})->get();

        //// FUNGSI LAMA ////
        // for ($i=0; $i < count($maintenances); $i++) { 
        //     $checked_at[] = $maintenances[$i]->forms[0]->values
            // ->when($location_id, function ($query, $location_id){return $query->where('location_id', $location_id);})
            // ->when($floor_id, function ($query, $floor_id){return $query->where('floor_id', $floor_id);})
            // ->when($room_id, function ($query, $room_id){return $query->where('room_id', $room_id);})
        //     ->last();

        //     if ($checked_at[$i] ==! null) {
        //         $checked_at[$i] = $checked_at[$i]->updated_at->format('d-m-Y H:i:s');
        //     }
        // }

        // foreach ($maintenances as $key => $item) {
        //     $data[] = [
        //         'id' => $item->id,
        //         'maintenance' => $item->maintenance,
        //         'description' => $item->description,
        //         'frequency' => $item->frequency,
        //         'created_at' => $item->created_at->format('d-m-Y H:i:s'),
        //         'updated_at' => $item->updated_at->format('d-m-Y H:i:s'),
        //         'checked_at' => $checked_at[$key],
        //     ];
        // }

        //// FUNGSI BARU 2.0 ////
        $maintenances->map(function ($maintenance) use($location_id, $floor_id, $room_id){

            //// FUNGSI BARU 1.0 ////
            // $tes = $maintenance->forms->first()->values
            // ->when($location_id, function ($query, $location_id){return $query->where('location_id', $location_id);})
            // ->when($floor_id, function ($query, $floor_id){return $query->where('floor_id', $floor_id);})
            // ->when($room_id, function ($query, $room_id){return $query->where('room_id', $room_id);})
            // ->last();
            // $maintenance['checked_at'] = ($tes != null ? $tes->updated_at->format('d-m-Y H:i:s') : null);
            // $maintenance->forms->map(function ($form) use($location_id, $floor_id, $room_id){
            //     $comot = $form->values
            //     ->when($location_id, function ($query, $location_id){return $query->where('location_id', $location_id);})
            //     ->when($floor_id, function ($query, $floor_id){return $query->where('floor_id', $floor_id);})
            //     ->when($room_id, function ($query, $room_id){return $query->where('room_id', $room_id);})->last();
            //     // $form['tes'] = ($comot != null ? $comot->updated_at->format('d-m-Y H:i:s') : null);
            //     // unset($form->values);
            // });

            $tes = $maintenance->forms->map(function ($form) use($location_id, $floor_id, $room_id){
                $comot = $form->values
                ->when($location_id, function ($query, $location_id){return $query->where('location_id', $location_id);})
                ->when($floor_id, function ($query, $floor_id){return $query->where('floor_id', $floor_id);})
                ->when($room_id, function ($query, $room_id){return $query->where('room_id', $room_id);})->last();
                return $comot;
            });
            $maintenance['checked_at'] = ($tes->first() != null ? $tes->first()->updated_at->format('d-m-Y H:i:s') : null);
            unset($maintenance->forms);
        });
        
        return $maintenances;
    }

    public function handlePostStoreMaintenance($request)
    {
        $reqData = $request->validate([
            'maintenance' => 'required|unique:maintenances',
            'description' => 'required',
            'frequency' => 'required',
            'type' => 'nullable',
        ]); 

        if ($request->type == null) {
            $reqData['type'] = ''; 
        }

        $data = $this->maintenance->create($reqData);
        return ($data);
    }

    public function handleGetEditMaintenance($id)
    {   
        $data = $this->maintenance->find($id);
        return $data;
    }

    public function handlePutUpdateMaintenance($request)
    {
        if ($request->type == null) {
            $type = '';
        }
        $this->maintenance->find($request->id)->update([
            'maintenance' => $request->maintenance,
            'description' => $request->description,
            'frequency' => $request->frequency, 
            'type' => $type,
        ]);
    }

    public function handleGetDestroyMaintenance($request)
    {
        // dd($request->id);
        $data = $this->maintenance->findorfail($request->id);
        $data->delete();
    }

    public function handleGetAllMaintenanceForSelect()
    {
        return $this->maintenance->select("maintenance")->get();
    }
}