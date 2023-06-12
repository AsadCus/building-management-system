<?php

namespace App\Services;

use App\Models\Form;
use Illuminate\Http\Request;

class FormService
{
    public function __construct(Form $form)
    {
        $this->form = $form;
    }

    public function handleGetAllForm($request)
    {
        $maintenance_id = $request->input('maintenance_id');
        $status = 'active';
        $forms =  $this->form->when($maintenance_id, function ($query, $maintenance_id){return $query->where('maintenance_id', $maintenance_id);})->when($status, function ($query, $status){return $query->where('status', $status);})->with('maintenance')->get();

        return $forms;
    }
    
    public function handlePostStoreForm($request)
    {
        $reqData = $request->validate([
            'maintenance_id' => 'required',
            'title' => 'required|unique:forms',
            'subtitle' => 'required',
            'placeholder' => '',
            'hint' => '',  
            'type' => 'required',  
            'additional_value' => '',
        ]);

        if ($request->is_mandatory == "true" || $request->is_mandatory == "on") {
            $isMandatory = true;
        } else {
            $isMandatory = false;
        }
        
        $reqData['is_mandatory'] = $isMandatory;
        $reqData['status'] = 'active';
        $reqData['placeholder'] = $request->placeholder ?? '';
        $reqData['hint'] = $request->hint ?? '';
        $reqData['additional_value'] = $request->additional_value ?? '';

        $data = $this->form->create($reqData);
        return ($data);
    }

    public function handleGetEditForm($id)
    {   
        $data = $this->form->find($id);
        return $data;
    }

    public function handlePutUpdateForm($request)
    {
        $hint = $request->hint ?? '';
        $placeholder = $request->placeholder ?? '';
        $additional_value = $request->additional_value ?? '';

        $this->form->find($request->id)->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle, 
            'placeholder' => $placeholder,
            'type' => $request->type,
            'hint' => $hint,
            'additional_value' => $additional_value,
        ]);
    }

    public function handleGetDestroyForm($request)
    {
        // dd($request->id);
        $data = $this->form->findorfail($request->id);
        $data->delete();
    }

    public function handleGetAllFormForSelect()
    {
        return $this->form->select("title")->get();
    }
}