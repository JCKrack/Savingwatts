@extends('layouts.app')

@section('content')

<div class="container mt-5">
	@foreach($sites as $site)
	<div class="row">
		<div class="col-sm-12 col-lg-4 align-self-center">
			<h1 class="display-4">{{ $site->site_name }}</h1>
		</div>
	</div>
	@foreach($rooms as $room)
	@if($site->id == $room->site_id)
		<h4>{{ $room->room_name }}</h4>
	<div class="row my-2">
		@foreach($devices as $device)
		@if($room->id == $device->room_id)
			<div class="col-sm-6 col-lg-4 mb-3">
				<div class="card btn" onClick="parent.location='devices/{{ $device->id }}'">
					<div class="card-body">
						<h3 class="card-title text-center">{{ $device->device_uuid }}</h3>
						<div class="d-flex justify-content-center">
							@if($device->device_status == "Active")
								<div class="p alert alert-success text-center">
									Status: <span class="iconify" data-icon="ant-design:play-circle-outline" data-inline="true"></span> Running
								</div>
							@endif
							@if($device->device_status == "Desactive")
								<div class="p alert alert-dark text-center">
									Status: <span class="iconify" data-icon="fe:disabled" data-inline="true"></span> Stopped
								</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		@endif
		@endforeach
	</div>
	@endif
	@endforeach
	@endforeach
</div>
@endsection

@section('scripts')
<script>
function init() {
	console.log("Script load")
}
</script>
@endsection