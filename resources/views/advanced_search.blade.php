@extends('layouts.app')
@section('title') Advanced Search @endsection
@section('content')
<div class="container mt-5">
	<h1 class="display-4">Advanced Search</h1>
	<div class="row mt-5">
		<div class="col-sm-12 col-md-4 col-lg-3 col-xl-3" style="border:1px solid #333">
			<!-- Card form filter -->
			<div class="card">
				<div class="card-header">Filter</div>
				<div class="card-body">
					<!-- Devices section -->
					<p class="card-text font-weight-bold">Devices</p>
					<div class="form-check">
						<label for="" class="form-check-label mr2"><input type="checkbox" class="form-check-input">Device 1</label><br>
						<label for="" class="form-check-label mr2"><input type="checkbox" class="form-check-input">Device 2</label><br>
						<label for="" class="form-check-label mr2"><input type="checkbox" class="form-check-input">Device 3</label><br>
					</div>
					<!-- Watts filter section -->
					<p class="card-text font-weight-bold mt-4">Watts</p>
					<div class="form-row">
						<div class="col"><input type="text" class="form-control" placeholder="min"></div>
						<div class="col"><input type="text" class="form-control" placeholder="max"></div>
					</div>
					<!-- Dates filter section -->
					<p class="card-text font-weight-bold mt-4">Watts</p>
					<div class="form-row">
						<div class='col-md-12'>
							<div class="form-group">
							<div class="input-group date" id="datetimepicker7" data-target-input="nearest">
									<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7"/>
									<div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>
						<div class='col-md-12'>
							<div class="form-group">
							<div class="input-group date" id="datetimepicker8" data-target-input="nearest">
									<input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker8"/>
									<div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-8 col-lg-9 col-xl-9" style="border:1px solid #333">
			<div id="chart-container">FusionCharts XT will load here!</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker7').datetimepicker();
        $('#datetimepicker8').datetimepicker({
            useCurrent: false
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