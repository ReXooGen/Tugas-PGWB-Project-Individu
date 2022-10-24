@extends('layout.admin')

@section('title', 'Project')

@section('content-title', 'Project Siswa')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">X </button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"> Data Siswa </h6>
                </div>
                <div class="card-body text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NAMA</th>
                                <th scope="col">NISN</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->nama }} </td>
                                    <td>{{ $item->nisn }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-info btn-square" onclick="show({{ $item->id }})"> <i
                                                class="fas fa-folder-open"></i></a>
                                        <a href="{{ route('masterproject.tambah', $item->id) }}"
                                            class="btn btn-sm btn-success btn-square"> <i class="fas fa-plus"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary"> Project Siswa </h6>
                </div>
                <div id="project" class="card-body">
                    <h6 class="text-center">Pilih Siswa terlebih dahulu</h6>
                </div>
            </div>
        </div>

    </div>

    <script>
        function show(id) {
            $.get('masterproject/' + id, function(data) {
                $('#project').html(data);
            })
        }
    </script>
@endsection
