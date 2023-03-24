<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\FotoSiswa;
use App\Models\KelompokCalonSiswa;
use App\Models\Kelulusan;
use App\Models\ProsesPSB;

class CalonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inputcalon()
    {
        $data = KelompokCalonSiswa::all();
        return view('admin.inputcalon', ['data' => $data]);
    }

    public function data()
    {
        $data = CalonSiswa::all();
        return view('admin.datacalon', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kcs_id' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg|max:2048',
            'jeniskelamin' => 'required',
            'tempatlahir' => 'required',
            'tgllahir' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'namaortu' => 'required',
            'pendidikanortu' => 'required',
            'pekerjaanortu' => 'required',
            'teleponortu' => 'required',
            'alamatortu' => 'required',
        ], [
            'kcs_id.required' => 'Harap pilih kelompok calon siswa!'
        ]);

        $CalonSiswa = new CalonSiswa([
            'nama' => $request->nama,
            'kcs_id' => $request->kcs_id,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tgllahir' => $request->tgllahir,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat' => $request->alamat,
            'namaortu' => $request->namaortu,
            'pendidikanortu' => $request->pendidikanortu,
            'pekerjaanortu' => $request->pekerjaanortu,
            'teleponortu' => $request->teleponortu,
            'alamatortu' => $request->alamatortu,
        ]);

        $FotoSiswa = new FotoSiswa();
        if ($request->file('foto')->isValid()) {
            $fileName = time() . '_' . preg_replace('/\s+/', '', $request->nama) . '.' . $request->file('foto')->getClientOriginalExtension();
            $filePath = $request->file('foto')->storeAs('uploads', $fileName, 'public');
            $FotoSiswa->filename = $fileName;
            $FotoSiswa->path = '/storage/' . $filePath;
            $FotoSiswa->save();
        }
        $CalonSiswa->foto_id = $FotoSiswa->id;
        $CalonSiswa->save();
        $ppsb = KelompokCalonSiswa::where('kcs_id', $request->kcs_id)->first('ppsb_id');
        $kode = ProsesPSB::where('ppsb_id', $ppsb->ppsb_id)->first('kode');

        $UpdateNoDaftar = CalonSiswa::where('calon_id', $CalonSiswa->id);
        $UpdateNoDaftar->update([
            'nodaftar' => ($kode->kode) . (str_pad($CalonSiswa->id, 3, '0', STR_PAD_LEFT)),
        ]);
        return redirect()->route('dashboard.psb.calon')->with('success', 'Data berhasil ditambahkan.');
    }

    public function status(Request $request)
    {
        $data = CalonSiswa::where('calon_id', $request->calon_id);

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

    public function editcalon($id)
    {
        $data = CalonSiswa::all()->where('calon_id', $id);
        $datakcs = KelompokCalonSiswa::all();
        return view('admin.editcalon', ['data' => $data, 'datakcs' => $datakcs]);
    }

    public function update(Request $request)
    {
        $data = CalonSiswa::where('calon_id', $request->calon_id);

        $data->update([
            'nama' => $request->nama,
            'kcs_id' => $request->kcs_id,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tgllahir' => $request->tgllahir,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat' => $request->alamat,
            'namaortu' => $request->namaortu,
            'pendidikanortu' => $request->pendidikanortu,
            'pekerjaanortu' => $request->pekerjaanortu,
            'teleponortu' => $request->teleponortu,
            'alamatortu' => $request->alamatortu,
        ]);

        // $FotoSiswa = FotoSiswa::where('foto_id', $fotoId);
        // if ($request->file('foto')->isValid()) {
        //     $fileName = time() . '_' . preg_replace('/\s+/', '', $request->nama).'.'. $request->file('foto')->getClientOriginalExtension();
        //     $filePath = $request->file('foto')->storeAs('uploads', $fileName, 'public');
        //     $FotoSiswa->filename = $fileName;
        //     $FotoSiswa->path = '/storage/' . $filePath;
        // }
        $FotoSiswa = new FotoSiswa();
        if ($request->file('foto')->isValid()) {
            $fileName = time() . '_' . preg_replace('/\s+/', '', $request->nama) . '.' . $request->file('foto')->getClientOriginalExtension();
            $filePath = $request->file('foto')->storeAs('uploads', $fileName, 'public');
            $FotoSiswa->filename = $fileName;
            $FotoSiswa->path = '/storage/' . $filePath;
            $FotoSiswa->save();
        }
        $data->update([
            'foto_id' => $FotoSiswa->id,
        ]);

        return redirect()->route('dashboard.psb.calon')->with('success', 'Data berhasil diupdate.');
    }

    public function delete(Request $request)
    {
        CalonSiswa::where('calon_id', $request->calon_id)->delete();
        return back()->with('success', 'Data berhasil dihapus');
    }

    // Kelulusan
    public function kelulusan()
    {
        $data = Kelulusan::all();
        $datakcs = KelompokCalonSiswa::all();
        $datapsb = ProsesPSB::all();

        $exludedata = Kelulusan::where('status', '1')->select('calon_id')->get()->toArray();
        $datacalon = CalonSiswa::whereNotIn('calon_id', $exludedata)->get();
        return view('admin.kelulusan', ['data' => $data, 'datacalon' => $datacalon, 'datakcs' => $datakcs, 'datapsb' => $datapsb]);
    }

    public function lulus(Request $request)
    {
        $data = Kelulusan::updateOrCreate(
            [
                'calon_id' => $request->calon_id,
            ],
            [
                'status' => '1',
            ]
        );
        return redirect()->back()->with('response', 1);
    }

    public function tolak(Request $request)
    {
        $data = Kelulusan::where('id', $request->id);
        $data->update([
            'status' => '0',
        ]);
        return back()->with('success', 'Status Siswa Telah Diubah');
    }
}
