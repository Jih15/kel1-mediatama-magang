<?php

namespace App\Http\Controllers\Role\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transactions::with(['user', 'category'])->get();
        // dd($transaction);
        return view('role.admin.transaction.index', ['transaction' => $transaction]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all(); // ambil semua user
        $categories = Categories::all(); // ambil semua kategori
        return view('role.admin.transaction.create', compact('categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validasi input
        $validated = $request->validate([
            'name'          => 'required|string',
            'email'         => 'required|email',
            'category_id'   => 'required|exists:categories,category_id',
            'amount'        => 'required|numeric|min:1',
            'description'   => 'nullable|string',
            'file.*'        => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:10240', // 10MB
        ]);

        // Cek atau buat user baru berdasarkan email
        // $user = User::firstOrCreate(
        //     ['email' => $validated['email']],
        //     [
        //         'name' => $validated['name'],
        //         'password' => bcrypt('default123'),
        //         'role' => 'manager',
        //     ]
        // );

        // Ambil kategori
        $category = Categories::find($validated['category_id']);
        // dd($category);

        // Upload file jika ada
        $filePaths = [];
        if ($request->hasFile('file')) {
            foreach ($request->file('file') as $file) {
                $filePaths[] = $file->store('uploads/receipts', 'public');
            }
        }
        $user = Auth::user();
        // Simpan transaksi
        $transaction = Transactions::create([
            'user_id'       => $user->user_id,
            'type'          => "income",
            'category_id'   => $category->category_id,
            'amount'        => $validated['amount'],
            'date'          => now(),
            'description'   => $validated['description'] ?? '',
            'receipt_file'  => implode(',', $filePaths),
        ]);




        // Redirect ke halaman index dengan pesan sukses
        return redirect()
            ->route('admin.transaction.index')
            ->with('success', 'Transaction created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /**
         Perhatikan isi dari data transaksi, tampilkan semuanya.
         */
        return view('role.admin.transaction.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Categories::all();
        return view('role.admin.transaction.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /** Yang perlu diterima store
         1. type =>pakai dropdown => enum ('income','expense') => required|in:income,expense
         2. category_id =>pakai dropdown =>  required|exists:categories,category_id
         3. date => pakai input date => required|date|before_or_equal:today
         4. description => pakai input textarea => required
         5. amount => pakai input number => required|numeric|min:1
         6. receipt_file => pakai input file => nullable|mimes:jpg|max:2048 => simpan di storage/app/public/uploads/bukti-transaksi
          
         */

        /**
         untuk proses simpan pakai 
         $simpan= Transaction::find($id);
         $simpan=> type =$request['type'];
         $simpan=> category_id = $request['category_id'];

         .....
         $simpan=> save()

         */

        /**
         Hapus receipt_file lama dari storage/app/public/uploads/bukti-transaksi/
         Masukkan receipt_file baru storage/app/public/uploads/bukti-transaksi/
         */

        /**
          cek apakah amount > 10000000
          jika true, maka create notification
          $manager= Users::Select('email')->where('role',manager)->get

          $notifikasi = new Notifications;
          .....
          $notifikasi->sent_to = $manager['email'];
          $notifikasi->save();
         */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
