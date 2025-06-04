<?php

namespace App\Http\Controllers;

use App\Models\Construction;
use App\Http\Requests\StoreConstructionRequest;
use App\Http\Requests\UpdateConstructionRequest;
use App\Models\Province;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;

class ConstructionController extends Controller
{
    public function index(Request $request)
    {
        $query = Construction::with('provinces');

        if ($request->filled('province_id')) {
            $query->where('province_id', $request->province_id);
        }

        $constructions = $query->get();
        $provinces = Province::all();
        return view("constructions.list", ['constructions' => $constructions, 'provinces'=> $provinces]);
    }

    public function create()
    {
        $provinces = Province::all();
        return view("constructions.create", ['provinces' => $provinces]);
    }

    public function store(StoreConstructionRequest $request)
    {
        Construction::create($request->all());
        return redirect()->back()->with('success', 'Construcción creada correctamente!');
    }

    public function update(UpdateConstructionRequest $request, Construction $construction)
    {
        $construction->update($request->all());
        return redirect()->back()->with('success', 'Construcción actualizado correctamente');
    }

    public function show(Construction $construction)
    {
    
    }

    public function edit(Construction $construction){

    }

    public function destroy(Construction $construction)
    {
        Construction::find($construction->id)->delete();
        return redirect()->back()->with('success','Construcción eliminada correctamente');
    }

    public function reportMonthly(Request $request)
    {
        $month = $request->input('month');
        $startMonth = Carbon::parse($month)->startOfMonth();
        $endMonth = Carbon::parse($month)->endOfMonth();

        $provinces = Province::with(['constructions' => function ($q) use ($startMonth, $endMonth) {
        $q->where(function ($query) use ($startMonth, $endMonth) {
        $query->whereBetween('start_date', [$startMonth, $endMonth])
              ->orWhereBetween('end_date', [$startMonth, $endMonth])
              ->orWhere(function ($query) use ($startMonth, $endMonth) {
                  $query->where('start_date', '<', $startMonth)
                        ->where('end_date', '>', $endMonth);
              });
        })->with([
        'constructionMachines.machine.type_machines',
        'constructionMachines.maintenances' => function ($q) use ($startMonth, $endMonth) {
            $q->whereBetween('date', [$startMonth, $endMonth]);
        }
        ]);
        }])->get();


        if ($provinces->every(fn($p) => $p->constructions->isEmpty())) {
        return redirect()->back()->with('error', 'No hay datos disponibles para generar el reporte del mes seleccionado.');
        }

        foreach ($provinces as $province) {
            $province->total_km = 0;
            $province->total_mantenimientos = 0;

            foreach ($province->constructions as $construction) {
                foreach ($construction->constructionMachines as $cm) {
                    $province->total_km += $cm->km_traveled ?? 0;
                    $province->total_mantenimientos += $cm->maintenances->count();
                }
            }
        }
        $pdf = app(PDF::class);
        $pdf->loadView('pdf.report-monthly', [
        'provinces' => $provinces,
        'startMonth' => $startMonth,
        'endMonth' => $endMonth
        ]);
        return $pdf->stream("reporte_mensual_{$month}.pdf");
    }
}
