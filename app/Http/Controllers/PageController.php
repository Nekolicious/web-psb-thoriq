<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormulirAktif;
use App\Models\KelompokCalonSiswa;
use App\Models\ProsesPSB;
use App\Models\CalonSiswa;
use App\Models\CalonSiswaPAUD;
use App\Models\CalonSiswaTPA;
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
        $data = FormulirAktif::all()->where('id', 1);
        return view('user.formpaud', ['data' => $data]);
    }

    public function daftartpa()
    {
        $data = FormulirAktif::all()->where('id', 2);
        return view('user.formtpa', ['data' => $data]);
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
            // 'kcs_id.required' => 'required',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus dalam bentuk PNG/JPG/JPEG',
            'foto.uploaded' => 'Foto maksimal ukuran 2MB',
            'jeniskelamin.required' => 'Harap isi kolom jenis kelamin',
            'tempatlahir.required' => 'Harap isi kolom tempat lahir',
            'tgllahir.required' => 'Harap isi kolom tanggal lahir',
            'agama.required' => 'Harap isi kolom agama',
            'kewarganegaraan.required' => 'Harap isi kolom kewarganegaraan',
            'alamat.required' => 'Harap isi kolom alamat',

            // 'calon_id.required' => 'required',

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

        $updateData = CalonSiswa::where('calon_id', $CalonSiswa->id);
        $nodaftar = ($kode->kode) . (str_pad($CalonSiswa->id, 3, '0', STR_PAD_LEFT));
        $updateData->update([
            'nodaftar' => $nodaftar,
        ]);

        return view('user.sukses', ['nodaftar' => $nodaftar]);
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

            // 'calon_id' => 'required',

            'nism' => 'required',
            'nisn' => 'required',
            'nik' => 'required',
            'hobi' => 'required',
            'citacita' => 'required',
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
            // 'kcs_id.required' => 'required',
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus dalam bentuk PNG/JPG/JPEG',
            'foto.uploaded' => 'Foto maksimal ukuran 2MB',
            'jeniskelamin.required' => 'Harap isi kolom jenis kelamin',
            'tempatlahir.required' => 'Harap isi kolom tempat lahir',
            'tgllahir.required' => 'Harap isi kolom tanggal lahir',
            'agama.required' => 'Harap isi kolom agama',
            'kewarganegaraan.required' => 'Harap isi kolom kewarganegaraan',
            'alamat.required' => 'Harap isi kolom alamat',

            // 'calon_id.required' => 'Harap isi kolom',

            'nism.required' => 'Harap isi kolom NISM',
            'nisn.required' => 'Harap isi kolom NISN',
            'nik.required' => 'Harap isi kolom NIK',
            'hobi.required' => 'Harap isi kolom hobi',
            'citacita.required' => 'Harap isi kolom cita-cita',
            'anakke.required' => 'Harap isi kolom anak ke-',
            'jmlsaudara.required' => 'Harap isi kolom jumlah saudara',

            'namaayah.required' => 'Harap isi kolom nama ayah',
            'nikayah.required' => 'Harap isi kolom nik ayah',
            'tempatlahirayah.required' => 'Harap isi kolom tempat lahir ayah',
            'tgllahirayah.required' => 'Harap isi kolom tanggal lahir ayah',
            'pendidikanayah.required' => 'Harap isi kolom pendidikan ayah',
            'pekerjaanayah.required' => 'Harap isi kolom pekerjaan ayah',
            'teleponayah.required' => 'Harap isi kolom telepon ayah',
            'alamatayah.required' => 'Harap isi kolom alamat ayah',
            'penghasilanayah.required' => 'Harap isi kolom penghasilan ayah',

            'nammaibu.required' => 'Harap isi kolom nama ibu',
            'nikibu.required' => 'Harap isi kolom NIK ibu',
            'tempatlahiribu.required' => 'Harap isi kolom tempat lahir ibu',
            'tgllahiribu.required' => 'Harap isi kolom tanggal lahir ibu',
            'pendidikanibu.required' => 'Harap isi kolom pendidikan ibu',
            'pekerjaanibu.required' => 'Harap isi kolom pekerjaan ibu',
            'teleponibu.required' => 'Harap isi kolom telepon ibu',
            'alamatibu.required' => 'Harap isi kolom alamat ibu',
            'penghasilanibu.required' => 'Harap isi kolom penghasilan ibu',
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

        $DataTpa = new CalonSiswaTPA([
            'calon_id' => $CalonSiswa->id,

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
        $DataTpa->save();
        $ppsb = KelompokCalonSiswa::where('kcs_id', $request->kcs_id)->first('ppsb_id');
        $kode = ProsesPSB::where('ppsb_id', $ppsb->ppsb_id)->first('kode');

        $updateData = CalonSiswa::where('calon_id', $CalonSiswa->id);
        $nodaftar = ($kode->kode) . (str_pad($CalonSiswa->id, 3, '0', STR_PAD_LEFT));
        $updateData->update([
            'nodaftar' => $nodaftar,
        ]);

        return view('user.sukses', ['nodaftar' => $nodaftar]);
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

    public function sukses()
    {
        return view('user.sukses');
    }
}
