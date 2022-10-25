<?php

namespace App\Http\Controllers;

use Session;
use File;
use App\Models\siswa;
use Illuminate\Http\Request;

class siswaController extends Controller
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
        $data = Siswa::all();
        return view('mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()                              //KU YAKIN KAU BISA KUYAKIN KAU PASTI BISA\\
    {
        return view('tambahsiswa');
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
          'required' => ':attribute harus di isi ya ges ya',
          'min'      => ':attribute minimal :min karakter woiii',
          'max'      => ':attribute maksimal :max karakter blog',
          'numeric'  => ':attribute  isian a angel e rek',
          'mimes'    => ':attribute  kon ga eroh kudu di isi oi',
        ];
        $this->validate($request,[
            'nama'   => 'required|min:7|max:30',
            'nisn'   => 'required|numeric',
            'alamat' => 'required',
            'jk'     => 'required',
            'foto'   => 'required|mimes:jpg,png',
            'about'  => 'required|min:10'
        ], $message);

        //ambil parameter
        $file = $request->file('foto');

        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //insert data
        Siswa::create([
            'nama'   => $request -> nama,
            'nisn'   => $request -> nisn,
            'alamat' => $request -> alamat,
            'jk'     => $request -> jk,
            'foto'   => $nama_file,
            'about'  => $request -> about,
        ]);

        session::flash('success', 'Data berhasil di tambahkan ');
        return redirect('/mastersiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa=Siswa::find($id);
        $kontaks = $siswa->kontak()->get();
        // return($kontak);
        return view('Showsiswa', compact('siswa','kontaks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa=Siswa::find($id);
        return view('Editsiswa', compact('siswa'));
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
            'required' => ':attribute harus di isi ya ges ya',
            'min'      => ':attribute minimal :min karakter woiii',
            'max'      => ':attribute maksimal :max karakter blog',
            'numeric'  => ':attribute  isian a angel e rek',
            'mimes'    => ':attribute  kon ga eroh kudu di isi oi',
          ];
          $this->validate($request,[
              'nama'   => 'required|min:7|max:30',
              'nisn'   => 'required|numeric',
              'alamat' => 'required',
              'jk'     => 'required',
              'foto'   => 'required|mimes:jpg,png',
              'about'  => 'required|min:10'
          ], $message);
          
        if ($request->foto !='') {

        //1.Hapus anjir foto lama
        $siswa=Siswa::find($id);
        file::delete('./template/img/'. $siswa->foto);

        //ambil parameter
        $file = $request->file('foto');

        //rename
        $nama_file = time()."_".$file->getClientOriginalName();

        //4.Proses upload anjir
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload,$nama_file);

        //5.Menyimpan data ke database anjir
        $siswa->nama   = $request -> nama;
        $siswa->nisn   = $request -> nisn;
        $siswa->alamat = $request -> alamat;
        $siswa->jk     = $request -> jk;
        $siswa->foto   = $nama_file;
        $siswa->about  = $request -> about;
        $siswa->save();
        session::flash('success', 'Data berhasil di edit anjirrr ');
        return redirect('/mastersiswa');

        }else{
            $siswa=Siswa::find($id);
            $siswa->nama   = $request -> nama;
            $siswa->nisn   = $request -> nisn;
            $siswa->alamat = $request -> alamat;
            $siswa->jk     = $request -> jk;
            $siswa->about  = $request -> about;
            $siswa->save();
            session::flash('success', 'Data berhasil di hilanhkan anjirrr ');
            return redirect('/mastersiswa');    
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function hapus($id)
    {
        $siswa=Siswa::find($id);
        $siswa->delete();
        Session::flash('success', 'Data Berhasil Dihapus');
        return redirect('/mastersiswa');
    }
}
