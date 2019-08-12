function init(){
	console.log("Analytics scripts load");
}

function drawChart(data){
Highcharts.chart('chart-container', {
    plotOptions: {
      series: {
          animation: false
      }
  },
  chart: {
    type: 'area',
    zoomType: 'x'
  },

  title: {
    text: 'Area chart  negative values',
  },
  xAxis: {
    categories: data['dates'],
    reversed: true
  },
  credits: {
    enabled: false
  },
  series: data['series']
});
}

$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        $('#form').submit(function (e) {
            e.preventDefault(); //**** to prevent normal form submission and page reload

            $.ajax({
                type : 'GET',
                url : '/analytics/filter',
                data : $('#form').serialize(),
                success: function(result){
                    drawChart(result);
                    //$('#head').text(result.status);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //alert(xhr.status);
                    //alert(thrownError);
                }
            });
        });
    });