@extends('layouts.app')

@section('judulTab')
    Tambah Komoditas Baru - Monha
@endsection

@section('page-header')
<div class="row g-2 align-items-center">
    <div class="col">
      <!-- Page pre-title -->
      <div class="page-pretitle">
        Tambah
      </div>
      <h2 class="page-title">
        Komoditas
      </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
        <div class="btn-list">
        <a href="{{ route('commodities.index') }}" class="btn d-none d-sm-inline-block">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-big-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9.586 4l-6.586 6.586a2 2 0 0 0 0 2.828l6.586 6.586a2 2 0 0 0 2.18 .434l.145 -.068a2 2 0 0 0 1.089 -1.78v-2.586h7a2 2 0 0 0 2 -2v-4l-.005 -.15a2 2 0 0 0 -1.995 -1.85l-7 -.001v-2.585a2 2 0 0 0 -3.414 -1.414z" /></svg>
            Kembali
        </a>
        <a href="{{ route('commodities.index') }}" class="btn d-sm-none btn-icon">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-arrow-big-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9.586 4l-6.586 6.586a2 2 0 0 0 0 2.828l6.586 6.586a2 2 0 0 0 2.18 .434l.145 -.068a2 2 0 0 0 1.089 -1.78v-2.586h7a2 2 0 0 0 2 -2v-4l-.005 -.15a2 2 0 0 0 -1.995 -1.85l-7 -.001v-2.585a2 2 0 0 0 -3.414 -1.414z" /></svg>
        </a>
        </div>
    </div>
</div>
@endsection

@section('page-body')
    <div class="col-12">
        <form action="{{ route('commodities.store') }}" method="POST" class="card" autocomplete="off">
        @csrf
        @method('POST')
            <div class="card-header">
                <h3 class="card-title">Tambah Komoditi baru</h3>
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Kode Komoditas</label>
                    <div class="col">
                      <input name="id" type="number" class="form-control">
                    </div>
                </div>  
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Nama Komoditas</label>
                    <div class="col">
                      <input name="name" type="text" class="form-control">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Kuesioner</label>
                    <div class="col">
                      <input name="kode_kuesioner" type="text" class="form-control">
                    </div>  
                </div>
                <div class="mb-3 row">
                    <label class="col-3 col-form-label required">Notes</label>
                    <div class="col">
                        <textarea name="note" class="form-control"></textarea>
                    </div>  
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection