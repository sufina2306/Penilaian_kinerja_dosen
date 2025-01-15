<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RencanaUtama;
use App\Models\RencanPrilaku;
use Illuminate\Support\Facades\Log;

class SkpController extends Controller
{
 

    public function storeutama(Request $request)
    {
        try {
            $request->validate([
                'pengajaran' => 'nullable|string|max:255',
                'penelitian' => 'nullable|string|max:255',
                'pengabdian' => 'nullable|string|max:255',
                'rps' => 'nullable|string|max:255',
                'bimbingan_skripsi' => 'nullable|string|max:255',
                'bimbingan_kp' => 'nullable|string|max:255',
                'bimbingan_dosen_wali' => 'nullable|string|max:255',
            ]);

            $data = $request->only([
                'pengajaran',
                'penelitian',
                'pengabdian',
                'rps',
                'bimbingan_skripsi',
                'bimbingan_kp',
                'bimbingan_dosen_wali',
            ]);

            // Filter out null values
            $data = array_filter($data);

            // Cari data berdasarkan user_id
            $rencana = RencanaUtama::where('user_id', auth()->id())->first();

            if ($rencana) {
                // Jika data sudah ada, perbarui
                $rencana->update($data);
            } else {
                // Jika data belum ada, buat baru
                RencanaUtama::create(array_merge(['user_id' => auth()->id()], $data));
            }

            return redirect()->back()->with('success', 'Data berhasil ditambahkan atau diperbarui');
        } catch (\Exception $e) {
            Log::error('Error storing Rencana Utama: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function updateutama(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'pengajaran' => 'nullable|string|max:255',
                'penelitian' => 'nullable|string|max:255',
                'pengabdian' => 'nullable|string|max:255',
                'rps' => 'nullable|string|max:255',
                'bimbingan_skripsi' => 'nullable|string|max:255',
                'bimbingan_kp' => 'nullable|string|max:255',
                'bimbingan_dosen_wali' => 'nullable|string|max:255',
            ]);

            // Cari rencana berdasarkan ID
            $rencana = RencanaUtama::findOrFail($id);

            // Update data rencana
            $rencana->update($request->only([
                'pengajaran',
                'penelitian',
                'pengabdian',
                'rps',
                'bimbingan_skripsi',
                'bimbingan_kp',
                'bimbingan_dosen_wali',
            ]));

            return redirect()->back()->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Error updating Rencana Utama: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    // Rencana Prilaku

    public function storeprilaku(Request $request)
    {
        try {
            $request->validate([
                'pelayanan' => 'nullable|string|max:255',
                'akuntable' => 'nullable|string|max:255',
                'kompeten' => 'nullable|string|max:255',
                'harmonis' => 'nullable|string|max:255',
                'loyal' => 'nullable|string|max:255',
                'adaptif' => 'nullable|string|max:255',
                'kolaboratif' => 'nullable|string|max:255',
            ]);

            $data = $request->only([
                'pelayanan',
                'akuntable',
                'kompeten',
                'harmonis',
                'loyal',
                'adaptif',
                'kolaboratif',
            ]);

            $data = array_filter($data);

            $rencana = RencanPrilaku::where('user_id', auth()->id())->first();

            if ($rencana) {
                $rencana->update($data);
            } else {
                RencanPrilaku::create(array_merge(['user_id' => auth()->id()], $data));
            }

            return redirect()->back()->with('success', 'Data berhasil ditambahkan atau diperbarui');
        } catch (\Exception $e) {
            Log::error('Error storing Rencana Prilaku: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function updateprilaku(Request $request, $id)
    {
        try {
            $request->validate([
                'pelayanan' => 'nullable|string|max:255',
                'akuntable' => 'nullable|string|max:255',
                'kompeten' => 'nullable|string|max:255',
                'harmonis' => 'nullable|string|max:255',
                'loyal' => 'nullable|string|max:255',
                'adaptif' => 'nullable|string|max:255',
                'kolaboratif' => 'nullable|string|max:255',
            ]);

            $rencana = RencanPrilaku::findOrFail($id);
            $rencana->update($request->only([
                'pelayanan',
                'akuntable',
                'kompeten',
                'harmonis',
                'loyal',
                'adaptif',
                'kolaboratif',
            ]));

            return redirect()->back()->with('success', 'Data berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Error updating Rencana Prilaku: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }
}