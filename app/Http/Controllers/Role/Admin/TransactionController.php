<?php

namespace App\Http\Controllers\Role\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Http\Requests\TransactionRequest;
use App\Models\Categories;
use App\Models\Notifications;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transactions::with(['user', 'category'])->get();
        // dd($transaction);
        return view('role.admin.transaction.index', ['transaction' => $transaction]);
    }

    public function create()
    {
        $users = User::all(); // ambil semua user
        $categories = Categories::all(); // ambil semua kategori
        return view('role.admin.transaction.create', compact('categories', 'users'));
    }

 
    public function store(TransactionRequest $request)
    {
        $request->all();

        $simpan = new Transactions();
        $simpan->type = $request->type;                        
        $simpan->category_id = $request->category_id;          
        $simpan->date = $request->date;                        
        $simpan->description = $request->description;          
        $simpan->amount = $request->amount;                    
        $simpan->user_id = Auth::id();                         

       
        if ($request->hasFile('receipt_file')) {
            $path = $request->file('receipt_file')->store('uploads/bukti-transaksi', 'public');
            $simpan->receipt_file = $path;
        }

        $simpan->save(); // Simpan transaksi ke database

        if ($simpan->amount > 10000000) {
        $manager = User::where('role', 'manager')->select('email')->first();
        // dd($manager);
        
            $notifikasi = new Notifications();
            $notifikasi->transaction_id = $simpan->transaction_id;
            $notifikasi->sent_to = $manager['email'];
            $notifikasi->sent_at = now();
            // $notifikasi->message = "Transaksi besar tercatat: Rp " . number_format($simpan->amount);
            $notifikasi->save();

            // Kirim email
            app(\App\Http\Controllers\MailController::class)
                ->index($manager['email'],"Transaksi besar tercatat: Rp " . number_format($simpan->amount) );
        
    }


             
        return redirect()
            ->route('admin.transaction.index')
            ->with('success', 'Transaksi berhasil disimpan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        /**
         Perhatikan isi dari data transaksi, tampilkan semuanya.
         */
         $transaction = Transactions::with('category', 'user')->findOrFail($id);

        return view('role.admin.transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $category = Categories::all();
        $transaction = Transactions::where('transaction_id', $id)->first();

        return view('role.admin.transaction.edit', compact('category', 'transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, string $id)
    {
        $transaksi = Transactions::findOrFail($id);

        $transaksi->type = $request->type;
        $transaksi->category_id = $request->category_id;
        $transaksi->date = $request->date;
        $transaksi->description = $request->description;
        $transaksi->amount = $request->amount;

        if ($request->hasFile('receipt_file')) {

            if ($transaksi->receipt_file && file_exists(storage_path('app/public/uploads/bukti-transaksi/' . $transaksi->receipt_file))) {
                unlink(storage_path('app/public/uploads/bukti-transaksi/' . $transaksi->receipt_file));
            }

            $file = $request->file('receipt_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/bukti-transaksi', $fileName);

            $transaksi->receipt_file = $fileName;
        }

        $transaksi->save();
        if ($transaksi->amount > 10000000) {
            $managers = User::select('email')->where('role', 'manager')->get();

            foreach ($managers as $manager) {
                $notif = new Notifications();
                $notif->sent_to = $manager->email;
                $notif->message = "Transaksi besar diperbarui sebesar Rp " . number_format($transaksi->amount);
                $notif->save();
            }
        }

        return redirect()
            ->route('admin.transaction.index')
            ->with('success', 'Transaksi berhasil diperbarui!');


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
        $transaction = Transactions::findOrFail($id);
        $transaction->delete();

        return redirect()->route('admin.transaction.index')
                        ->with('success', 'Transaction deleted successfully');
    }
}
