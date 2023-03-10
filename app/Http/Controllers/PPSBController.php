<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProsesPSB;
use App\Models\KelompokCalonSiswa;

class PPSBController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inputppsb()
    {
        return view('admin.inputppsb');
    }

    public function ppsb()
    {
        $data = ProsesPSB::all();
        $datakcs = KelompokCalonSiswa::all();
        return view('admin.psb', ['data' => $data, 'datakcs' => $datakcs]);
    }

    public function store(Request $request)
    {
        if (ProsesPSB::where('kode', $request->kode)->exists()) {
            return back()->withErrors(['Data sudah ada.']);
        } else {
            $request->validate([
                'nama' => 'required',
                'kode' => 'required',
            ]);
            $ProsesPSB = new ProsesPSB([
                'nama' => $request->nama,
                'kode' => strtoupper($request->kode),
                'keterangan' => $request->keterangan,
            ]);
            $ProsesPSB->save();
            return redirect()->route('dashboard.psb.ppsb')->with('success', 'Data berhasil ditambahkan.');
        }
    }

    public function status(Request $request)
    {
        $data = ProsesPSB::where('ppsb_id', $request->ppsb_id);

        if ($request->status == '1') {
            $data->update([
                'status' => '0',
            ]);
        } else {
            $data->update([
                'status' => '1',
            ]);
        }
        return back()->with('success', 'Data berhasil diupdate.');
    }

    public function update(Request $request)
    {
        $data = ProsesPSB::where('ppsb_id', $request->ppsb_id);

        if ($request->filled('nama')) {
            $data->update([
                'nama' => $request->nama,
            ]);
        }
        if ($request->filled('keterangan')) {
            $data->update([
                'keterangan' => $request->keterangan,
            ]);
        }
        return back()->with('success', 'Data berhasil diupdate.');
    }

    public function delete(Request $request) {
        ProsesPSB::where('ppsb_id', $request->ppsb_id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }
}
