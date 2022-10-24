<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\contact;
use Illuminate\Support\Facades\Session; 
use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('index','show');
    //   
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();
        return view('layout.mastersiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.AddSiswa');
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
            'required' => ':attribute harus diisi gaes ', 
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maximal :max karalter ya gaess',
            'numeric' => ':attribute kudu diisi angka cak!!',
            'mimes' => 'file :attribute harus bertipe jpg, png, jpeg'
        ];
        $this->validate($request,[
            'nama'=>'required|min:7|max:30',
            'nisn'=>'required|numeric' ,
            'alamat'=>'required',
            'jk'=>'required',
            'foto'=>'required|mimes:jpg,png,jpeg',
            'about'=>'required|min:100z'
        ], $message);

        //ambil parameter
        $file = $request->file('foto');
        //rename
        $nama_file = time()."_".$file->getClientOriginalName();
        //proses upload
        $tujuan_upload = './template/img';
        $file->move($tujuan_upload, $nama_file);

        //insert data
        siswa::create([
            'nama'=> $request-> nama,
            'nisn'=> $request -> nisn,
            'alamat'=> $request-> alamat,
            'jk'=> $request-> jk,
            'foto'=> $nama_file,
            'about'=> $request-> about
        ]);
           
         Session::flash('success', 'Data Berhasil ditambahkan');
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
        $contact= $siswa->contact()->get();
        // return ($contact);
        return view('siswa.ShowSiswa', compact('siswa', 'contact'));
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
        return view('siswa.EditSiswa', compact('siswa'));
        // return $siswa;
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
            'required' => ':attribute harus diisi gaes ', 
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => ':attribute maximal :max karalter ya gaess',
            'numeric' => ':attribute kudu diisi angka cak!!',
            'mimes' => 'file :attribute harus bertipe jpg, png, jpeg'
        ];
        $this->validate($request,[
            'nama'=>'required|min:7|max:30',
            'nisn'=>'required|numeric' ,
            'alamat'=>'required',
            'foto' => 'mimes:jpg,png,jpeg',
            'jk'=>'required',
            'about'=>'required|min:100z'
        ], $message );

        if($request->foto != ''){

            //1.menghapus file foto lama
             $siswa=Siswa::find($id);
             file::delete('./template/img/' .$siswa->foto);


            $file = $request->file('foto');
            $nama_file = time()."_".$file->getClientOriginalName();
            //proses upload
            $tujuan_upload = './template/img';
          $file->move($tujuan_upload, $nama_file);

          //menyimpan ke database
          $siswa->nama = $request->nama;
          $siswa->jk = $request->jk;
          $siswa->nisn = $request->nisn;
          $siswa->alamat = $request->alamat;
          $siswa->about = $request->about;
          $siswa->foto = $nama_file;
          $siswa->save();
          Session::flash('success', 'Data Berhasil diedit');
          return redirect('mastersiswa');

        }else{
            $siswa=Siswa::find($id);

          $siswa->nama = $request->nama;
          $siswa->jk = $request->jk;
          $siswa->nisn = $request->nisn;
          $siswa->alamat = $request->alamat;
          $siswa->about = $request->about;
          $siswa->save();
          Session::flash('success', 'Data Berhasil diedit');
          return redirect('mastersiswa');


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

    public function hapus($id)
    {
        $siswa=Siswa::find($id);
        $siswa->delete();
        Session::flash('success', 'Data Berhasil dihapus');
         return redirect('/mastersiswa');
    }
}
