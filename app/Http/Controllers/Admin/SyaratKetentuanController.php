<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SyaratKetentuan;
use Illuminate\Http\Request;

class SyaratKetentuanController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:syarat-ketentuan-list|syarat-ketentuan-create|syarat-ketentuan-edit|syarat-ketentuan-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:syarat-ketentuan-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:syarat-ketentuan-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:syarat-ketentuan-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $syaratKetentuan = SyaratKetentuan::all();

        return view('admin.syarat-ketentuan.index', compact('syaratKetentuan'));
    }

    public function create()
    {
        return view('admin.syarat-ketentuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required',
        ]);

        SyaratKetentuan::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('syarat-ketentuan.index')
            ->with('success_message', 'Berhasil menambah syarat ketentuan');
    }

    public function show($id)
    {
        $snk = SyaratKetentuan::where('id', $id)->get();

        return view('admin.syarat-ketentuan.show', compact('snk'));
    }
}
