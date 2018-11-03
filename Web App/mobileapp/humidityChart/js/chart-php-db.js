$(document).ready(function() {

	/**
	 * Call the data.php file to fetch the result from the DB table.
	 */
	$.ajax({
		url : "api/data.php", //connecting to data.php which prints all sensor info.
		type : "GET",
		success : function(data){ //if data has been aquired
			console.log(data);
			//Creating arrays to store it's corresponding values
			var sensorValue = {
				Humidity : [], 
			};

			var len = data.length;
			
			//Iterating over the data and storing it in the corresponding arrays 
			for (var i = 0; i < len; i++) {
					sensorValue.Humidity.push(data[i].humidity);
			}

			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : ["0s", "1s", "2s", "3s", "5s"],
				datasets : [
					{
						label : "Humidity (in units) ",
						data : sensorValue.Humidity ,
						backgroundColor : "#bc1142",
						borderColor : "grey",
						fill : false,
						lineTension : 0,
						pointRadius : 10
					},
	
				]
			};

			var options = {
				title : {
					display : true,
					position : "top",
					text : "Humidity",
					fontSize : 100,
					fontColor : "rgb(80,80,80)"
				},
				legend : {
					display : true,
					position : "bottom"

				}
			};
			Chart.defaults.global.defaultFontColor = 'black';
			
			var chart = new Chart( ctx, {
				type : "line",
				data : data,
				options : options
			} );

		},
		error : function(data) {
			console.log(data);
		}
	});

});