function init() {
	console.log("Script load");
}

function prepareData(deviceId){
	setInterval(function(){
		getValuesToChart(deviceId);
		getValuesToDevice(deviceId);
	},1000);

}

function getValuesToChart(deviceId)
{
	$.ajax({
		type: 'GET', //THIS NEEDS TO BE GET
		url: '/devices/get/measurements',
		data: {deviceId:deviceId},
		success: function (data) 
		{
			var dates = [];
	      	data['dates'].forEach(function(element){
	      		dates.push(element.created_at);
	      	});
	      	drawChart(dates,data);
		},
		error: function(data) 
		{ 
			console.log("Error de Json");
		}
		});

}

function getValuesToDevice(deviceId)
{
	$.ajax({
		type: 'GET', //THIS NEEDS TO BE GET
		url: '/devices/get/data',
		data: {deviceId:deviceId},
		success: function (data) 
		{
	      	setDeviceData(data);
		},
		error: function(data) 
		{ 
			console.log("Error de Json");
		}
		});

}

function setDeviceData(data){
	console.log("Real Time");
	document.getElementById('deviceName').innerHTML = data['deviceName'];
	document.getElementById('locationRoom').innerHTML = "Location: " + data['location'];
	document.getElementById('totalWatts').innerHTML = data['totalWatts'];
	document.getElementById('totalBill').innerHTML = data['bill'].toFixed(2);
}

function drawChart(dates,series){
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
    categories: dates,
    reversed: true
  },
  credits: {
    enabled: false
  },
  series: series['series']
});
}