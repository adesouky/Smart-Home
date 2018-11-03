$(document).ready(function() {

	/**
	 * Call the data.php file to fetch the result from the DB table.
	 */
	$.ajax({
		url : "api/data.php", //connecting to data.php which prints all sensor info.
		type : "GET",
		success : function(data){ //if data has been aquired
			console.log(data);
			
            var len = data.length;

			for (var i = 0; i < len; i++) {
				 
				var month = data[i].date.substr(0,2);
			    var day = data[i].date.substr(3,2);
			    var year = data[i].date.substr(6,4);
                var hours = data[i].date.substr(11,2);
				var mins = data[i].date.substr(14,2);
				var sec = data[i].date.substr(17,2);

				console.log("Month: " + month);
				console.log("Day: " + day);
				console.log("Year: " + year);
				console.log("Hours: " + hours);
				console.log("Minutes: " + mins);
				console.log("Seconds: " + sec);

				data[i].y = data[i].temperature;
				delete data[i].temperature;

				data[i].x = data[i].date;
				delete data[i].date;

				data[i].x = year + "-" + month + "-" + day + "T" + hours + ":" + mins + ":" + sec ;

			}
             


			
           console.log(data);

			//Creating arrays to store it's corresponding values
			var sensorValue = {
				Temperature : [],
				Time : [], 
			};

			
			
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
					var currDay = d.getDate();

					console.log("Month: " + month);
					console.log("Day: " + day);
					console.log("Year: " + year);
					console.log("Hours: " + hours);
					console.log("Minutes: " + mins);
					console.log("Seconds: " + sec);

					console.log("Current Month: " + currMonth);
					console.log("Current Day: " + currDay);
				    console.log("Current Year: " + currYear);
					console.log("Current Hours: " + currHours);
					console.log("Current Mins: " + currMins);
					
					//NOTE change 19 to currMins and 6 to currHours
					var noMins = 10;
					var temp = 19 - noMins;
                    var temp1;
					var goingbehindhour = 0;

					if(temp < 0){
					  temp1 = 59 + temp;  
					  goingbehindhour = 1;       
                    }
					
					
					if(Number(month) == currMonth && Number(year) == currYear && Number(day) == 3 ){ //change 3 to currDay

					 // Number(hours) == currHours && Number(mins) == currMins)//change 9 and 8 to currHours and currMins 
						
						if((goingbehindhour == 1 && hours == 6 - 1 && mins>=temp1 && mins<=59) 
						
						|| (hours == 6 && mins>=temp && mins<=19 ) ){
						
					    	
						//Adding temperature value 
						console.log(data[i].temperature);
						sensorValue.Temperature.push(data[i].temperature);
						//Updating Time axis with seconds
						console.log(mins);
						sensorValue.Time.push(Number(mins) + "min");
						 

						}
					}
			}
			
			
			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels : sensorValue.Time,
				datasets : [
					{
						label : "Temperature (in Degrees) ",
						data : sensorValue.Temperature,
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
					text : "Temperature",
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