@extends('layout.admin')
@section('title', 'Contact')
@section('content-title', 'Kontak Siswa') 
@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row">
<div class="col-lg-12">  
 <div class="card shadow mb-4">
 <div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary"><i class="  "></i>  Jenis Kontak</h6>
   @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{-- <div class="input-group mb-3 mt-3">
        <input type="text" class="form-control" id="jenis_kontak" name="jenis_kontak">
        <a class="btn btn-outline-secondary" href="{{ route('jkontak.store') }}">Tambah</a>
    </div> --}}
  
   {{-- <input type="text" width="100px"> --}}
   @if (auth()->user()->role=='admin')
   <a href="{{ route('JenisContact.create') }}" class="btn btn-outline-success" style="margin-top: 10px">Tambah Jenis Kontak</a>
   @endif
 </div>
    <div class="card-body text-center">
    <table class="table">
             <thead>
                 <tr>                 
                 <th scope="col">ID</th>   
                 <th scope="col">JENIS KONTAK</th>
                 @if (auth()->user()->role=='admin')
                 <th scope="col">ACTION</th>
                 @endif
                 </tr>
             </thead>
             @foreach($data_jcontact as $j_contact)
             <tr>
                 <td> {{ $j_contact->id }} </td> 
                 <td> {{ $j_contact->jenis_contact }} </td>
                 @if (auth()->user()->role=='admin')
                 <td class="text-center">
                    <a href="{{ route('JenisContact.edit', $j_contact->id)  }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('JenisContact.hapus', $j_contact->id)  }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                 </td>
                 @endif
             </tr>
             @endforeach
    </table>
             <div class="card-footer d-flex justify-content-end">
                 {{ $data_jcontact->links() }}  
             </div>
    </div>
 
</div>
</div>

<div class="col-lg-6">  
 <div class="card shadow mb-4">
 <div class="card-header">
   <h6 class="m-0 font-weight-bold text-primary"><i class="  "></i>  Kontak Siswa</h6>
 </div>
    <div class="card-body text-center">
    <table class="table">
             <thead>
                 <tr>                 
                 <th scope="col">NISN</th>   
                 <th scope="col">NAMA</th>
                 <th scope="col">ACTION</th>
                 </tr>
             </thead>
             @foreach($data as $item)
             <tr>
                 <td> {{ $item->nisn }} </td> 
                 <td> {{ $item->nama }} </td>
                 <td class="text-center" style="padding-top:10px">
                       <a class="btn btn-sm btn-info btn-square" onclick="show({{ $item->id  }})"> <i class="fas fa-folder-open"></i></a>
                     @if (auth()->user()->role=='admin')
                     <a href="{{ route('mastercontact.tambah', $item->id)   }}" class="btn btn-sm btn-success"><i class="fas fa-plus"> </i></a>   
                     @endif
                 </td>
             </tr>
             @endforeach
    </table>
             <div class="card-footer d-flex justify-content-end">
                 {{ $data->links() }}  
             </div>
    </div>
 
</div>
</div>
 <!-- ketiga -->
 <div class="col-lg-6">
    <div class="card shadow mb-4">
      <div class="card-header">
      <h6 class="m-0 font-weight-bold text-primary"><i class=""></i> About Siswa</h6>
      </div>
      <div id="project" class="card-body">
      <h6 class="text-center">pilih siswa dulu</h6>
      </div>
    </div>   
 </div>
</div>
<script>
function show(id){
    $.get('mastercontact/'+id, function(data){
        $('#project').html(data);
    })
}
</script>
@endsection
