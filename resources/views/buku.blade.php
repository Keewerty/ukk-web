@extends('layout.main')

@section('container')
    <div class="title-top mb-5">
        <h2 class="fw-bold">Daftar buku</h2>
    </div>
    <form method="post" action="{{route('buku.store')}}">
        {{csrf_field()}}
        <div class="form-floating mb-3">
            
            <input type="text" class="form-control" id="inputjudul" placeholder="Judul" name="judul">
            <label class="form-label">Judul</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputpengarang" placeholder="Pengarang" name="pengarang">
            <label class="form-label">Pengarang</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="inputpenerbit" placeholder="Pengarang" name="penerbit">
            <label class="form-label">Penerbit</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="inputtahun" placeholder="Tahun Terbit" name="th_terbit">
            <label class="form-label">Tahun terbit</label>
        </div>
        <div class="form-floating mb-3">
            <input type="file" class="form-control" id="inputcover" placeholder="Cover" name="cover">
            <label class="form-label">Cover</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection