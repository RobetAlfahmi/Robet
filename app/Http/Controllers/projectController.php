<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\projects;
use Session;


class projectController extends Controller
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
        $data=Siswa::paginate(4);
        return view('masterproject', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahsiswa');
    }
    
    public function tambah($id)
    {
        $siswa=Siswa::find($id);
        return view ('tambahproject', compact('siswa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=>'form ini harus diisi!!',
            'min' => ':attribute minimal :min karakter!!',
            'max' => ':attribute maksimal :max karakter!!',
            // 'mimes' => ':attribute minimal :min karakter!!',

        ];

        $this->validate($request, [
            'nama_projects' => 'required|max:25|min:3',
            'deskripsi' => 'required|min:3'
        ], $message);
        $projects = new projects();
        $projects->siswa_id = $request->siswa_id;
        $projects->nama_projects = $request->nama_projects;
        $projects->deskripsi = $request->deskripsi;
        $projects->tanggal = date('Y-m-d');
        $projects->save();


        Session::flash('message','Project Berhasil Ditambahkan..');
        return redirect('/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects=Siswa::find($id)->projects()->get();
        return view('showproject', compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=projects::find($id);
        return view('editproject', compact('project'));
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
        $message=[
            'required'=>'form ini harus diisi!!',
            'min' => ':attribute minimal :min karakter!!',
            'max' => ':attribute maksimal :max karakter!!',
            // 'mimes' => ':attribute minimal :min karakter!!',

        ];

        $this->validate($request, [
            'nama_projects' => 'required|max:25|min:3',
            'deskripsi' => 'required|min:3'
        ], $message);
        $projects =projects::find($id);
        $projects->siswa_id = $request->siswa_id;
        $projects->nama_projects = $request->nama_projects;
        $projects->deskripsi = $request->deskripsi;
        $projects->tanggal = date('Y-m-d');
        $projects->save();


        Session::flash('message','Data berhasil di edit');
        return redirect('/masterproject');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        projects::find($id)->delete();
        Session::flash('message','Data berhasil di hapus..');
        return redirect('/masterproject');
    }
    
}
