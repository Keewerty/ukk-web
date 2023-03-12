<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { 
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $buku = Buku::where('judul', 'LIKE', '%' . $request->search . '%')->paginate(4);
        } else {
            $buku = Buku::paginate(4);
        }

        return view('admin/buku/index', compact('buku'));
    }

}
