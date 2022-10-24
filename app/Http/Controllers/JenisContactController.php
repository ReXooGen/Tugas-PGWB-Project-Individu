<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session; 
use App\Models\jenis_contact;
use Illuminate\Http\Request;

class JenisContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layout.mastercontact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.AddJContact');
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
            'jenis_contact' => 'required'
        ], $message);


        jenis_contact::create([
            'jenis_contact' => $request->jenis_contact
        ]);

        Session::flash('success', "data berhasil ditambahkan!!");
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
        //
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
        // $kontak = kontak::find($id);
        $j_contact = jenis_contact::find($id);
        // $kontak = kontak::get();
        // return($j_kontak);
        return view('contact.EditJContact', compact('j_contact'));

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

       $validateData =  $this->validate($request, [
            'jenis_contact' => 'required'
        ], $message);
        // return $request; 
        jenis_contact::find($id)->update($validateData);   

           
            Session::flash('success', "data berhasil diupdate!!");
            return redirect('/mastercontact');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function hapus($id)
        {
            $siswa = jenis_contact::find($id)->delete();
            Session::flash('success', "data berhasil dihapus!!");
            return redirect('/mastercontact');
        }
}
