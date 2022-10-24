@if ($contact->isEmpty())
    <h6 class="text-center">Siswa Belum Memiliki Kontak</h6>

@else
    @foreach($contact as $item)
        <div class="card mb-3">
            <div class="card-header">
                {{-- <strong>{{ $item->nama_project }}</strong> --}}
            </div>

            <div class="card-body">
                <strong>Jenis Kontak :</strong>
                <p>{{ $item->jenis_contact }}</p>
                <strong>Deskripsi Kontak :</strong>
                <p>{{ $item->pivot->deskripsi }}</p>
            </div>

            <div class="card-footer">
                @if (auth()->user()->role=='admin')    
                <a href="{{route('mastercontact.edit', $item->pivot->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <a href="{{route('mastercontact.hapus', $item->pivot->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                @endif
            </div>
        </div>
        @endforeach
        {{-- <div class="card-footer d-flex justify-content-end">
            {{ $kontak->links() }}  
        </div> --}}
@endif