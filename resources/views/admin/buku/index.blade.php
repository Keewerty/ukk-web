@extends('layouts.app')
@section('title', 'Ihza | Data bukus')
@section('content')
<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="title-1">Data Buku</h2>
                                <div class="overview-wrap">
                                    
                                    <a href="{{route('export')}}">
                                        <button class="btn btn-success">Export to Excel</button>
                                    </a>
                                    
                                    <div class="row g-3 align-items-center m-t-10">
                                        <div class="col-auto">
                                            {{-- <form action="{{ route('books.index') }}" method="GET">
                                                <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="Search">
                                            </form> --}}
                                            <form class="form-inline" action="{{ route('buku.index') }}" method="GET ">
                                                <div class="form-group mb-2">
                                                  <input type="search" name="search" class="form-control" placeholder="Search" aria-describedby="password">
                                                </div>
                                                <div class="form-group mb-2">
                                                
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Judul</th>
                                                <th>Pengarang</th>
                                                <th>Penerbit</th>
                                                <th>Tahun terbit</th>
                                                <th>Cover</th>
                                                <th>Sinopsis</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($buku as $item => $buks)
                                            <tr>
                                                <td>@isset($record)
                                                    {{$index + 1}}
                                                @endisset</td>
                                                <td>{{$buks->judul}}</td>
                                                <td>{{$buks->pengarang}}</td>
                                                <td>{{$buks->penerbit}}</td>
                                                <td>{{$buks->th_terbit}}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/' . $buks->cover) }}" width="100">
                                                </td>
                                                <td>{{$buks->sinopsis}}</td>
                                                <td>
                                                    <a href="{{route('buku.edit', $buks->id)}}"><i class="fas fa-edit"></i></a>
                                                    |
                                                    <a href="{{route('buku.destroy', $buks->id)}}"><i class="fas fa-trash" style="color: red"></i></a>
                                                </td>
                                                
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    {{$buku->links() }}
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection