@extends('layouts.app')

@section('content')

<div class="container mt-5">
	<div class="row">
		<!-- Device Info -->
		<div class="col-sm-6 col-md-6 col-lg-9 align-self-center">
			<h1 class="display-4"> {{ $device->device_uuid }}</h1>
			<h4 class="">Location: _room_</h4>
		</div>
		<!-- Status -->
		<div class="col-sm-6 col-md-6 col-lg-3">
			<div class="p">
				<div class="h4 text-center d-none d-sm-block">Current Status</div>
				<div class="alert alert-success text-center">
					<span class="iconify" data-icon="ant-design:play-circle-outline" data-inline="true"></span> Running
				</div>
			</div>
		</div>
	</div>
	<!-- Device details -->
	<div class="row my-2">
		<div class="col-sm-6 col-lg-4 mb-2">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title text-center">Watts Usage</h4>
					<h1 class="display-4 text-center">1,200</h1>
					<p class="card-text text-center">Watts</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4 mb-2">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title text-center">Current Charges</h4>
					<h1 class="display-4 text-center">$72.00</h1>
					<p class="card-text text-center">Mexican Pesos</p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4 mb-2">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title text-center">Device Uptime</h4>
					<h1 class="display-4 text-center">580</h1>
					<p class="card-text text-center">Minutes</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Chart section -->
	<div class="row">
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
					<!-- Chart HERE -->
					<div id="chart-container">FusionCharts XT will load here!</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

@endsection