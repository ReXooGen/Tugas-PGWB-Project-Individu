@extends('layout.admin')

@section('title', 'Tambah Project')

@section('content-title', 'Tambah Project - ' . $siswa->nama)

@section('content')

<div class="row">
  <div class="col-lg-12">
     <div class="card shadow mb-4"> 
        <div class="card-body">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $item)
                  <li>{{$item}}</li>
                @endforeach
              </ul>
            </div>
          
        @endif
    
            <form action="{{route('masterproject.store')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
                    <label for="nama_project">NAMA PROJECT </label>
                    <input type="text" class="form-control" id="nama_project" name='nama_project' value="{{old('nama_project')}}">
                </div>

                <div class="form-group">
                    <label for="deskripsi">DESKRIPSI PROJECT </label>
                    <textarea name='deskripsi' class="form-control" id="deskirpsi">{{old('deskripsi')}}</textarea>
                </div>

                <div class="form-group">
                    <label for="tanggal">TANGGAL PROJECT </label>
                    <input type="date" class="form-control" id="tanggal" name='tanggal' value="{{old('tanggal')}}">
                </div>

                <div class="form-group">
                    <a href="{{route('masterproject.index')}}"class="btn btn-danger"> BATAL </a>
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
    @endsection
