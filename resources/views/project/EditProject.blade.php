@extends('layout.admin')

@section('title', 'Edit Project')

@section('content-title', 'Edit Project')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('masterproject.update', $project->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">NAMA PROJECT</label>
                            <input type="text" class="form-control" id="nama" name='nama_project'
                                value="{{ $project->nama_project }}">
                        </div>
                        <div class="form-group">
                            <label for="nisn">Deskripsi Project </label>
                            <input type="text" class="form-control" id="deskripsi" name='deskripsi'
                                value="{{ $project->deskripsi }}">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Tanggal Project</label>
                            <input type="date" class="form-control" id="tanggal" name='tanggal'
                                value="{{ $project->tanggal }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success">
                            <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>



    </div>

@endsection
