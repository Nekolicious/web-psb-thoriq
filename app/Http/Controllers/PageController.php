<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormulirAktif;
use App\Models\KelompokCalonSiswa;
use App\Models\ProsesPSB;
use App\Models\CalonSiswa;
use App\Models\FotoSiswa;
use App\Models\Kelulusan;

class PageController extends Controller
{

    public function daftar()
    {
        return view('user.formdaftar');
    }

    public function daftarpaud()
    {
        $data = FormulirAktif::all()->where('kcs_id', 1);
        return view('user.formpaud', ['data' => $data]);
    }

    public function daftartpa()
    {
        $data = FormulirAktif::all()->where('kcs_id', 2);
        return view('user.formtpa', ['data' => $data]);
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

        $FotoSiswa = new FotoSiswa;
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

        $updateData = CalonSiswa::where('calon_id', $CalonSiswa->id);
        $nodaftar = ($kode->kode) . (str_pad($CalonSiswa->id, 3, '0', STR_PAD_LEFT));
        $updateData->update([
            'nodaftar' => $nodaftar,
        ]);

        return back()->with('success', 'Terimakasih telah mendaftar, Nomor pendaftaran anda [' . $nodaftar . ']');
    }

    public function kelulusanpaud()
    {
        try {
            $filterkcs = FormulirAktif::where('id', '1')->select('kcs_id')->get()->toArray();
            $includedata = CalonSiswa::whereIn('kcs_id', $filterkcs)->select('calon_id')->get()->toArray();
            $siswa = CalonSiswa::whereIn('calon_id', $includedata)->select('calon_id')->get()->toArray();
            $data = Kelulusan::where('status', '1')->whereIn('calon_id', $siswa)->get();
            return view('user.kelulusanpaud', ['data' => $data]);
        } catch (\Throwable $th) {
            return back()->route('home')->withErrors('Belum ada data!');
        }
    }

    public function kelulusantpa()
    {
        try {
            $filterkcs = FormulirAktif::where('id', '2')->select('kcs_id')->get()->toArray();
            $includedata = CalonSiswa::whereIn('kcs_id', $filterkcs)->select('calon_id')->get()->toArray();
            $siswa = CalonSiswa::whereIn('calon_id', $includedata)->select('calon_id')->get()->toArray();
            $data = Kelulusan::where('status', '1')->whereIn('calon_id', $siswa)->get();
            return view('user.kelulusanpaud', ['data' => $data]);
        } catch (\Throwable $th) {
            return back()->route('home')->withErrors('Belum ada data!');
        }
    }
}
