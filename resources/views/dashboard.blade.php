@extends('layouts.app')
<!-- title -->
@section('title') Dashboard @endsection
<!-- content -->
@section('content')
<div class="container mt-5">
  <!--First cards-->
  <div class="row text-center justify-content-between">
    <div class="col-12 col-md-6 mb-3 mb-md-0">
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 id="totalWatts" class="card-title display-4">{{ $totalWatts }}</h4>
          <p class="card-text lead">Watts consumidos.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 mb-3 mb-md-0">
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 id="bill" class="card-title display-4">${{ number_format($bill,2) }}</h4>
          <p class="card-text lead">Aproximadamente.</p>
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
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <p class="card-text lead">
            Electrodomesticos de mayor consumo
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
      <div class="card w-100 bg-light text-dark">
          <div class="card-body">
              <p class="card-text lead">
                Electrodomesticos de menor consumo
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
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 id="wattsDay" class="card-title display-4">{{ $wattsDay }}</h4>
          <p class="card-text lead">Watts consumidos de<br> 09am a 12am hrs.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3 mb-md-0">
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 id="wattsNight" class="card-title display-4">{{ $wattsNight }}</h4>
          <p class="card-text lead">Watts consumidos de<br>12am a 09am hrs.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3 mb-md-0">
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 id="wattsPerWeek" class="card-title display-4">{{ $wattsPerWeek }}</h4>
          <p class="card-text lead">Watts consumidos de<br>entre semana.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3 mb-md-0">
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 id="wattsPerWeekEnd" class="card-title display-4">{{ $wattsPerWeekEnd }}</h4>
          <p class="card-text lead">Watts consumidos de<br>en fin de semana.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="/js/scripts/dashboard.js"></script>
@endsection