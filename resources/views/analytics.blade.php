@extends('layouts.app')
@section('title') Advanced Search @endsection
@section('content')
<div class="container mt-5">
	<h1 class="display-4">Watts Analysis</h1>
	<div class="row mt-5">
		<div class="col-sm-12 col-md-4 col-lg-3 col-xl-3">
			<!-- Card form filter -->
			<form id="form">
				@csrf
				<div class="card">
					<div class="card-header">Filter</div>
					<div class="card-body">
						<!-- Devices section -->
						<p class="card-text font-weight-bold">Devices</p>
						<div class="form-check">
							<!-- Devices active -->
							@foreach($devices as $device)
								<label for="" class="btn form-check-label mr2 p-0" onclick="setSelect('{{ $device->device_uuid }}')"><input id="{{ $device->device_uuid }}" type="checkbox" class="btn form-check-input" name="device[]" value="{{ $device->device_uuid }}" onclick="setSelect('{{ $device->device_uuid }}')">{{ $device->device_uuid }}</label><br>
							@endforeach
							<!-- Device inactive -->
							<label for="" class="btn form-check-label mr2 p-0 text-muted" onclick="setSelect('123Fan')"><input id="123Fan" type="checkbox" class="btn form-check-input" name="123Fan" value="" onclick="setSelect('123Fan')">123Fan</label><br>
						</div>
						<!-- Watts filter section -->
						<p class="card-text font-weight-bold mt-4">Watts</p>
						<div class="form-row">
							<div class="col"><input type="text" class="form-control" placeholder="min" name="minWatts"></div>
							<div class="col"><input type="text" class="form-control" placeholder="max" name="maxWatts"></div>
						</div>
						<!-- Dates filter section -->
						<p class="card-text font-weight-bold mt-4">Watts</p>
						<div class="form-row">
							<div class='col-md-12'>
								<div class="form-group">
								<div class="input-group date" id="datetimepicker7" data-target-input="nearest">
										<input name="StartDate" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7"/>
										<div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
									</div>
								</div>
							</div>
							<div class='col-md-12'>
								<div class="form-group">
								<div class="input-group date" id="datetimepicker8" data-target-input="nearest">
										<input name="EndDate" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker8"/>
										<div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-light">Filtrar</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-12 col-md-8 col-lg-9 col-xl-9">
			<div id="chart-container">Filtro</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="js/scripts/analytics.js"></script>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker7').datetimepicker({
			//defaultDate: moment().subtract(29, 'days'),
			format: "LT",
			minDate: moment().max(moment().subtract(30, 'days')),
			maxDate: moment(),
			icons: {
				time: "fa fa-clock"
			}
		});
        $('#datetimepicker8').datetimepicker({
			//defaultDate: moment(),
			format: "LT",
			maxDate: moment(),
			icons: {
				time: "fa fa-clock"
			}
        });
        $("#datetimepicker7").on("change.datetimepicker", function (e) {
			$('#datetimepicker8').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker8").on("change.datetimepicker", function (e) {
            $('#datetimepicker7').datetimepicker('maxDate', e.date);
		});
    });
</script>
@endsection