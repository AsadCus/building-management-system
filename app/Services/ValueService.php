<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Value;
use App\Models\Form;
use App\Models\Maintenance;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class ValueService
{
    public function __construct(Value $value, Form $form, Maintenance $maintenance)
    {
        $this->maintenance = $maintenance;
        $this->form = $form;    
        $this->value = $value;
    }

    public function handleGetAllValueIndex($request)
    {
        $data = $this->value->with('form', 'floor', 'room')->get();
        return $data;
    }

    public function handleGetAllValue($request)
    {
        $maintenance_id = $request->input('maintenance_id');
        $location_id = $request->input('location_id');
        $floor_id = $request->input('floor_id');
        $room_id = $request->input('room_id');
        $user = $request->input('user');
        // $fromDate = $request->input('from_date');
        // $toDate = $request->input('to_date');
        // $fromDate = Carbon::now()->subDays(1);
        // $nowDate = Carbon::now();   

        $values = $this->value
        // ->whereBetween('created_at', [$fromDate, $nowDate])
        ->when($maintenance_id, function ($query, $maintenance_id){
            return $query->whereHas('form.maintenance', function ($query) use($maintenance_id){
                $query->where('maintenance_id', $maintenance_id);
            });
        })
        ->when($location_id, function ($query, $location_id){
            return $query->whereHas('room.floor', function ($query) use($location_id){
                $query->where('location_id', $location_id);
            });
        })
        ->when($user, function ($query, $user){
            return $query->where('user', $user);
        })
        ->when($floor_id, function ($query, $floor_id){
            return $query->where('floor_id', $floor_id);
        })
        ->when($room_id, function ($query, $room_id){
            return $query->where('room_id', $room_id);
        })->orderBy('created_at', 'desc')->get()->map(function($item){
            return [
                'form_id' => $item->form_id,
                'user' => $item->user,
                'value' => $item->value,
                'location_id' => $item->floor->location_id,
                'floor_id' => $item->floor_id,
                'room_id' => $item->room_id,
                'created_at' => $item->created_at->format('d-m-Y H:i:s'),
            ];
        });
        
        return [
            'maintenance_id' => $maintenance_id,
            'location_id' => $location_id,
            'floor_id' => $floor_id,
            'room_id' => $room_id,
            'user' => $user,    
            'values' => $values,    
        ];
    }

    public function handlePostStoreValue($request)
    {
        $data = $request->validate([
            'maintenance_id' => 'required',
            'floor_id' => 'required',
            'room_id' => '',
            'form_id' => '',
            'value' => '',
            'user' => '',
        ]);
        $hitung = $this->form->where('maintenance_id', $request->maintenance_id)->get('id');
        // $values = explode('<>', implode('<>', $request->value));
        $values = explode('<>', $request->value);
        for ($i = 0; $i < count($hitung); $i++) { 
            foreach ($hitung as $key => $item) {
                $form_id[] = $item->id;
            }
            
            for ($p = 0; $p < count($hitung); $p++) {
                $tes[$p] = $values[$p];
            }

            $data['row'][] = $this->value->create([
                'maintenance_id' => $request->maintenance_id,
                'floor_id' => $request->floor_id,
                'room_id' => $request->room_id,
                'form_id' => $form_id[$i],
                'user' => $request->user,
                'value' => $tes[$i],
            ]);
        }
        return($data);
    }

    public function handlePostFile($request)
    {
        if(!$request->hasFile('file')) {
            return(null);
        }
        $file = $request->file('file');
        $path = public_path() . '/uploads/images/';
        $file->move($path, $file->getClientOriginalName());
        $pathName = $file->getClientOriginalName();
        // return $pathName;

        $data = $request->validate([
            'maintenance_id' => 'required',
            'floor_id' => 'required',
            'room_id' => '',
            'form_id' => '',
            'value' => '',
            'user' => '',
        ]);
        $hitung = $this->form->where('maintenance_id', $request->maintenance_id)->get('id');


        for ($i = 0; $i < count($hitung); $i++) { 
            foreach ($hitung as $item) {
                $form_id[] = $item->id;
            }

            $data['row'][] = $this->value->create([
                'maintenance_id' => $request->maintenance_id,
                'floor_id' => $request->floor_id,
                'room_id' => $request->room_id,
                'form_id' => $form_id[$i],
                'user' => $request->user,
                'value' => $pathName,
            ]);
        }
        return($data);
    }
}