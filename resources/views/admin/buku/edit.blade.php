@extends('layouts.app')
@section('title', 'Ihza | Data Buku')
@section('content')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Form Edit</strong> Buku
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{ route('buku.update', $buku->id)}}" method="post" class="" enctype='multipart/form-data'>
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class=" form-control-label">Judul</label>
                                                <input type="text" name="judul" class="form-control" value="{{$buku->judul}}">
                                            </div>
                                            <div class="form-group">
                                                <label class=" form-control-label">Pengarang</label>
                                                <input type="text" name="pengarang" class="form-control" value="{{$buku->pengarang}}">
                                            </div>
                                            <div class="form-group">
                                                <label class=" form-control-label">Penerbit</label>
                                                <input type="text" name="penerbit" class="form-control" value="{{$buku->penerbit}}">
                                            </div><div class="form-group">
                                                <label class=" form-control-label">Tahun terbit</label>
                                                <input type="date" name="th_terbit" class="form-control" value="{{$buku->th_terbit}}">
                                            <div class="form-group">
                                                    <label class=" form-control-label">Sinopsis</label>
                                                    <textarea type="text" class="form-control" name="sinopsis" value="{{$buku->sinopsis}}"></textarea>
                                            </div><div class="form-group">
                                                <label class=" form-control-label">Cover</label>
                                                <input type="file" name="cover" class="form-control" value="{{$buku->cover}}">
                                            </div>
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-dot-circle-o"></i> Ubah
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection