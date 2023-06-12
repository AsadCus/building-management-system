<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FormService;
use App\Services\MaintenanceService;
use Illuminate\Support\Facades\Redirect;

class FormController extends Controller
{
    public function __construct(FormService $formService, MaintenanceService $maintenanceService)
    {
        $this->formService = $formService;
        $this->maintenanceService = $maintenanceService;
    }

    public function index(Request $request)
    {
        $forms = $this->formService->handleGetAllForm($request);
        return view('master.form.index', [
            'forms' => $forms,
        ]);
    }

    public function create()
    {
        $maintenances = $this->maintenanceService->handleGetAllMaintenance();
        return view('master.form.create', [
            'maintenances' => $maintenances,
        ]);
    }

    public function store(Request $request)
    {
        $this->formService->handlePostStoreForm($request);
        return redirect('form');
    }

    public function edit($id)
    {
        try {
            $form = $this->formService->handleGetEditForm($id);
            return view('master.form.edit', [
                'form' => $form,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $this->formService->handlePutUpdateForm($request);
            return redirect('form');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->formService->handleGetDestroyForm($request);
            return redirect('form');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    // API

    public function getAllFormApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->formService->handleGetAllForm($request)], 200);
    }

    public function getAllFormForSelect()
    {
        $form = $this->formService->handleGetAllFormForSelect();
        $data = [];
        foreach ($form as $item) {
            $data[] = $item->title;
        }
        return response()->JSON($data,200);
    }
}
