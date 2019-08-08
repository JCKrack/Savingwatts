@extends('layouts.app')
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
					<p class="card-text font-weight-bold mt-4">Date</p>
					<div class="form-row">
						<div class="col-md-12">
							<div class="form-group">
								<div class="input-group date" data-provide="datepicker" id="datetimepicker6">
									<input type="text" class="form-control">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-calendar"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<div class="input-group date" id="datetimepicker7"><input type="text" class="form-control"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span></div>
							</div>
						</div>
					</div>
						
					

					<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker();
        $('#datetimepicker7').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-8 col-lg-9 col-xl-9" style="border:1px solid #333">
			s
		</div>
	</div>
</div>
@endsection