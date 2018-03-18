$(document).ready(function() {

	/**
	 * Call the data.php file to fetch the result from the DB table.
	 */
	$.ajax({
		url : "http://localhost/phpMySQLChart/api/data.php", //connecting to data.php which prints all sensor info.
		type : "GET",
		success : function(data){ //if data has been aquired
			console.log(data);
			
			//Creating arrays to store it's corresponding values
			var sensorValue = {
				Temperature : [], 
				Pressure : []
			};

			var len = data.length;
			
			//Iterating over the data and storing it in the corresponding arrays 
			for (var i = 0; i < len; i++) {
				if (data[i].sensor == "Temperature") {
					sensorValue.Temperature.push(data[i].value);
				}
				else if (data[i].sensor == "Pressure") {
					sensorValue.Pressure.push(data[i].value);
				}
			}

			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : ["0s", "1s", "2s", "3s", "5s"],
				datasets : [
					{
						label : "Temperature (in degrees) ",
						data : sensorValue.Temperature,
						backgroundColor : "blue",
						borderColor : "lightblue",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					},
					{
						label : "Pressure (in Pascals)",
						data : sensorValue.Pressure,
						backgroundColor : "green",
						borderColor : "lightgreen",
						fill : false,
						lineTension : 0,
						pointRadius : 5
					}
				]
			};

			var options = {
				title : {
					display : true,
					position : "top",
					text : "Sensor Data Graph",
					fontSize : 18,
					fontColor : "#111"
				},
				legend : {
					display : true,
					position : "bottom"
				}
			};

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