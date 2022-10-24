@extends('layout.admin')
@section('title', 'Edit Kontak')
@section('content-title', 'Edit Kontak')
@section('content')

{{-- {{ dd($kontak->id) }}  --}}
    <h1>Halaman Edit Kontak</h1>
    <p>ID Jenis Kontak : {{ $contact->jenis_contact_id }}</p>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <form method="post" action="{{ route('mastercontact.update', $contact->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="jenis_contact">Jenis Kontak</label>
                            <div class="input-group mb-3">
                                <select class="custom-select" id="jenis_contact" name="jenis_contact">
                                    {{-- <option selected>{{ $kontak->jenis_kontak_id }}</option> --}}
                                  @foreach ($j_contact as $j_contact) 
                                  <option value="{{ $j_contact->id }}">{{ $j_contact->jenis_contact }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi' value="{{ $contact->deskripsi }}">
                        </div>
                        <div class="form-group">
                            {{-- <a href="submit" class="btn btn-success">Simpan</a> --}}
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <a href="{{ route('mastercontact.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection