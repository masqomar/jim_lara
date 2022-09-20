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
}
