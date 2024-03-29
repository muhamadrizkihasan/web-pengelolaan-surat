<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $user = User::Where('role', 'guru')->get();

        $letters = Letter::Where('id', $id)->first();

        return view('dashboard.guru.result', compact('user', 'letters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $arrayDistinct = array_count_values($request->presence_recipients);
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

        $request['presence_recipients'] = $arrayAssoc;

        Result::create($request->all());

        return redirect()->route('dashboard.letter.index')->with('success', 'Berhasil Menambah Hasil Rapat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result, $id)
    {
        $result = Result::where('letter_id', $id)->first();

        $user = User::Where('role', 'guru')->get();

        $surat = Letter::find($id);

        return view('dashborad.result.result', compact('result', 'user', 'surat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }
}
