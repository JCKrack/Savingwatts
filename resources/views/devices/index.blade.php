@extends('layouts.app')

@section('content')

<div class="container mt-5">
	<div class="row">
		<div class="col-sm-12 col-lg-4 align-self-center">
			<h1 class="display-4">_locationName_</h1>
			<h4>Site: _site_</h4>
		</div>
	</div>
	<div class="row my-2">
		<div class="col-sm-6 col-lg-4 mb-3">
			<div class="card btn" onclick="redirectDevice()">
				<div class="card-body">
					<h3 class="card-title text-center">_deviceName_</h3>
					<div class="d-flex justify-content-center">
						<div class="p alert alert-success text-center">
							Status: <span class="iconify" data-icon="ant-design:play-circle-outline" data-inline="true"></span> Running
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4 mb-3">
			<div class="card btn" onclick="redirectDevice()">
				<div class="card-body">
					<h3 class="card-title text-center">_deviceName_</h3>
					<div class="d-flex justify-content-center">
						<div class="p alert alert-dark text-center">
							Status: <span class="iconify" data-icon="fe:disabled" data-inline="true"></span> Stopped
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4 mb-3">
			<div class="card btn" onclick="redirectDevice()">
				<div class="card-body">
					<h3 class="card-title text-center">_deviceName_</h3>
					<div class="d-flex justify-content-center">
						<div class="p alert alert-success text-center">
							Status: <span class="iconify" data-icon="ant-design:play-circle-outline" data-inline="true"></span> Running
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4 mb-3">
			<div class="card btn" onclick="redirectDevice()">
				<div class="card-body">
					<h3 class="card-title text-center">_deviceName_</h3>
					<div class="d-flex justify-content-center">
						<div class="p alert alert-danger text-center">
							Status: <span class="iconify" data-icon="ic:outline-error-outline" data-inline="true"></span> Error
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4 mb-3">
			<div class="card btn" onclick="redirectDevice()">
				<div class="card-body">
					<h3 class="card-title text-center">_deviceName_</h3>
					<div class="d-flex justify-content-center">
						<div class="p alert alert-success text-center">
							Status: <span class="iconify" data-icon="ant-design:play-circle-outline" data-inline="true"></span> Running
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-lg-4 mb-3">
			<div class="card btn" onclick="redirectDevice()">
				<div class="card-body">
					<h3 class="card-title text-center">_deviceName_</h3>
					<div class="d-flex justify-content-center">
						<div class="p alert alert-warning text-center">
							Status: <span class="iconify" data-icon="ant-design:warning-outline" data-inline="true"></span> Warning
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection

@section('scripts')
<script>
function redirectDevice() {
	window.location.href = "/devices/1";
}
</script>
@endsection