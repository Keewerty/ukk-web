@extends('layout.main')

@section('container')
<div class="container" style="max-width: 7000px;">
    @foreach ($detailbuku as $bk)
    <div class="row">
      <div class="col-md-3">
        {{-- <img src="{{ asset('uploads/'.$bk->cover) }}" alt="Book cover" class="img-fluid"> --}}

        <div class="card" style="width: 18rem;">
          <img src="{{ asset('uploads/'.$bk->cover) }}" alt="Book cover" class="img-fluid">

          <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Judul : </b>{{$bk->judul}}</li>
            <li class="list-group-item"><b> Author : </b>{{$bk->pengarang}}</li>
            <li class="list-group-item"><b> Penerbit : </b>{{$bk->penerbit}}</li>
            <li class="list-group-item"><b> Tahun terbit :</b>{{$bk->th_terbit}}</li>
            
          </ul>
        </div>

      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <b>Sinopsis</b>
          </div>
          <div class="card-body">
            <p class="card-text">{{$bk->sinopsis}}</p>
          </div>
        </div>
      </div>
      <div class="col-md-2">
        <a href="{{ URL::previous() }}" class="btn btn-danger">X</a>
      </div>
    </div>
    @endforeach
</div>
@endsection