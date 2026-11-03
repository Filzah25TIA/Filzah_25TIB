<?php
namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index()
        {
            $cvs = Cv::latest()->get(); // Mengambil semua daftar CV terbaru
            return view('admin.cv.index', compact('cvs'));
        }

    public function create()
    {
        return view('admin.cv.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required',
            'profesi_title' => 'required',
            'tentang_saya' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'website' => 'nullable',
            'keahlian' => 'required',
            'pendidikan' => 'required',
            'pengalaman' => 'required',
            'hobi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('cv_foto', 'public');
        }

        Cv::create($data);
        return redirect()->route('cv.index')->with('success', 'CV Berhasil Dibuat!');
    }

    public function edit(Cv $cv)
    {
        return view('admin.cv.edit', compact('cv'));
    }

    public function update(Request $request, Cv $cv)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required',
            'profesi_title' => 'required',
            'tentang_saya' => 'required',
            'ttl' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'kewarganegaraan' => 'required',
            'email' => 'required|email',
            'status' => 'required',
            'website' => 'nullable',
            'keahlian' => 'required',
            'pendidikan' => 'required',
            'pengalaman' => 'required',
            'hobi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            if ($cv->foto) Storage::disk('public')->delete($cv->foto);
            $data['foto'] = $request->file('foto')->store('cv_foto', 'public');
        }

        $cv->update($data);
        return redirect()->route('cv.index')->with('success', 'CV Berhasil Diperbarui!');
    }

    public function destroy(Cv $cv)
    {
        if ($cv->foto) Storage::disk('public')->delete($cv->foto);
        $cv->delete();
        return redirect()->route('cv.index')->with('success', 'CV Berhasil Dihapus!');
    }
}
