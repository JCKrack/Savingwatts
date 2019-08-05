function init(){
	console.log("Load Script");
	getValuesToChart();
  getDataIndex();
}

function getDataIndex()
{
  $.ajax({
    type: 'GET', //THIS NEEDS TO BE GET
    url: '/get/dataindex',
    success: function (data) 
    {
      console.log(data);
      updateIndexValues(data);
    },
    error: function(data) 
    { 
      console.log("Error de Json");
    }
    });

}




function getValuesToChart()
{
	$.ajax({
		type: 'GET', //THIS NEEDS TO BE GET
		url: '/get/measurements',
		success: function (data) 
		{
			console.log(data);
      var seriesData = [];
      var i = 0;
        while(i < 3){
          seriesData.push({
          name:data[0][i][0],
          data:[data[1][i]]
          });
          i++;
        }
      console.log(seriesData);
			drawChart(data[2],seriesData);
		},
		error: function(data) 
		{ 
			console.log("Error de Json");
		}
		});

}

function drawChart(xSerie,mySeries){
Highcharts.chart('chart-container', {
  chart: {
    type: 'area'
  },
  title: {
    text: 'Area chart with negative values'
  },
  xAxis: {
    categories: xSerie
  },
  credits: {
    enabled: false
  },
  series: [[{
      name: 'John',
      data: [5, 3, 4, 7]
    }, {
      name: 'Jane',
      data: [2, -2, -3, 2]
    }, {
      name: 'Joe',
      data: [3, 4, 4, -2]
    }]]
});
}

function updateIndexValues(indexValues)
{
  console.log("IndexValueUpdate");
  document.getElementById('totalWatts').innerHTML = indexValues[0];
  document.getElementById('bill').innerHTML = indexValues[1].toFixed(2);
  document.getElementById('devicesHigh').innerHTML = "";
  indexValues[2].forEach(function(element){
    document.getElementById('devicesHigh').innerHTML += "<li>" + element.device_uuid + "</li>";
  });
  document.getElementById('devicesLow').innerHTML = "";
  indexValues[3].forEach(function(element){
    document.getElementById('devicesLow').innerHTML += "<li>" + element.device_uuid + "</li>";
  });
  document.getElementById('wattsDay').innerHTML = indexValues[4]
  document.getElementById('wattsNight').innerHTML = indexValues[5]
  document.getElementById('wattsPerWeek').innerHTML = indexValues[6]
  document.getElementById('wattsPerWeekEnd').innerHTML = indexValues[7]
}