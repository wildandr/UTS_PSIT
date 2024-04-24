<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Perkuliahan;
use App\Models\Matakuliah;

class NilaiMahasiswaController extends Controller
{
    public function index()
    {
        // Mengambil semua data nilai mahasiswa beserta informasi mahasiswa dan matakuliah terkait
        $nilaiMahasiswa = Perkuliahan::select('mahasiswa.nim', 'mahasiswa.nama', 'mahasiswa.alamat', 'mahasiswa.tanggal_lahir', 'matakuliah.kode_mk', 'matakuliah.nama_mk', 'matakuliah.sks', 'perkuliahan.nilai')
            ->join('mahasiswa', 'perkuliahan.nim', '=', 'mahasiswa.nim')
            ->join('matakuliah', 'perkuliahan.kode_mk', '=', 'matakuliah.kode_mk')
            ->get();

        return response()->json($nilaiMahasiswa);
    }

    public function show($nim)
    {
        // Mengambil nilai mahasiswa berdasarkan nim
        $nilaiMahasiswa = Perkuliahan::select('mahasiswa.nim', 'mahasiswa.nama', 'mahasiswa.alamat', 'mahasiswa.tanggal_lahir', 'matakuliah.kode_mk', 'matakuliah.nama_mk', 'matakuliah.sks', 'perkuliahan.nilai')
            ->join('mahasiswa', 'perkuliahan.nim', '=', 'mahasiswa.nim')
            ->join('matakuliah', 'perkuliahan.kode_mk', '=', 'matakuliah.kode_mk')
            ->where('mahasiswa.nim', $nim)
            ->get();

        if ($nilaiMahasiswa->isEmpty()) {
            return response()->json(['message' => 'Nilai mahasiswa dengan NIM ' . $nim . ' tidak ditemukan'], 404);
        }

        return response()->json($nilaiMahasiswa);
    }

    public function store(Request $request, $nim)
    {
        // Validasi request
        $request->validate([
            'kode_mk' => 'required|string',
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        // Cek apakah mahasiswa dengan nim yang diberikan ada
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa dengan NIM ' . $nim . ' tidak ditemukan'], 404);
        }

        // Cek apakah matakuliah dengan kode_mk yang diberikan ada
        $matakuliah = Matakuliah::where('kode_mk', $request->kode_mk)->first();
        if (!$matakuliah) {
            return response()->json(['message' => 'Matakuliah dengan kode MK ' . $request->kode_mk . ' tidak ditemukan'], 404);
        }

        // Memasukkan nilai baru untuk mahasiswa tertentu
        $perkuliahan = new Perkuliahan();
        $perkuliahan->nim = $nim;
        $perkuliahan->kode_mk = $request->kode_mk;
        $perkuliahan->nilai = $request->nilai;
        $perkuliahan->save();

        return response()->json(['message' => 'Nilai berhasil dimasukkan untuk mahasiswa dengan NIM ' . $nim], 201);
    }

    public function update(Request $request, $nim, $kode_mk)
    {
        // Validasi request
        $request->validate([
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        // Cek apakah nilai mahasiswa dengan nim dan kode_mk yang diberikan ada
        $perkuliahan = Perkuliahan::where('nim', $nim)
            ->where('kode_mk', $kode_mk)
            ->first();

        if (!$perkuliahan) {
            return response()->json(['message' => 'Nilai mahasiswa dengan NIM ' . $nim . ' dan kode MK ' . $kode_mk . ' tidak ditemukan'], 404);
        }

        // Lakukan update nilai mahasiswa
        $perkuliahan->nilai = $request->nilai;
        $perkuliahan->save();

        return response()->json(['message' => 'Nilai mahasiswa dengan NIM ' . $nim . ' dan kode MK ' . $kode_mk . ' berhasil diupdate'], 200);
    }

    public function destroy($nim, $kode_mk)
    {
        // Cari nilai mahasiswa berdasarkan nim dan kode_mk
        $perkuliahan = Perkuliahan::where('nim', $nim)
            ->where('kode_mk', $kode_mk)
            ->first();

        if (!$perkuliahan) {
            return response()->json(['message' => 'Nilai mahasiswa dengan NIM ' . $nim . ' dan kode MK ' . $kode_mk . ' tidak ditemukan'], 404);
        }

        // Hapus nilai mahasiswa
        $perkuliahan->delete();

        return response()->json(['message' => 'Nilai mahasiswa dengan NIM ' . $nim . ' dan kode MK ' . $kode_mk . ' berhasil dihapus'], 200);
    }
}
