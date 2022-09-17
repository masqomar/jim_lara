<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnggotaTopup;
use App\Models\AnggotaTransaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TopUpAnggotaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:topup-list|topup-create|topup-edit|topup-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:topup-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:topup-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:topup-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $topupAnggota = AnggotaTopup::orderBy('id', 'desc')->get();

        return view('admin.topup-anggota.index', compact('topupAnggota'));
    }

    public function create(Request $request)
    {
        $users = User::get();

        return view('admin.topup-anggota.create', compact('users'));
    }

    public function store(Request $request)
    {
        DB::transaction(
            function () use ($request) {

                $user_id = $request->user_id;
                $nominalTopup = $request->nominal_topup;
                $keterangan = $request->keterangan;


                AnggotaTopup::create([
                    'nominal_topup' => $nominalTopup,
                    'user_id' => $user_id,
                    'tgl_topup' => Carbon::now(),
                    'keterangan' => $keterangan,
                ]);

                AnggotaTransaction::create([
                    'user_id' => $user_id,
                    'kredit'  => 0,
                    'debit'  => $nominalTopup,
                    'tipe'  => 'topup',
                    'jenis'  => 'masuk',
                    'tanggal'  => Carbon::now(),
                    'metode'  => 'Teller',
                    'deskripsi'  => $keterangan
                ]);

                $users = User::where('id', $user_id)->select('saldo')->get()->first();
                $saldoAkhir = $nominalTopup + $users->saldo;
                User::where('id', $user_id)
                    ->update([
                        'saldo' => $saldoAkhir
                    ]);
            }
        );
        return redirect()->route('topup-anggota.index')
            ->with('success_message', 'Berhasil menambah voucher bulanan anggota');
    }
}
