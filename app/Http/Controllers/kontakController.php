<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\jenis_kontak;
use App\Models\kontak;
use App\Models\siswa;
use Session;

class kontakController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except(['show','index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::latest()->Paginate(2);
        $jenis = jenis_kontak::all();
        return view('masterkontak', compact('data', 'jenis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $jenis = jenis_kontak::all();
        $siswa = siswa::where('id', $id)->first();
        return view('tambahkontak', compact('siswa', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_kontak' => 'required',
            'deskripsi' => 'required|max:200'
        ]);

        $kontak = new Kontak;
        $kontak->siswa_id = $request->siswa_id;
        $kontak->jenis_kontak_id =  $request->jenis_kontak;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->save();
        return redirect('masterkontak')->with('success',
        'Kontak  Telah Ditambahkan');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak = siswa::find($id)->kontak()->get();
        return view('showkontak',
        compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak = kontak::findOrFail($id);
        $jenis = jenis_kontak::all();
        return view('editkontak',
        compact('kontak', 'jenis'));
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
        $this->validate($request, [
            'jenis_kontak' => 'required',
            'deskripsi' => 'required|max:200'
        ]);

        Kontak::findOrFail($id)->update($request->all());
        return redirect('/masterkontak')->with('success',
        'Kontak Telah Di Edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        kontak::findOrFail($id)->delete();
        return redirect()->back()->with('success',
        'Kontak Di hapuss');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function tambah(Request $request)
    {
        $message=[
            'required' => 'form ini harus diisi',
        ];

        $this->validate($request, [
            'jenis_kontak' => 'required'
        ], $message);

        jenis_kontak::create([
            'jenis_kontak' => $request->jenis_kontak,
        ]);

        Session::flash('message', 'jenis kontak baru telah ditambahkan..');
        return redirect('/masterkontak');
    }
}
