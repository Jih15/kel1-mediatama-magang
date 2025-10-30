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
        $query = Transactions::with('category');

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('month') && $request->filled('year')) {
            $query->whereMonth('date', $request->month)
                ->whereYear('date', $request->year);
        }

        $data = $query->orderBy('date', 'DESC')->get();

        return view('role.manager.report.index', compact('data', 'categories', 'users'));
    }


    public function generateReport(ReportRequest $request)
    {

        //disini buat dompdfnya
        //panggil template role.manager.report.report_doc
    }
}
