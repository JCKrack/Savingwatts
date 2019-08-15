@extends('layouts.app')
<!-- title -->
@section('title') Dashboard @endsection
<!-- content -->
@section('content')
<div class="container mt-5">
  <!--First cards-->
  <div class="row text-center justify-content-between">
    <div class="col-12 col-md-6 mb-3 mb-md-0">
      <div class="card w-100 text-dark">
        <div class="card-body">
          <h4 class="card-title text-center">Watts Usage</h4>
          <h1 id="totalWatts" class="display-4 text-center">{{ $totalWatts }}</h1>
          <p class="card-text text-center">Watts consumidos.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 mb-3 mb-md-0">
      <div class="card w-100 text-dark">
        <div class="card-body">
          <h4 class="card-title text-center">Current Charges</h4>
          <h1 id="bill" class="display-4 text-center">${{ number_format($bill,2) }}</h1>
          <p class="card-text text-center">Aproximadamente.</p>
        </div>
      </div>
    </div>
  </div>
  <!--Charts-->
  <div id="chart-container">FusionCharts XT will load here!</div>
  <!--Last cards-->
  <!--First row-->
  <div class="row text-center justify-content-between">
    <div class="col-12 col-md-6 mb-3 mb-md-0">
      <div class="card w-100 text-dark">
        <div class="card-body">
          <p class="card-text text-center">
            <h4 class="card-title text-center">Top 5 Devices (more usage)</h4>
            <ol id = "devicesHigh" class="text-left lead">
              @foreach ($devicesHigh as $deviceHigh)
                <li>{{ $deviceHigh->device_uuid }}</li>
              @endforeach
            </ol>
          </p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 mb-3 mb-md-0">
      <div class="card w-100 text-dark">
          <div class="card-body">
              <p class="card-text text-center">
              <h4 class="card-title text-center">Top 5 Devices (less usage)</h4>
                <ol id="devicesLow" class="text-left lead">
                  @foreach ($devicesLow as $deviceLow)
                    <li>{{ $deviceLow->device_uuid }}</li>
                  @endforeach
                </ol>
              </p>
            </div>
      </div>
    </div>
  </div>
  <!--Second row-->
  <div class="row text-center justify-content-between mt-0 mt-md-3 mb-5">
    <div class="col-12 col-md-3 mb-3 mb-md-0">
      <div class="card w-100 text-dark">
        <div class="card-body">
          <h4 class="card-title text-center">Morming Hrs</h4>
          <h1 id="wattsDay" class="display-4 text-center">{{ $wattsDay }}</h1>
          <p class="card-text text-center">Watts.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3 mb-md-0">
      <div class="card w-100 text-dark">
        <div class="card-body">
          <h4 class="card-title text-center">Slepping Hrs</h4>
          <h1 id="wattsNight" class="display-4 text-center">{{ $wattsNight }}</h1>
          <p class="card-text text-center">Watts.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3 mb-md-0">
      <div class="card w-100 text-dark">
        <div class="card-body">
          <h4 class="card-title text-center">Workweek</h4>
          <h1 id="wattsPerWeek" class="display-4 text-center">{{ $wattsPerWeek }}</h1>
          <p class="card-text text-center">Watts.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3 mb-md-0">
      <div class="card w-100 text-dark">
        <div class="card-body">
          <h4 class="card-title text-center">Weekend</h4>
          <h1 id="wattsPerWeekEnd" class="display-4 text-center">{{ $wattsPerWeekEnd }}</h1>
          <p class="card-text text-center">Watts.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="/js/scripts/dashboard.js"></script>
@endsection