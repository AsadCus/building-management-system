<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FormService;
use App\Services\ValueService;
use App\Services\MaintenanceService;
use Illuminate\Support\Facades\Redirect;

class MaintenanceController extends Controller
{
    public function __construct(FormService $formService, ValueService $valueService, MaintenanceService $maintenanceService)
    {
        $this->maintenanceService = $maintenanceService;
        $this->formService = $formService;
        $this->valueService = $valueService;
    }

    public function index(Request $request)
    {
        try {
            $maintenances = $this->maintenanceService->handleGetAllMaintenance();
            $forms = $this->formService->handleGetAllForm($request);
            return view('master.maintenance.index', [
                'maintenances' => $maintenances,
                'forms' => $forms,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    // public function checkup(Request $request)
    // {
    //     $forms = $this->formService->handleGetAllForm($request);
    //     return view('maintenance.create', ['forms' => $forms]);
    // }

    public function create(Request $request)
    {
        try {
            $forms = $this->formService->handleGetAllForm($request);
            return view('master.maintenance.create', [
                'forms' => $forms
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
    
    public function store(Request $request)
    {
        try {
            $this->maintenanceService->handlePostStoreMaintenance($request);
            return redirect('maintenance');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $maintenance = $this->maintenanceService->handleGetEditMaintenance($id);
            return view('master.maintenance.edit', [
                'maintenance' => $maintenance,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $this->maintenanceService->handlePutUpdateMaintenance($request);
            return redirect('maintenance');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->maintenanceService->handleGetDestroyMaintenance($request);
            return redirect('maintenance');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    // BGN API //

    public function getAllFormApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->formService->handleGetAllForm($request)], 200);
    }

    public function postStoreFormApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->formService->handlePostStoreForm($request)], 200);
    }
    
    public function getAllMaintenanceApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->maintenanceService->handleGetAllMaintenanceApi($request)], 200);
    }

    public function getAllMaintenanceIndexApi()
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->maintenanceService->handleGetAllMaintenance()], 200);
    }

    public function postStoreMaintenanceApi(Request $request)
    {
        return response()->JSON(['status'=>200,'message' => 'success', 'data' => $this->maintenanceService->handlePostStoreMaintenance($request)], 200);
    }

    public function getAllMaintenanceForSelect()
    {
        $maintenance = $this->maintenanceService->handleGetAllMaintenanceForSelect();
        $data = [];
        foreach ($maintenance as $item) {
            $data[] = $item->maintenance;
        }
        return response()->JSON($data,200);
    }

    // END API //
}
