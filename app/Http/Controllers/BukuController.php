<?php

namespace App\Http\Controllers;

use App\Exports\BukuExport;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $buku = Buku::where('judul', 'LIKE', '%' . $request->search . '%')->paginate(4);
        } else {
            $buku = Buku::paginate(4);
        }

        return view('admin/buku/index', compact('buku'));
        // $buku = Buku::paginate(2);
        // return view('admin/buku/index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/buku/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$buku = Buku::create($request->all());
        $buku = $request->all();
        $buku['cover'] = $request->file('cover')->store('buku');

        Buku::create($buku);

        return redirect()->route('buku.create');
        */

        // $this->validate($request, [
        //     'judul_buku' => 'required',
        //     'jenis_buku' => 'required',
        //     'pengarang' => 'required',
        //     'tahun_terbit' => 'required|max:4',
        //     'penerbit' => 'required',
        //     'cover' => 'required',
        // ]);

        if (!empty($request->file('cover'))) {
            $buku = $request->all();
            $buku['cover'] = $request->file('cover')->store('buku');

            Buku::create($buku);

            return redirect()->route('buku.index');
        } else {
            $buku = $request->all();
            Buku::create($buku);

            return redirect()->route('buku.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Buku::find($id);
        return response()->json($buku);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin/buku/edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if (!$request->hasFile('cover')) {
            $buku = Buku::find($id);
            $buku->update([
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'th_terbit' => $request->th_terbit,
                'sinopsis' => $request->sinopsis,
            ]);
            return redirect()->route('buku.index');
        } else {

            $buku = Buku::find($id);
            Storage::delete($buku->cover);
            $buku->update([
                'judul' => $request->judul,
                'pengarang' => $request->pengarang,
                'penerbit' => $request->penerbit,
                'th_terbit' => $request->th_terbit,
                'cover' => $request->file('cover')->store('buku'),
                'sinopsis' => $request->sinopsis,
            ]);
            return redirect()->route('buku.index');
        }
    }

    //     $buku = Buku::findOrFail($id);
    //     $buku->update($request->all());
    //     $buku->save();
    //     return redirect()->route('buku.index');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return redirect()->route('buku.index');
    }

    public function tampil(Request $request)
    {
        if ($request->has('search')) {
            $buku = Buku::where('judul', 'LIKE', '%' . $request->search . '%')->paginate(4);
        } else {
            $buku = Buku::all();
        }

        $title = 'home';
        return view('index', [
            'buku' => $buku,
            'title' => $title,
        ]);
    }

    public function detailbook($id)
    {
        $buku = Buku::find($id);

        $detailbuku = Buku::where('id', $id)->get();

        return view('detail', [
            'bukudet' => $buku,
            'detailbuku' => $detailbuku
        ]);
    }

    // public function cari(Request $request)
    // {
    //     if ($request->has('search')) {
    //         $buku = Buku::where('judul', 'LIKE', '%' . $request->search . '%')->paginate(4);
    //     } else {
    //         $buku = Buku::paginate(4);
    //     }

    //     return view('/index', compact('buku'));
    //     // $buku = Buku::paginate(2);
    //     // return view('admin/buku/index', compact('buku'));
    // }

    public function export_excel()
	{
		return Excel::download(new BukuExport, 'Buku.xlsx');
	}
}
