@extends('layouts.app')

@section('judulTab')
    Beranda - Monha
@endsection

@section('page-header')
<div class="row g-2 align-items-center">
    <div class="col">
      <!-- Page pre-title -->
      <div class="page-pretitle">
        Halaman
      </div>
      <h2 class="page-title">
        Beranda
      </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        Periode
        <a href="#" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ $selectedMonth }}
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            @foreach ($months as $m)
                <a href="" class="dropdown-item">{{ $m }}</a>
            @endforeach
        </div>
      </div>
    </div>
</div>
@endsection

@section('page-body')
    <div class="col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Progress Entri</div>
                </div>
                <div class="h1 mb-3">{{ $percentageWithPrice }}</div>
                <div class="d-flex mb-2">
                    <div>Persen</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Harga Extreme</div>
                </div>
                <div class="h1 mb-3">{{ $commoditiesExtreme }}</div>
                <div class="d-flex mb-2">
                    <div>Komoditas</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="subheader">Harga Tidur</div>
                </div>
                <div class="h1 mb-3">{{ $commoditiesSleep }}</div>
                <div class="d-flex mb-2">
                    Komoditas
                </div>
            </div>
        </div>
    </div>
@endsection