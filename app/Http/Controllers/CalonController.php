<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalonSiswa;
use App\Models\CalonSiswaPAUD;
use App\Models\CalonSiswaTPA;
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

    public function inputpaud()
    {
        $data = KelompokCalonSiswa::all();
        return view('admin.inputcalonpaud', ['data' => $data]);
    }

    public function inputtpa()
    {
        $data = KelompokCalonSiswa::all();
        return view('admin.inputcalontpa', ['data' => $data]);
    }

    public function data()
    {
        $data = CalonSiswa::all();
        return view('admin.datacalon', ['data' => $data]);
    }

    public function storepaud(Request $request)
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

            // 'calon_id' => 'required',

            'nomorinduk' => 'required',
            'citacita' => 'required',
            'hobi' => 'required',
            'jmlsaudara' => 'required',
            'jaraksekolah' => 'required',
            'kendaraan' => 'required',
            'beratbadan' => 'required',
            'tinggibadan' => 'required',
            'lingkarkepala' => 'required',

            'namaayah' => 'required',
            'nikayah' => 'required',
            'tempatlahirayah' => 'required',
            'tgllahirayah' => 'required',
            'teleponayah' => 'required',
            'penghasilanayah' => 'required',
            'pendidikanayah' => 'required',
            'pekerjaanayah' => 'required',
            'alamatayah' => 'required',

            'namaibu' => 'required',
            'nikibu' => 'required',
            'tempatlahiribu' => 'required',
            'tgllahiribu' => 'required',
            'teleponibu' => 'required',
            'penghasilanibu' => 'required',
            'pendidikanibu' => 'required',
            'pekerjaanibu' => 'required',
            'alamatibu' => 'required',

            // 'namaortu' => 'required',
            // 'pendidikanortu' => 'required',
            // 'pekerjaanortu' => 'required',
            // 'teleponortu' => 'required',
            // 'alamatortu' => 'required',
        ], [
            'nama.required' => 'Harap isi nama siswa',
            // 'kcs_id.required' => 'Harap isi kelompok calon siswa',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus dalam bentuk PNG/JPG/JPEG',
            'foto.uploaded' => 'Foto maksimal ukuran 2MB',
            'jeniskelamin.required' => 'Harap isi kolom jenis kelamin',
            'tempatlahir.required' => 'Harap isi kolom tempat lahir',
            'tgllahir.required' => 'Harap isi kolom tanggal lahir',
            'agama.required' => 'Harap isi kolom agama',
            'kewarganegaraan.required' => 'Harap isi kolom kewarganegaraan',
            'alamat.required' => 'Harap isi kolom alamat',

            'calon_id.required' => 'Calon id dibutuhkan',

            'nomorinduk.required' => 'Harap isi kolom nomor induk',
            'citacita.required' => 'Harap isi kolom cita-cita',
            'hobi.required' => 'Harap isi kolom hobi',
            'jmlsaudara.required' => 'Harap isi kolom jumlah saudara',
            'jaraksekolah.required' => 'Harap isi kolom jarak sekolah',
            'kendaraan.required' => 'Harap isi kolom kendaraan',
            'beratbadan.required' => 'Harap isi kolom berat badan',
            'tinggibadan.required' => 'Harap isi kolom tinggi badan',
            'lingkarkepala.required' => 'Harap isi kolom lingkar kepala',

            'namaayah.required' => 'Harap isi nama ayah',
            'nikayah.required' => 'Harap isi kolom NIK ayah',
            'tempatlahirayah.required' => 'Harap isi kolom tempat lahir ayah',
            'tgllahirayah.required' => 'Harap isi kolom tanggal lahir ayah',
            'teleponayah.required' => 'Harap isi kolom nomor telepon ayah',
            'penghasilanayah.required' => 'Harap isi kolom penghasilan ayah',
            'pendidikanayah.required' => 'Harap isi kolom pendidikan ayah',
            'pekerjaanayah.required' => 'Harap isi kolom pekerjaan ayah',
            'alamatayah.required' => 'Harap isi kolom alamat ayah',

            'namaibu.required' => 'Harap isi nama ibu',
            'nikibu.required' => 'Harap isi kolom NIK ibu',
            'tempatlahiribu.required' => 'Harap isi kolom tempat lahir ibu',
            'tgllahiribu.required' => 'Harap isi kolom tanggal lahir ibu',
            'teleponibu.required' => 'Harap isi kolom nomor telepon ibu',
            'penghasilanibu.required' => 'Harap isi kolom penghasilan ibu',
            'pendidikanibu.required' => 'Harap isi kolom pendidikan ibu',
            'pekerjaanibu.required' => 'Harap isi kolom pekerjaan ibu',
            'alamatibu.required' => 'Harap isi kolom alamat ibu',
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
            // 'namaortu' => $request->namaortu,
            // 'pendidikanortu' => $request->pendidikanortu,
            // 'pekerjaanortu' => $request->pekerjaanortu,
            // 'teleponortu' => $request->teleponortu,
            // 'alamatortu' => $request->alamatortu,
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

        $DataPaud = new CalonSiswaPAUD([
            'calon_id' => $CalonSiswa->id,

            'nomorinduk' => $request->nomorinduk,
            'citacita' => $request->citacita,
            'hobi' => $request->hobi,
            'jmlsaudara' => $request->jmlsaudara,
            'jaraksekolah' => $request->jaraksekolah,
            'kendaraan' => $request->kendaraan,
            'beratbadan' => $request->beratbadan,
            'tinggibadan' => $request->tinggibadan,
            'lingkarkepala' => $request->lingkarkepala,

            'namaayah' => $request->namaayah,
            'nikayah' => $request->nikayah,
            'tempatlahirayah' => $request->tempatlahirayah,
            'tgllahirayah' => $request->tgllahirayah,
            'teleponayah' => $request->teleponayah,
            'penghasilanayah' => $request->penghasilanayah,
            'pendidikanayah' => $request->pendidikanayah,
            'pekerjaanayah' => $request->pekerjaanayah,
            'alamatayah' => $request->alamatayah,

            'namaibu' => $request->namaibu,
            'nikibu' => $request->nikibu,
            'tempatlahiribu' => $request->tempatlahiribu,
            'tgllahiribu' => $request->tgllahiribu,
            'teleponibu' => $request->teleponibu,
            'penghasilanibu' => $request->penghasilanibu,
            'pendidikanibu' => $request->pendidikanibu,
            'pekerjaanibu' => $request->pekerjaanibu,
            'alamatibu' => $request->alamatibu,
        ]);
        $DataPaud->save();

        $ppsb = KelompokCalonSiswa::where('kcs_id', $request->kcs_id)->first('ppsb_id');
        $kode = ProsesPSB::where('ppsb_id', $ppsb->ppsb_id)->first('kode');

        $UpdateNoDaftar = CalonSiswa::where('calon_id', $CalonSiswa->id);
        $UpdateNoDaftar->update([
            'nodaftar' => ($kode->kode) . (str_pad($CalonSiswa->id, 3, '0', STR_PAD_LEFT)),
        ]);
        return redirect()->route('dashboard.psb.calon')->with('success', 'Data berhasil ditambahkan.');
    }

    public function storetpa(Request $request)
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

            'calon_id' => 'required',

            'nism' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'hobi' => 'required',
            'citcita' => 'required',
            'anakke' => 'required',
            'jmlsaudara' => 'required',

            'namaayah' => 'required',
            'nikayah' => 'required',
            'tempatlahirayah' => 'required',
            'tgllahirayah' => 'required',
            'pendidikanayah' => 'required',
            'pekerjaanayah' => 'required',
            'teleponayah' => 'required',
            'alamatayah' => 'required',
            'penghasilanayah' => 'required',

            'namaibu' => 'required',
            'nikibu' => 'required',
            'tempatlahiribu' => 'required',
            'tgllahiribu' => 'required',
            'pendidikanibu' => 'required',
            'pekerjaanibu' => 'required',
            'teleponibu' => 'required',
            'alamatibu' => 'required',
            'penghasilanibu' => 'required',
            // 'namaortu' => 'required',
            // 'pendidikanortu' => 'required',
            // 'pekerjaanortu' => 'required',
            // 'teleponortu' => 'required',
            // 'alamatortu' => 'required',
        ], [
            'nama.required' => 'Harap isi nama siswa',
            'kcs_id.required' => 'Harap isi kelompok calon siswa',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus dalam bentuk PNG/JPG/JPEG',
            'foto.uploaded' => 'Foto maksimal ukuran 2MB',
            'jeniskelamin.required' => 'Harap isi kolom',
            'tempatlahir.required' => 'Harap isi kolom',
            'tgllahir.required' => 'Harap isi kolom',
            'agama.required' => 'Harap isi kolom',
            'kewarganegaraan.required' => 'Harap isi kolom',
            'alamat.required' => 'Harap isi kolom',

            // 'calon_id.required' => 'Harap isi kolom',

            'nism.required' => 'Harap isi kolom',
            'nisn.required' => 'Harap isi kolom',
            'nik.required' => 'Harap isi kolom',
            'hobi.required' => 'Harap isi kolom',
            'citcita.required' => 'Harap isi kolom',
            'anakke.required' => 'Harap isi kolom',
            'jmlsaudara.required' => 'Harap isi kolom',

            'namaayah.required' => 'Harap isi kolom',
            'nikayah.required' => 'Harap isi kolom',
            'tempatlahirayah.required' => 'Harap isi kolom',
            'tgllahirayah.required' => 'Harap isi kolom',
            'pendidikanayah.required' => 'Harap isi kolom',
            'pekerjaanayah.required' => 'Harap isi kolom',
            'teleponayah.required' => 'Harap isi kolom',
            'alamatayah.required' => 'Harap isi kolom',
            'penghasilanayah.required' => 'Harap isi kolom',

            'namaibu.required' => 'Harap isi kolom',
            'nikibu.required' => 'Harap isi kolom',
            'tempatlahiribu.required' => 'Harap isi kolom',
            'tgllahiribu.required' => 'Harap isi kolom',
            'pendidikanibu.required' => 'Harap isi kolom',
            'pekerjaanibu.required' => 'Harap isi kolom',
            'teleponibu.required' => 'Harap isi kolom',
            'alamatibu.required' => 'Harap isi kolom',
            'penghasilanibu.required' => 'Harap isi kolom',
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
            // 'namaortu' => $request->namaortu,
            // 'pendidikanortu' => $request->pendidikanortu,
            // 'pekerjaanortu' => $request->pekerjaanortu,
            // 'teleponortu' => $request->teleponortu,
            // 'alamatortu' => $request->alamatortu,
        ]);

        $DataTpa = new CalonSiswaTPA([
            'calon_id' => $request->calon_id,

            'nism' => $request->nism,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'hobi' => $request->hobi,
            'citcita' => $request->citacita,
            'anakke' => $request->anakke,
            'jmlsaudara' => $request->jmlsaudara,

            'namaayah' => $request->namaayah,
            'nikayah' => $request->nikayah,
            'tempatlahirayah' => $request->tempatlahirayah,
            'tgllahirayah' => $request->tgllahirayah,
            'pendidikanayah' => $request->pendidikanayah,
            'pekerjaanayah' => $request->pekerjaanayah,
            'teleponayah' => $request->teleponayah,
            'alamatayah' => $request->alamatayah,
            'penghasilanayah' => $request->penghasilanayah,

            'namaibu' => $request->namaibu,
            'nikibu' => $request->nikibu,
            'tempatlahiribu' => $request->tempatlahiribu,
            'tgllahiribu' => $request->tgllahiribu,
            'pendidikanibu' => $request->pendidikanibu,
            'pekerjaanibu' => $request->pekerjaanibu,
            'teleponibu' => $request->teleponibu,
            'alamatibu' => $request->alamatibu,
            'penghasilanibu' => $request->penghasilanibu,
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
        $DataTpa->save();
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

    public function editcalonpaud($id)
    {
        $data['calon'] = CalonSiswa::where('calon_id', $id)->get();
        $data['kcs'] = KelompokCalonSiswa::all();
        $data['paud'] = CalonSiswaPAUD::where('calon_id', $id)->get();
        return view('admin.editcalonpaud', ['data' => $data]);
    }

    public function editcalontpa($id)
    {
        $data['calon'] = CalonSiswa::where('calon_id', $id)->get();
        $data['kcs'] = KelompokCalonSiswa::all();
        $data['tpa'] = CalonSiswaTPA::where('calon_id', $id)->get();
        return view('admin.editcalontpa', ['data' => $data]);
    }

    public function lihatcalonpaud($id)
    {
        $data['calon'] = CalonSiswa::where('calon_id', $id)->get();
        $data['kcs'] = KelompokCalonSiswa::all();
        $data['paud'] = CalonSiswaPAUD::where('calon_id', $id)->get();
        return view('admin.lihatcalonpaud', ['data' => $data]);
    }

    public function lihatcalontpa($id)
    {
        $data['calon'] = CalonSiswa::where('calon_id', $id)->get();
        $data['kcs'] = KelompokCalonSiswa::all();
        $data['tpa'] = CalonSiswaTPA::where('calon_id', $id)->get();
        return view('admin.lihatcalontpa', ['data' => $data]);
    }

    public function updatepaud(Request $request)
    {
        $data = CalonSiswa::where('calon_id', $request->calon_id);
        $datapaud = CalonSiswaPAUD::where('calon_id', $request->calon_id);

        $data->update([
            'nama' => $request->nama,
            'kcs_id' => $request->kcs_id,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tgllahir' => $request->tgllahir,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat' => $request->alamat,
            // 'namaortu' => $request->namaortu,
            // 'pendidikanortu' => $request->pendidikanortu,
            // 'pekerjaanortu' => $request->pekerjaanortu,
            // 'teleponortu' => $request->teleponortu,
            // 'alamatortu' => $request->alamatortu,
        ]);

        $datapaud->update([
            'nomorinduk' => $request->nomorinduk,
            'citacita' => $request->citacita,
            'hobi' => $request->hobi,
            'jmlsaudara' => $request->jmlsaudara,
            'jaraksekolah' => $request->jaraksekolah,
            'kendaraan' => $request->kendaraan,
            'beratbadan' => $request->beratbadan,
            'tinggibadan' => $request->tinggibadan,
            'lingkarkepala' => $request->lingkarkepala,

            'namaayah' => $request->namaayah,
            'nikayah' => $request->nikayah,
            'tempatlahirayah' => $request->tempatlahirayah,
            'tgllahirayah' => $request->tgllahirayah,
            'teleponayah' => $request->teleponayah,
            'penghasilanayah' => $request->penghasilanayah,
            'pendidikanayah' => $request->pendidikanayah,
            'pekerjaanayah' => $request->pekerjaanayah,
            'alamatayah' => $request->alamatayah,

            'namaibu' => $request->namaibu,
            'nikibu' => $request->nikibu,
            'tempatlahiribu' => $request->tempatlahiribu,
            'tgllahiribu' => $request->tgllahiribu,
            'teleponibu' => $request->teleponibu,
            'penghasilanibu' => $request->penghasilanibu,
            'pendidikanibu' => $request->pendidikanibu,
            'pekerjaanibu' => $request->pekerjaanibu,
            'alamatibu' => $request->alamatibu,
        ]);

        // $FotoSiswa = FotoSiswa::where('foto_id', $fotoId);
        // if ($request->file('foto')->isValid()) {
        //     $fileName = time() . '_' . preg_replace('/\s+/', '', $request->nama).'.'. $request->file('foto')->getClientOriginalExtension();
        //     $filePath = $request->file('foto')->storeAs('uploads', $fileName, 'public');
        //     $FotoSiswa->filename = $fileName;
        //     $FotoSiswa->path = '/storage/' . $filePath;
        // }

        $FotoSiswa = new FotoSiswa;
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $fileName = time() . '_' . preg_replace('/\s+/', '', $request->nama) . '.' . $request->file('foto')->getClientOriginalExtension();
                $filePath = $request->file('foto')->storeAs('uploads', $fileName, 'public');
                $FotoSiswa->filename = $fileName;
                $FotoSiswa->path = '/storage/' . $filePath;
                $FotoSiswa->save();

                $data->update([
                    'foto_id' => $FotoSiswa->id,
                ]);
            }
        }
        return redirect()->route('dashboard.psb.calon')->with('success', $FotoSiswa->id);
    }

    public function updatetpa(Request $request)
    {
        $data = CalonSiswa::where('calon_id', $request->calon_id);
        $datatpa = CalonSiswaTPA::where('calon_id', $request->calon_id);

        $data->update([
            'nama' => $request->nama,
            'kcs_id' => $request->kcs_id,
            'jeniskelamin' => $request->jeniskelamin,
            'tempatlahir' => $request->tempatlahir,
            'tgllahir' => $request->tgllahir,
            'agama' => $request->agama,
            'kewarganegaraan' => $request->kewarganegaraan,
            'alamat' => $request->alamat,
            // 'namaortu' => $request->namaortu,
            // 'pendidikanortu' => $request->pendidikanortu,
            // 'pekerjaanortu' => $request->pekerjaanortu,
            // 'teleponortu' => $request->teleponortu,
            // 'alamatortu' => $request->alamatortu,
        ]);

        $datatpa->update([
            'nism' => $request->nism,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'hobi' => $request->hobi,
            'citacita' => $request->citacita,
            'anakke' => $request->anakke,
            'jmlsaudara' => $request->jmlsaudara,

            'namaayah' => $request->namaayah,
            'nikayah' => $request->nikayah,
            'tempatlahirayah' => $request->tempatlahirayah,
            'tgllahirayah' => $request->tgllahirayah,
            'pendidikanayah' => $request->pendidikanayah,
            'pekerjaanayah' => $request->pekerjaanayah,
            'teleponayah' => $request->teleponayah,
            'alamatayah' => $request->alamatayah,
            'penghasilanayah' => $request->penghasilanayah,

            'namaibu' => $request->namaibu,
            'nikibu' => $request->nikibu,
            'tempatlahiribu' => $request->tempatlahiribu,
            'tgllahiribu' => $request->tgllahiribu,
            'pendidikanibu' => $request->pendidikanibu,
            'pekerjaanibu' => $request->pekerjaanibu,
            'teleponibu' => $request->teleponibu,
            'alamatibu' => $request->alamatibu,
            'penghasilanibu' => $request->penghasilanibu,
        ]);

        // $FotoSiswa = FotoSiswa::where('foto_id', $fotoId);
        // if ($request->file('foto')->isValid()) {
        //     $fileName = time() . '_' . preg_replace('/\s+/', '', $request->nama).'.'. $request->file('foto')->getClientOriginalExtension();
        //     $filePath = $request->file('foto')->storeAs('uploads', $fileName, 'public');
        //     $FotoSiswa->filename = $fileName;
        //     $FotoSiswa->path = '/storage/' . $filePath;
        // }
        $FotoSiswa = new FotoSiswa();
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $fileName = time() . '_' . preg_replace('/\s+/', '', $request->nama) . '.' . $request->file('foto')->getClientOriginalExtension();
                $filePath = $request->file('foto')->storeAs('uploads', $fileName, 'public');
                $FotoSiswa->filename = $fileName;
                $FotoSiswa->path = '/storage/' . $filePath;
                $FotoSiswa->save();

                $data->update([
                    'foto_id' => $FotoSiswa->id,
                ]);
            }
        }
        return redirect()->route('dashboard.psb.calon')->with('success', 'Data berhasil diupdate.');
    }

    public function delete(Request $request)
    {
        if (CalonSiswaPAUD::where('calon_id', $request->calon_id)->exists()) {
            CalonSiswaPAUD::where('calon_id', $request->calon_id)->delete();
        } else {
            CalonSiswaTPA::where('calon_id', $request->calon_id)->delete();
        }
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
