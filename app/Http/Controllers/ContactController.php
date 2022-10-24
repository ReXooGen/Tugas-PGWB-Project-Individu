<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
use App\Models\siswa;
use App\Models\contact;
use App\Models\jenis_contact;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::paginate(5);
        $data_jcontact = jenis_contact::paginate(5);

        return view('layout.mastercontact', compact('data', 'data_jcontact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $siswa = Siswa::find($id);
        // $j_contact = jenis_contact::all();
        // return view('contact.AddContact', compact('siswa', 'j_contact'));
    }

    public function tambah($id)
    {
        $siswa=Siswa::find($id);
        $j_contact = jenis_contact::all();
        return view('contact.AddContact', compact('siswa', 'j_contact'));
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
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'mimes' => ':attribute harus bertipe foto'
        ];

        $this->validate($request, [
            'deskripsi' => 'required'
        ], $message);

        contact::create([
            'siswa_id' => $request->id_siswa,   
            'jenis_contact_id' => $request->jenis_contact,
            'deskripsi' => $request->deskripsi
        ]);

        Session::flash('success', "Contact berhasil ditambahkan!!");
        return redirect('/mastercontact');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $contact = Siswa::find($id)->contact()->get();
          // $kontak = siswa::find($id)->kontak()->get()::paginate(1);
          // $data = kontak::paginate(1);
        //   return $contact;
          return view('contact.ShowContact', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $contact = siswa::find($id)->kontak()->get();
        // $contact = siswa::find($id)->jenis_kontak()->get();
        $contact = contact::find($id);
        $j_contact = jenis_contact::all();
        // $kontak = kontak::get();
        // return($contact);
       
        //
        return view('contact.EditContact', compact('contact', 'j_contact'));
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
            'required' => ':attribute harus diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maximal :max karakter',
            'numeric' => ':attribute harus diisi angka',
            'mimes' => ':attribute harus bertipe foto'
        ];

        $this->validate($request, [
            // 'nama_p' => 'required|min:7|max:30',
            // 'deskripsi' => 'required|min:10'
        ], $message);

        $contact = contact::find($id);
        $contact->jenis_contact_id = $request->jenis_contact;
        $contact->deskripsi = $request->deskripsi;

        $contact->save();
        Session::flash('success', "Contact berhasil diupdate!!");
        return redirect('mastercontact');

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
        $siswa = contact::find($id)->delete();
        Session::flash('success', "kontak berhasil dihapus!!");
        return redirect('/masterproject');
    }

}
