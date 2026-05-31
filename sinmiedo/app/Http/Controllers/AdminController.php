<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Models\ForumPost;

class AdminController extends Controller
{
    public function index()
    {
        $reports     = Report::with('user')->latest()->get();
        $users       = User::where('role', '!=', 'admin')->latest()->get();
        $totalUsers  = User::where('role', 'user')->count();
        $totalPosts  = ForumPost::count();
        $totalReports = Report::count();
        $pendientes  = Report::where('status', 'pendiente')->count();

        return view('admin.index', compact(
            'reports',
            'users',
            'totalUsers',
            'totalPosts',
            'totalReports',
            'pendientes'
        ));
    }

    public function updateReport(Report $report, \Illuminate\Http\Request $request)
    {
        $request->validate([
            'status' => 'required|in:pendiente,revisado,resuelto'
        ]);

        $report->update(['status' => $request->status]);

        return back()->with('success', 'Reporte actualizado.');
    }
}
