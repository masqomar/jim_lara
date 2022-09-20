<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:bank-list|bank-create|bank-edit|bank-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:bank-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:bank-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:bank-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $bank = Bank::all();

        return view('admin.bank.index', compact('bank'));
    }

    public function create()
    {
        return view('admin.bank.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_bank' => 'required|numeric',
            'nama_bank' => 'required|string'
        ]);

        Bank::create([
            'kode_bank' => $request->kode_bank,
            'nama_bank' => $request->nama_bank
        ]);

        return redirect()->route('bank.index')
            ->with('success_message', 'Berhasil menambahkan bank baru');
    }
}
