@extends('layout.admin')
@section('title', 'Tampil Siswa')
@section('content-title', 'Tampil Siswa')
@section('content')
 <div class="row">
   <div class="col-lg-4">
     <div class="card shadow mb-4">
     <div class="card-header"> </div>
     <div class="card-body text-center">
     <img src="{{asset ('/template/img/' .$siswa->foto)}} "width="200" class="rounded-circle mt-3 mx-auto img-thumbnail"> <br>
      <h4> {{$siswa -> nama}} </h4>
      <h5> <i class="fas fa-id-card"> </i> {{$siswa -> nisn}} </h5>
      <h5> <i class="fas fa-venus-mars"> </i> {{$siswa -> jk}} </h5>
      <h5> <i class="fas fa-map"> </i> {{$siswa -> alamat}} </h5>

  </div>
</div>   
    <div class="card shadow mb-4">
    <div class="card-header"> 
    <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-user-plus"> </i> Kontak Siswa </h6>
      </div>
       <div class="card-body text-center">
       @foreach($contact as $item)
         <li>{{$item->jenis_contact}} : {{$item->pivot->deskripsi}}</li>
       @endforeach
    </div>
  </div>
</div>
    <div class="col-lg-8">
       <div class="card shadow mb-4">
         <div class="card-header"> 
            <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-quote-left"> </i> About Siswa </h6>
             
           </div>
          <div class="card-body">
      <blockquote class="blockquote text-center">
         <p class="mb-0"> {{$siswa->about}} </p>
      <footer class="blockquote-footer">Ditulis Oleh <cite title="Source Title">{{$siswa->nama}}</cite></footer>
     </blockquote>
  </div>
</div>   
     <div class="card shadow mb-4">
       <div class="card-header"> 
            <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-tasks"> </i> Project Siswa </h6>
         </div>
        <div class="card-body">
      </div>
  </div>
  
</div>
    <a href="{{route ('mastersiswa.index')}}" class="btn btn-danger">Keluar </a> 
 </div>
@endsection