<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function indexStaff()
    {
        $users = User::where('role', 'staff')->get();
        $entriesPerPage = request('entries', 5); // Default to 5 entries per page if not specified
        $entries = User::paginate($entriesPerPage);

        return view('dashboard.staff.index', compact('users', 'entries'));
    }

    public function createStaff()
    {
        return view('dashboard.staff.create');
    }

    public function storeStaff(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        $name = substr($request->name, 0, 3);
        $email = substr($request->email, 0, 3);

        // Gabungkan dan hash email dan nama
        $hashedPassword = Hash::make($name . $email);

        User::create([
            'name'  => $request->name,
            'email'  => $request->email,
            'role' => 'staff',
            'password' => $hashedPassword
        ]);

        return redirect()->route('staff.index')->with('success', 'Berhasil menambahkan user staff!');
    }

    public function editStaff($id)
    {
        $users = User::find($id);
        return view('dashboard.staff.edit', compact('users'));
    }
    
    public function updateStaff(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => ''
        ]);

        $hashedPassword = Hash::make($request->password);
        
        User::where('id', $id)->update([
            'name'  => $request->name,
            'email'  => $request->email,
            'password' => $hashedPassword,
        ]);

        return redirect()->route('staff.index')->with('success', 'Berhasil mengubah data staff!');
    }

    public function destroyStaff($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data staff!');
    }

    public function searchStaff(Request $request)
    {
        $searchData = $request->input('search');
        $users = User::where('role', 'staff')->where('name', $searchData)->get();

        return view('dashboard.staff.index', compact('users'));
    }
    
    public function indexGuru()
    {
        $users = User::where('role', 'guru')->get();
        $entriesPerPage = request('entries', 5); // Default to 5 entries per page if not specified
        $entries = User::paginate($entriesPerPage);

        return view('dashboard.guru.index', compact('users', 'entries'));
    }

    public function createGuru()
    {
        return view('dashboard.guru.create');
    }

    public function storeGuru(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
        ]);

        $name = substr($request->name, 0, 3);
        $email = substr($request->email, 0, 3);

        // Gabungkan dan hash email dan nama
        $hashedPassword = Hash::make($name . $email);

        User::create([
            'name'  => $request->name,
            'email'  => $request->email,
            'role' => 'guru',
            'password' => $hashedPassword
        ]);

        return redirect()->route('guru.index')->with('success', 'Berhasil menambahkan user guru!');
    }

    public function editGuru($id)
    {
        $users = User::find($id);
        return view('dashboard.guru.edit', compact('users'));
    }
    
    public function updateGuru(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|min:3',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => ''
        ]);

        $hashedPassword = Hash::make($request->password);
        
        User::where('id', $id)->update([
            'name'  => $request->name,
            'email'  => $request->email,
            'password' => $hashedPassword,
        ]);

        return redirect()->route('guru.index')->with('success', 'Berhasil mengubah data guru!');
    }

    public function destroyGuru($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data guru!');
    }

    public function searchGuru(Request $request)
    {
        $searchData = $request->input('search');
        $users = User::where('role', 'guru')->where('name', $searchData)->get();

        return view('dashboard.guru.index', compact('users'));
    }

    public function authlogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $user = $request->only(['email', 'password']);

        if (Auth::attempt($user)) {
            return redirect('/dashboard')->with('success', 'Login Berhasil!');
        } else {
            return redirect()->back()->with('failed', 'Login gagal, silahkan coba lagi!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda Berhasil Logout');
    }
}
