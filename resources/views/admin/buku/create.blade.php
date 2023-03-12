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
                                        <form method="post" action="{{route('buku.store')}}" enctype='multipart/form-data'>
                                            {{csrf_field()}}
                                            <div class="form-floating mb-3">
                                                
                                                <label class="form-label">Judul</label>
                                                <input type="text" class="form-control" id="inputjudul" placeholder="Judul" name="judul">
                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label class="form-label">Pengarang</label>
                                                <input type="text" class="form-control" id="inputpengarang" placeholder="Pengarang" name="pengarang">
                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label class="form-label">Penerbit</label>
                                                <input type="text" class="form-control" id="inputpenerbit" placeholder="Penerbit" name="penerbit">
                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label class="form-label">Tahun terbit</label>
                                                <input type="date" class="form-control" id="inputtahun" placeholder="Tahun Terbit" name="th_terbit">
                                                
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <label class="form-label">Cover</label>
                                                <input type="file" class="form-control" id="inputcover" placeholder="Cover" name="cover">
                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label class="form-label">Sinopsis</label>
                                                <textarea type="text" class="form-control" id="inputsinopsis" placeholder="Sinopsis" name="sinopsis"></textarea>
                                                
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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