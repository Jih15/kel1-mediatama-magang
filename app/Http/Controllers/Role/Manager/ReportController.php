<?php

namespace App\Http\Controllers\Role\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Categories;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(ReportRequest $request)
    {
        $users = User::where('role', 'admin')->get();
        $categories = Categories::all();
        $query = Transactions::with('category', 'user');

        // Filter berdasarkan admin
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filter berdasarkan tipe
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter berdasarkan kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter bulan & tahun
        if ($request->filled('month') && $request->filled('year')) {
            $query->whereMonth('date', $request->month)
                ->whereYear('date', $request->year);
        }

        $data = $query->orderBy('date', 'DESC')->get();

        return view('role.manager.report.index', compact('data', 'categories', 'users', 'request'));
    }

    public function generateReport(ReportRequest $request)
    {
        // nanti isi DomPDF disini
        // return view('role.manager.report.report_doc', compact('data', 'request'));
    }
}
