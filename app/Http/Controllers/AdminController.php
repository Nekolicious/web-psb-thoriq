<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormulirAktif;
use App\Models\KelompokCalonSiswa;
use App\Models\ProsesPSB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('admin.overview');
    }

    public function admin()
    {
        $data = User::all();
        return view('admin.konfig', ['data' => $data]);
    }

    public function formulir()
    {
        $datapaud = FormulirAktif::all()->where('id', 1);
        $datatpa = FormulirAktif::all()->where('id', 2);
        $datapsb = ProsesPSB::all()->where('status', 1);
        return view('admin.alurformulir', ['datapaud' => $datapaud, 'datatpa' => $datatpa, 'datapsb' => $datapsb]);
    }

    public function getKCS($ppsb_id = 0)
    {
        $empData['data'] = KelompokCalonSiswa::select('kcs_id', 'nama')
            ->where('ppsb_id', $ppsb_id)
            ->get();

        return response()->json($empData);
    }

    public function ubah(Request $request)
    {
        $data = FormulirAktif::all();

        $request->validate([
            'kcs_id' => 'required',
            'ppsb_id' => 'required',
        ], [
            'ppsb_id.required' => 'Harap pilih proses!',
            'kcs_id.required' => 'Harap pilih kelompok!',
        ]);

        $data = FormulirAktif::updateOrCreate(
            [
                'id' => $request->id,
            ],
            [
                'ppsb_id' => $request->ppsb_id,
                'kcs_id' => $request->kcs_id,
            ]
        );
        return back()->with('success', 'Data berhasil diupdate!');
    }

    // Admin Password
    public function changepass(Request $request)
    {
        $data = User::find($request->id);

        $request->validate([
            'newpassword' => 'required|min:8',
        ]);

        if (Hash::check($request->password, $data->password)) {
            $data->update([
                'password' => Hash::make($request->newpassword),
            ]);
        } else {
            return back()->withErrors(['invalid' => 'Password salah.']);
        }
        return back()->with('success', 'Informasi akun berhasil diupdate.');
    }

    public function changeuname(Request $request)
    {
        $data = User::find($request->id);

        $request->validate([
            'newname' => 'required|min:3',
        ]);

        if (Hash::check($request->password, $data->password)) {
            $data->update([
                'name' => $request->newname,
            ]);
        } else {
            return back()->withErrors(['invalid' => 'Password salah.']);
        }
        return back()->with('success', 'Informasi akun berhasil diupdate.');
    }
}
