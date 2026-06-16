<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ReportController extends Controller
{
    /**
     * Guardar un nuevo reporte anónimo
     */
    public function store(StoreReportRequest $request)
    {
        $data = $request->validated();

        $report = Report::create([
            'id' => (string) Str::uuid(),

            // anonimato real
            'user_uuid' => (string) Str::uuid(),

            // datos del formulario
            'category' => $data['category'],
            'description' => $data['description'],
            'location' => $data['location'] ?? null,
            'frequency' => $data['frequency'] ?? null,
            'victim_type' => $data['victim_type'] ?? null,
            'aggressors' => $data['aggressors'] ?? 1,
            'emotion' => $data['emotion'] ?? null,
            'intensity' => $data['intensity'] ?? 3,

            // estado inicial del caso
            'status' => 'pending',
        ]);

        return redirect('/reports')->with('success', 'Reporte enviado correctamente');
    }

    /**
     * Listar reportes (panel admin o test)
     */
    public function index()
    {
        $reports = Report::latest()->get();

        return view('reports.index', compact('reports'));
    }

    /**
     * Ver un reporte específico
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);

        return view('reports.show', compact('report'));
    }

    /**
     * Cambiar estado del reporte (admin / centro educativo)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:pending,reviewed,escalated,resolved'
        ]);

        $report = Report::findOrFail($id);
        $report->status = $request->status;
        $report->save();

        return back()->with('success', 'Estado actualizado correctamente');
    }
}
