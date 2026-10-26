<?php
namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // 1. Validasi input agar wajib diisi
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'birthday'   => 'required',
            'gender'     => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
        ]);

        // 2. Simpan data baru ke database
        Pelanggan::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'birthday'   => $request->birthday,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil data pelanggan berdasarkan id, jika tidak ketemu akan error 404
        $data['dataPelanggan'] = Pelanggan::findOrFail($id);

        // Mengirim data tersebut ke halaman view edit yang baru kita buat tadi
        return view('admin.pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'birthday'   => 'required',
            'gender'     => 'required',
            'email'      => 'required|email|unique:pelanggan,email,' . $id . ',pelanggan_id', // Agar email milik sendiri tidak dianggap duplikat
            'phone'      => 'required',
        ]);

        // 2. Cari data berdasarkan ID
        $pelanggan = Pelanggan::findOrFail($id);

        // 3. Update data pelanggan
        $pelanggan->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'birthday'   => $request->birthday,
            'gender'     => $request->gender,
            'email'      => $request->email,
            'phone'      => $request->phone,
        ]);

        // 4. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pelanggan.index')->with('success', 'Pembaruan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success','Data berhasil dihapus');
    }
}
