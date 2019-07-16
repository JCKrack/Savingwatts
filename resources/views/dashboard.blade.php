@extends('layouts.app')
@section('content')
<div class="container mt-5">
  <!--First cards-->
  <div class="row text-center justify-content-between">
    <div class="col-12 col-md-6 mb-3 mb-md-0">
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 class="card-title display-4">1,285</h4>
          <p class="card-text lead">Watts consumidos.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 mb-3 mb-md-0">
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 class="card-title display-4">$85.00</h4>
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
            <ol class="text-left lead">
              <li>Lorem ipsum dolor sit.</li>
              <li>Lorem ipsum dolor sit.</li>
              <li>Lorem ipsum dolor sit.</li>
              <li>Lorem ipsum dolor sit.</li>
              <li>Lorem ipsum dolor sit.</li>
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
                <ol class="text-left lead">
                  <li>Lorem ipsum dolor sit.</li>
                  <li>Lorem ipsum dolor sit.</li>
                  <li>Lorem ipsum dolor sit.</li>
                  <li>Lorem ipsum dolor sit.</li>
                  <li>Lorem ipsum dolor sit.</li>
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
          <h4 class="card-title display-4">835</h4>
          <p class="card-text lead">Watts consumidos de<br>08 a 22 hrs.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3 mb-md-0">
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 class="card-title display-4">450</h4>
          <p class="card-text lead">Watts consumidos de<br>22 a 08 hrs.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3 mb-md-0">
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 class="card-title display-4">1,285</h4>
          <p class="card-text lead">Watts consumidos de<br>entre semana.</p>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-3 mb-3 mb-md-0">
      <div class="card w-100 bg-light text-dark">
        <div class="card-body">
          <h4 class="card-title display-4">1,285</h4>
          <p class="card-text lead">Watts consumidos de<br>en fin de semana.</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection