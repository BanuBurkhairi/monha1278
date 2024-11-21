@extends('layouts.app')

@section('judulTab')
    Daftar Harga - Monha
@endsection

@section('page-header')
<div class="row g-2 align-items-center">
    <div class="col">
      <!-- Page pre-title -->
      <div class="page-pretitle">
        Daftar
      </div>
      <h2 class="page-title">
        Harga
      </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ms-auto d-print-none">
      <div class="btn-list">
        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-team">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-upload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
            Upload Harga
        </a>
        <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-team">
            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-upload"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><path d="M7 9l5 -5l5 5" /><path d="M12 4l0 12" /></svg>
        </a>
      </div>
    </div>
</div>
@endsection

@section('page-body')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Harga Bulan </h3>
            </div>
            <div class="card-body">
                <form action="{{ route('price.index') }}" method="GET" class="d-flex">
                    <div class="text-muted">
                      <div class="input-icon">
                        <span class="input-icon-addon">
                          <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                        </span>
                        <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="Cari Komoditas...">
                      </div>
                    </div>
                    <div class="ms-auto text-muted">
                      <select name="month_year" class="form-select" onchange="this.form.submit()">
                        @foreach($monthYears as $monthYear)
                            <option value="{{ $monthYear }}" {{ $selectedMonthYear == $monthYear ? 'selected' : '' }}>
                                {{ $monthYear }}
                            </option>
                        @endforeach
                      </select>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <table class="table card-table table-vcenter text-nowrap datatable">
                  <thead class="text-center">
                    <tr>
                      <th>No</th>
                      <th>Nama Komoditas</th>
                      <th>Harga (Rp)</th>
                      <th>RH</th>
                      <th>Status</th>
                      <th>Catatan</th>
                      <th class="w-1">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($prices as $index => $p)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $p->commodity->name }}</td>
                        <td class="text-end">{{ $p->price }}</td>
                        <td class="text-end">{{ $p->rentang }}</td>
                        <td class="text-center">
                          @if ($p->status === "Ekstrim")
                            <span class="badge bg-danger me-1">{{ $p->status }}</span>
                          @elseif ($p->status === "Tetap")
                            <span class="badge bg-info me-1">{{ $p->status }}</span>
                          @else
                            <span class="badge bg-secondary me-1">{{ $p->status }}</span>
                          @endif
                        </td>
                        <td>{{ $p->keterangan }}</td>
                        <td class="text-end">
                          <a href="{{ route('price.edit', $p->id) }}" class="btn btn-icon btn-warning">
                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                          </a>
                          <form action="{{ route('commodities.destroy', $p->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-icon btn-danger" onclick="return confirm('Kamu yakin ingin menghapus harga {{ $p->commodity->name }} periode {{ $p->month_year }}?')">
                                  <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                              </button>
                          </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-muted">Belum ada harga tidak ditemukan pada periode ini</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('popup')
<div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form class="modal-content" action="{{ route('price.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Unggah Daftar Harga Bulanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3 row">
                <label class="col-3 col-form-label required">Periode</label>
                <div class="col">
                  <input name="month_year" type="text" class="form-control" placeholder="YYYY-MM" required>
                  <small class="form-hint">Masukkan periode bulan sesuai format</small>
                </div>
            </div>
            <div class="mb-3">
                <input type="file" name="file" required accept=".xlsx,.xls" placeholder="Pilih File" class="form-control">
                <small class="form-hint">Format File : xlsx dan xls</small>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Unggah</button>
        </div>
      </form>
    </div>
</div>
@endsection
