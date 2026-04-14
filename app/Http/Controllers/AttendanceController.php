<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    // Tampilkan halaman + data
    public function index()
    {
        $data = Attendance::all();
        $total = Attendance::count();

        return view('attendance', compact('data', 'total'));
    }

    // Absen masuk
    public function masuk(Request $request)
    {
        Attendance::create([
            'nama' => $request->nama,
            'tanggal' => date('Y-m-d'),
            'jam_masuk' => date('H:i:s'),
        ]);

        return redirect('/attendance');
    }

    // Absen pulang
    public function pulang($id)
    {
        $data = Attendance::find($id);

        if ($data) {
            $data->jam_pulang = date('H:i:s');
            $data->save();
        }

        return redirect('/attendance');
    }
}