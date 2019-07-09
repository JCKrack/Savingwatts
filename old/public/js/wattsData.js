function wattsData(station){
	setInterval(function(){
		 $.ajax({
		    type: 'GET', //THIS NEEDS TO BE GET
		    url: '/get/wattsValue',
		    data: {station:station},

		    success: function (data) {
		        document.getElementById('maxVolt').innerHTML = data[0].valueMax;
	            document.getElementById('minVolt').innerHTML = data[0].valueMin;
	            document.getElementById('promVolt').innerHTML = data[0].valueProm.toFixed(1);
	            document.getElementById('totalVolt').innerHTML = (data[0].totalVolt.toFixed(1) / 1000).toFixed(1);
	            document.getElementById('uptime').innerHTML = (((data[0].totalVolt.toFixed(1) / 1000) * 0.617)/30).toFixed(1);

		        
		    },
		    error: function(data) { 
		         console.log(data);
		    }
		});




	},2000);

}