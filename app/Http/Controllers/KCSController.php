<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelompokCalonSiswa;
use App\Models\ProsesPSB;

class KCSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inputkcs()
    {
        $data = ProsesPSB::all()->where('status', 1);
        return view('admin.inputkcs', ['data' => $data]);
    }

    public function kcs()
    {
        $data = KelompokCalonSiswa::all();
        return view('admin.kcs', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'ppsb_id' => 'required',
                'kapasitas' => 'required',
            ],
            [
                'ppsb_id.required' => 'Harap pilih Proses PSB!',
            ]
        );

        $kcs = new KelompokCalonSiswa(
            [
                'nama' => $request->nama,
                'ppsb_id' => $request->ppsb_id,
                'kapasitas' => $request->kapasitas,
                'keterangan' => $request->keterangan,
            ]
        );
        $kcs->save();
        return redirect()->route('dashboard.psb.kcs')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $data = KelompokCalonSiswa::where('kcs_id', $request->kcs_id);

        if ($request->filled('nama')) {
            $data->update([
                'nama' => $request->nama,
            ]);
        }
        if ($request->filled('kapasitas')) {
            $data->update([
                'kapasitas' => $request->kapasitas,
            ]);
        }
        if ($request->filled('keterangan')) {
            $data->update([
                'keterangan' => $request->keterangan,
            ]);
        }
        return back()->with('success', 'Data berhasil diupdate.');
    }

    public function delete(Request $request)
    {
        KelompokCalonSiswa::where('kcs_id', $request->kcs_id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
