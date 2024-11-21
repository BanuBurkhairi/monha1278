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
      <form action="{{ route('dashboard') }}">
        Periode
        <select name="month_year" class="form-select" onchange="this.form.submit()">
            @foreach($months as $m)
                <option value="{{ $m }}" {{ $selectedMonthYear == $m ? 'selected' : '' }}>
                    {{ $m }}
                </option>
            @endforeach
        </select>
      </form>
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
                <div class="h1 mb-3">{{ $progressPercentage }}</div>
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
                <div class="h1 mb-3">{{ $ekstrimCount }}</div>
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
                <div class="h1 mb-3">{{ $sleepingCount }}</div>
                <div class="d-flex mb-2">
                    Komoditas
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="card-title">Series Harga</h3>
                    <div class="ms-auto">
                        <form method="GET" action="{{ route('dashboard') }}">
                            <select type="text" name="commodity_id" id="select-users" onchange="this.form.submit()" class="form-select">
                                @foreach($commodities as $commodity)
                                    <option value="{{ $commodity->id }}" {{ request('commodity_id') == $commodity->id ? 'selected' : '' }}>
                                        {{ $commodity->name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
                <div id="chart-completion-tasks-2"></div>
            </div>
        </div>
    </div>
@endsection

@section('jees')
  <script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function () {
        var chartData = @json($chartData);
        var chartLabels = @json($chartLabels);
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-completion-tasks-2'), {
            chart: {
                type: "line",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            fill: {
                opacity: 1,
            },
            stroke: {
                width: 2,
                lineCap: "round",
                curve: "smooth",
            },
            series: [{
                name: "Harga",
                data: chartData
            }],
            tooltip: {
                theme: 'dark'
            },
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                type: 'category',
                categories: chartLabels
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: chartLabels,
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
  </script>
@endsection