<?php

namespace App\Http\Controllers;

use App\Exports\LetterExport;
use App\Models\Letter;
use App\Models\LetterType;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Excel;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = Letter::all();
        // dd($letters);
        return view('dashboard.letter.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $letters = LetterType::all();
        $users = User::where('role', 'guru')->get();

        return view('dashboard.letter.create', compact('users', 'letters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arrayDistinct = array_count_values($request->recipients);
        $arrayAssoc = [];

        foreach ($arrayDistinct as $id => $count) {
            $user = User::find($id);

            // Periksa apakah pengguna ditemukan sebelum mengakses properti 'name'
            if ($user) {
                $arrayItem = [
                    "id" => $id,
                    "name" => $user->name,
                ];

                array_push($arrayAssoc, $arrayItem);
            }
        }

        $request['recipients'] = $arrayAssoc;

        Letter::create([
            'letter_perihal' => $request->letter_perihal,
            'letter_type_id' => $request->letter_type_id,
            'content' => $request->content,
            'recipients' => $request->recipients,
            'attachment' => $request->attachment,
            'notulis' => $request->notulis
        ]);

        return redirect()->route('letter.cetak')->with('success', 'Berhasil Menambah Data Surat');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $letter = Letter::find($id);
        // dd($letter);
        $users = User::all();

        return view('dashboard.letter.show', compact('letter', 'users'));
    }

    public function cetak()
    {
        $letter = Letter::all();
        $users = User::where('role', 'guru')->get();

        return view('dashboard.letter.cetak', compact('letter', 'users'));
    }

    public function surat(Letter $id)
    {
        $letters = Letter::find($id);
        $users = User::where('role', 'guru')->get();

        return view('dashboard.letter.surat', compact('letters', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Letter $letter, $id)
    {
        $letters = LetterType::all();
        $letter = Letter::find($id);
        $users = User::where('role', 'guru')->get();

        return view('dashboard.letter.edit', compact('letters', 'users', 'letter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Letter $letter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Letter::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data surat!');
    }

    public function downloadPDF($id)
    {
        $letter = Letter::find($id); // Menggunakan model Letter
        $users = User::where('role', 'guru')->get();

        // Menyusun data yang akan dikirim ke view
        $data = [
            'letter' => $letter, // Menggunakan 'letter' bukan 'letters'
            'users' => $users,
        ];

        // Load view dengan menggunakan array data
        $pdf = PDF::loadView('dashboard.klasifikasi.surat', $data);

        // Download file PDF
        return $pdf->download('001 Rapat Rutin.pdf');
    }

    public function downloadExcel()
    {
        $file_name = 'Surat.xlsx';
        return Excel::download(new LetterExport, $file_name);
    }
}
