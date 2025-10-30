<?php

namespace App\Http\Controllers\Role\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Categories;
use App\Models\Transactions;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(ReportRequest $request)
    {
        $categories = Categories::all();
        $query = Transactions::with('category');

        // Filter berdasarkan tipe
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // Filter berdasarkan kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Filter berdasarkan bulan dan tahun
        if ($request->filled('month') && $request->filled('year')) {
            $query->whereMonth('date', $request->month)
                ->whereYear('date', $request->year);
        }

        $data = $query->orderBy('DESC')->get();

        return view('role.admin.report.index', compact('data', 'categories', 'request'));
    }

    public function test()
    {
        return view('role.admin.report.index');
    }
}
