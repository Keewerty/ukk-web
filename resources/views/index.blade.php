{{-- <div class="main"> --}}
@extends('layout.main')

@section('container')

<div class="container">
  <div class="row">
    
    {{-- <div class="row g-3 align-items-center m-t-10">
      <div class="col-auto">
          <form action="{{ route('books.index') }}" method="GET">
              <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="Search">
          </form>
      </div>
  </div> --}}

  {{-- @foreach ($bukus as $buku)
    <div class="col-md-6 mt-3">
      <div class="card mb-2">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{ asset('uploads/' . $buku->cover) }}" class="img-fluid rounded-start"  style="max-height: 200px;">
          </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"> {{$buku->judul}}  </h5>
                <p class="card-text">{{$buku->sinopsis}}</p>
                <p class="card-text"><small class="text-muted">Updated at : {{$buku->updated_at}}</small></p>
              </div>
            </div>
        </div>
      </div>
    </div>
  @endforeach --}}
@foreach ($buku as $bukus)
  <div class="card mb-3" style="max-width: 540px;">
    
    <div class="row g-3">
          <div class="col-md-4">
            <img src="{{ asset('uploads/' . $bukus->cover) }}" class="img-fluid rounded-start" alt="...">
          </div>
      
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{$bukus->judul}}</h5>
              <p class="card-text"><small class="text-muted">Updated at : {{$bukus->updated_at}}</small></p>
              <a href="/book/detail/ {{ $bukus->id}}" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="card" style="max-width: 300px;">
    <img src="{{ asset('uploads/' . $bukus->cover) }}">
    <div class="card-body">
      <h5 class="card-title">{{$bukus->judul}}</h5>
      <p class="card-text"><small class="text-muted">Updated at : {{$bukus->updated_at}}</small></p>
      <a href="/book/detail/ {{ $bukus->id}}" class="btn btn-primary">Detail</a>
    </div>
  </div> --}}
{{-- </div>   --}}
@endforeach


  <style>
    .detailbox{
        flex: 100%;
        display: none;
        position: fixed;
        inset: 0;
        background-color: #00000075;
    }

    .detailbox .box{
        background-color: white;
        padding: 30px 30px 40px 30px;
        margin: auto;
        width: 600px;
    }

    .detailbox .box .header{
        display: flex;
        justify-content: space-between;
    }

    .detailbox .box .header .close{
        cursor: pointer;
    }

    .detailbox .box .body{
        display: flex;
        justify-content: flex-start;
    }

    .detailbox .box .body td{
        padding: 5px 10px 0px 0px;
    }

    .detailbox .box .body .image{
        width: 200px;
    }

    .detailbox .box .body img{
        width: 80%;
    }

    /* .main {
    background-image: url('admin/images/icon/bg.jpg');
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    width: 100%;
} */
</style>

@endsection
