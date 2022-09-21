<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PayLater;
use App\Models\PembiayaanAnggota;
use App\Models\TransaksiPembiayaanAnggota;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PayLaterController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:paylater-list|paylater-create|paylater-edit|paylater-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:paylater-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:paylater-edit', ['only' => ['edit', 'update', 'angsuran']]);
        $this->middleware('permission:paylater-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $paylaterAll = PayLater::all();

        return view('admin.paylater-anggota.index', compact('paylaterAll'));
    }

    public function edit($id)
    {
        $paylaterID = PayLater::findOrFail($id);

        return view('admin.paylater-anggota.edit', compact('paylaterID'));
    }

    public function show($id)
    {
        $detailPaylater = PayLater::findOrFail($id);

        return view('admin.paylater-anggota.show', compact('detailPaylater'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $bukti_bayar = time() . '.' . $request->bukti_bayar->hashName();
        $request->bukti_bayar->move(public_path('images/bukti_transfer'), $bukti_bayar);

        PayLater::where('id', $id)
            ->update([
                'bukti_bayar' => $bukti_bayar,
                'status' => 'Dibayar'
            ]);

        return redirect()->route('paylater-anggota.index')
            ->with('success_message', 'Berhasil membayar paylater anggota');
    }

    public function angsuran($id)
    {
        $angsuran = PayLater::findOrFail($id);
        $cicilan = TransaksiPembiayaanAnggota::where('kode_pembiayaan', $angsuran->kode_paylater)->groupBy('kode_pembiayaan')->sum('setor_bayar');

        return view('admin.paylater-anggota.angsuran', compact('angsuran', 'cicilan'));
    }

    public function storeAngsuran(Request $request)
    {
        $request->validate([
            'kode_paylater' => 'required|string',
            'user_id' => 'required|numeric',
            'setor_bayar' => 'required|numeric',
            'keterangan_setor' => 'required|string|max:255',
            'pelunasan' => 'required|string|max:255'
        ]);

        $pelunasan = $request->pelunasan;

        TransaksiPembiayaanAnggota::create([
            'kode_pembiayaan' => $request->kode_paylater,
            'user_id' => $request->user_id,
            'setor_bayar' => $request->setor_bayar,
            'keterangan_setor' => $request->keterangan_setor,
            'tgl_bayar' => Carbon::now()
        ]);

        PayLater::where('kode_paylater', $request->kode_paylater)
            ->update([
                'status' => $pelunasan
            ]);

        return redirect()->route('paylater-anggota.index')
            ->with('success_message', 'Berhasil menambahkan angsuran paylater');
    }
}
