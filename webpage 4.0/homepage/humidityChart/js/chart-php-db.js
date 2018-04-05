$(document).ready(function() {

	/**
	 * Call the data.php file to fetch the result from the DB table.
	 */
	$.ajax({
		url : "api/data.php", //connecting to data.php which prints all sensor info.
		type : "GET",
		success : function(data){ //if data has been aquired
			console.log(data);
			console.log("Fawaz");
			//Creating arrays to store it's corresponding values
			var sensorValue = {
				Humidity : [], 
				Time : [],
			};

			var len = data.length;
			var d = new Date();
            

			//Iterating over the data and storing it in the corresponding arrays 
			for (var i = 0; i < len; i++) {
				    
					 //Date from Database 
					var month = data[i].date.substr(0,2);
					var day = data[i].date.substr(3,2);
					var year = data[i].date.substr(6,4);
                    var hours = data[i].date.substr(11,2);
					var mins = data[i].date.substr(14,2);
					var sec = data[i].date.substr(17,2);
				
                    //Current date 
					var currMonth = d.getMonth() + 1;
					var currYear = d.getFullYear();
					var currHours = d.getHours();
					var currMins = d.getMinutes();

					console.log("Month: " + month);
					console.log("Day: " + day);
					console.log("Year: " + year);
					console.log("Hours: " + hours);
					console.log("Minutes: " + mins);
					console.log("Seconds: " + sec);

                    console.log("Current Month: " + currMonth);
					console.log("Current Year: " + currYear);
					console.log("Current Hours: " + currHours);
					console.log("Current Mins: " + currMins);
                    
                     
                    if(Number(month) == currMonth && Number(year) == currYear && Number(hours) == 9 && Number(mins) == 8){ 
						
						//Adding temperature value 
						console.log(data[i].humidity);
						sensorValue.Humidity.push(data[i].humidity);
						
						//Updating Time axis with seconds
						console.log(sec);
						sensorValue.Time.push(Number(sec) + "s");
					}
			}

			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : sensorValue.Time ,
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