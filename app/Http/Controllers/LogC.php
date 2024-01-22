<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\LogM;

use Illuminate\Http\Request;

class LogC extends Controller
{
    public function index(Request $request)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Melihat Halaman Log'
        ]);

        $query = LogM::select('users.*', 'log.*')->join('users', 'users.id', '=', 'log.id_user')->orderBy('log.id', 'desc');       
        
        if ($request->filled('start_date')) {
            $query->where('log.created_at', '>=', $request->start_date);
        }
        
        if ($request->filled('end_date')) {
            $query->where('log.created_at', '<=', $request->end_date);
        }
        
        $LogM = $query->paginate(8);
        
        $subtittle = "Daftar Aktivitas";
        return view('log', compact('LogM', 'subtittle'));
    }
}
