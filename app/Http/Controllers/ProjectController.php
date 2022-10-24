<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
use App\Models\siswa;
use App\Models\project;
// use Illuminate\Contracts\Session\Session;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=siswa::paginate(5);
        return view('layout.masterproject', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    public function tambah($id)
    {
        $siswa=Siswa::find($id);
        return view('project.AddProject', compact('siswa'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ':attribute Minimal :min Karakter',
            'max' => ':attribute Maksimal :max Karakter',
            'numeric' => ':attribute WAJIB di isi Angka',
            'mimes' => 'file :attribute Harus Bertipe JPG,JPEG,PNG'
        ];
        $vaidateData = $request->validate([
            'id_siswa' => '',
            'nama_project' => 'required|max:20|min:1',
            'deskripsi' => 'required',
            'tanggal' => 'required'

        ], $message);

        project::create($vaidateData);

        Session::flash('success', 'Data Berhasil di Tambah!!');
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
        $project=Siswa::find($id)->project()->get();
        // return $project;
        return view ('project.ShowProject', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = project::find($id);
        return view('project.EditProject',compact('project'));
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
        $message = [
            'required' => ":attribute tidak boleh kosong",
            'min' => ':attribute Minimal :min Karakter',
            'max' => ':attribute Maksinal :max Karakter',
            'numeric' => ':attribute WAJIB di isi Angka',
            'mimes' => 'file :attribute Harus Bertipe JPG,JPEG,PNG'
        ];
        $validateData = $request->validate([
            'id_siswa' => '',
            'nama_project' => 'required|max:20|min:1',
            'deskripsi' => 'required',
            'tanggal' => 'required'

        ], $message);

        project::find($id)->update($validateData);
        Session::flash('success', 'Data Berhasil di Update!!');

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
        //
    }

    public function hapus($id)
    {
        $project=project::find($id);
        $project->delete();
        Session::flash('success', 'Data Berhasil dihapus');
         return redirect('/masterproject');
    }
}
