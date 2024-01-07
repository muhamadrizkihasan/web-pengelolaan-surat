<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use App\Models\LetterType;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $staffs = User::where('role', 'staff')->count();
        $teachers = User::where('role', 'guru')->count();
        $letterTypes = LetterType::count();
        $letters = Letter::count();

        return view('dashboard.index', compact('staffs', 'teachers', 'letterTypes', 'letters'));
    }
}
