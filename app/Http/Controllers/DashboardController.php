<?php

namespace App\Http\Controllers;

use App\Services\BuildingService;
use App\Services\FormService;
use App\Services\MaintenanceService;
use App\Services\ValueService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(MaintenanceService $maintenanceService, FormService $formService, ValueService $valueService, BuildingService $buildingService)
    {
        $this->maintenanceService = $maintenanceService;
        $this->buildingService = $buildingService;
        $this->formService = $formService;
        $this->valueService = $valueService;
    }

    public function index(Request $request)
    {
        $maintenances = $this->maintenanceService->handleGetAllMaintenance();
        $buildings = $this->buildingService->handleGetAllBuilding($request);
        $forms = $this->formService->handleGetAllForm($request);
        $values = $this->valueService->handleGetAllValue($request);

        return view('dashboard', [
            'maintenances' => $maintenances,
            'buildings' => $buildings,
            'forms' => $forms,
            'values' => $values,
        ]);
    }
}
