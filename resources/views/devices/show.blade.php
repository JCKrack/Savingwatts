@extends('layouts.app')

@section('content')

<div class="container mt-5">
	<div class="row">
		<div class="col-sm-12 col-lg-4 align-self-center">
			<h1 class="display-4"> {{ $device->device_uuid }}</h1>
			<h4>Location: _room_</h4>
		</div>
	</div>
	<div class="row my-2">
		<div class="col-sm-6 col-lg-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title text-center">Watts Usage</h4>
					<h1 class="display-4 text-center">1,200</h1>
					<p class="card-text text-center">Watts</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title text-center">Current Charges</h4>
					<h1 class="display-4 text-center">$72.00</h1>
					<p class="card-text text-center">Mexican Pesos</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title text-center">Device Uptime</h4>
					<h1 class="display-4 text-center">580</h1>
					<p class="card-text text-center">Minutes</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row mt-3">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header">
					<div class="nav nav-tabs card-header-tabs">
						<li class="nav-item">
							<div class="nav-link active">Real Time</div>
						</li>
						<li class="nav-item">
							<div class="nav-link">Historical</div>
						</li>
					</div>
				</div>
				<div class="card-body">
					<!-- graficas -->
					<div id="chart-container">FusionCharts XT will load here!</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

@endsection