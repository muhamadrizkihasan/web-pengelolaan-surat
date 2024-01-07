<?php

namespace App\Http\Controllers;

use App\Exports\LetterTypeExport;
use App\Models\LetterType;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Excel;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = LetterType::withCount('letter')->orderBy('name_type', 'ASC')->get();
        return view('dashboard.klasifikasi.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.klasifikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|max:255',
            'klasifikasi' => 'required',
        ]);

        $kode = $request->kode . '-' . LetterType::count();

        LetterType::create([
            'letter_code'  => $kode,
            'name_type'  => $request->klasifikasi,
        ]);

        return redirect()->route('klasifikasi.index')->with('success', 'Berhasil menambahkan data klasifikasi surat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $letter = LetterType::find($id);
        $users = User::where('role', 'guru')->get();

        return view('dashboard.klasifikasi.show', compact('letter', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $letters = LetterType::find($id);
        return view('dashboard.klasifikasi.edit', compact('letters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'code' => 'required',
            'type'  => 'required',
        ]);


        LetterType::where('id', $id)->update([
            'letter_code'  => $request->code,
            'name_type'  => $request->type,
        ]);

        return redirect()->route('klasifikasi.index')->with('edited', 'Berhasil mengubah klasifikasi surat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        LetterType::where('id', $id)->delete();

        return redirect()->route('klasifikasi.index')->with('deleted', 'Berhasil menghapus klasifikasi surat!');
    }

    public function search(Request $request)
    {
        $searchData = $request->input('search');
        $letters = LetterType::withCount('letter')->where('name_type', $searchData)->get();

        return view('dashboard.klasifikasi.index', compact('letters'));
    }

    public function downloadExcel()
    {
        $file_name = 'Klasifikasi Surat.xlsx';
        return Excel::download(new LetterTypeExport, $file_name);
    }

    public function surat($id)
    {
        $letters = LetterType::where('id', $id)->first();
        $users = User::where('role', 'guru')->get();

        return view('dashboard.klasifikasi.surat', compact('letters', 'users'));
    }

    public function downloadPDF($id)
    {
        $letterType = LetterType::find($id);
        $users = User::where('role', 'guru')->get();

        // Menyusun data yang akan dikirim ke view
        $data = [
            'letterType' => $letterType,
            'users' => $users,
        ];

        // Load view dengan menggunakan array data
        $pdf = PDF::loadView('dashboard.klasifikasi.surat', $data);

        // Download file PDF
        return $pdf->download('002 Rapat Rutin.pdf');
    }
}