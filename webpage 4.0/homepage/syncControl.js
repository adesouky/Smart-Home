var globalWebsync = false;

getGPIOstats = function (){
	$.ajaxSetup({
		cache: false
	}); 

	$.ajax({
		url:'button_stat_get.php',
		success: function (data){
			var obj = JSON.parse(data);
			for(x in obj){

				if(obj[x] === "on"){
					$( "#"+x).prop('checked', true);
				}else{
					$( "#"+x).prop('checked', false);
				}

			}
		}
	});
}

$(function() {
	$("#send_pi2,#send_pi3,#send_pi4").click(function() {

		var values = $("#myform").serializeArray();
		values = values.concat(
			jQuery('#myform input[type=checkbox]:not(:checked)').map(
				function() {
					return {"name": this.name, "value": "off"}
				}).get()
			);
		console.log(values);
		$.ajax({
			url: 'log_form.php',
			type: 'POST',
			cache: false,
			dataType: 'text',
			data: values,
			success: function(response, textStatus, jqXHR) {
				console.log(response);
				document.getElementById("loaddiv").className = "loading style-2";
				globalWebsync = true;
				setwebsynctoTrue();
				setChangeFlagtoTrue();
				setPiDonetofalse();
				checkPiDone();
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert(textStatus, errorThrown);
			}

		});
	});
});

setPiDonetofalse = function(){
	$.ajax({
		url:"set_piCommand_false.php",
		cache: false,
		success:function(){
			console.log("Pi is done flag is set to false");	
		}
	});
};

setopenDoortofalse = function(){
	$.ajax({
		url:"set_openDoor_false.php",
		cache: false,
		success:function(){
			console.log("open Door flag is set to false");	
		}
	});
};

setopenDoortoTrue = function(){
	$.ajax({
		url:"set_openDoor_true.php",
		cache: false,
		success:function(){
			console.log("open Door flag is set to true");	
		}
	});
};

loadDoor = function(){
	var button = $('#door1');
	var spinner = '<span class="spinner"></span>';
	button.html(spinner);
	setopenDoortofalse();
	checkdoorDone();
}

setChangeFlagtoTrue = function(){
	$.ajax({
		url:"set_changeFlag_true.php",
		cache: false,
		success:function(){
			console.log("ChangeFlag is set to true");	
		}
	});
};


setwebsynctoTrue = function(){
	$.ajax({
		url:"set_websync_true.php",
		cache: false,
		success:function(){
			console.log("Web sync flag is set to true");	
		}
	});
};

setwebsynctoFalse = function(){
	$.ajax({
		url:"set_websync_false.php",
		cache: false,
		success:function(){
			console.log("Web sync flag is set to false");	
		}
	});
};


reloadCheck = function(){

	var pollReload = function(){
		$.ajax({
			url:"get_realoadStat_status.php",
			cache: false,
			type:'get',
			success: function(data){
				console.log("Pi reload ovverride: "+data);
				if(data =="true"){
					realoadProg(2000);
					getGPIOstats();
					setReloadtofalse();

				}
			}
		});
	};
	setInterval(function(){
		pollReload();

	},1000);
};

websyncCheck = function(){

	var pollReloadWeb = function(){
		$.ajax({
			url:"get_websync_status.php",
			cache: false,
			type:'get',
			success: function(data){
				console.log("Pi websync: "+data);
				if(data =="true" && !globalWebsync){
					document.getElementById("loaddiv").className = "loading style-2";
					checkPiDone();
					getGPIOstats();
					setwebsynctoFalse();

				}
			}
		});
	};
	setInterval(function(){
		pollReloadWeb();

	},1000);
};

setReloadtofalse = function(){
	$.ajax({
		url:"set_reloadStat_false.php",
		cache: false,
		success:function(){
			console.log("reloadStat flag is Reset");	
		}
	});
};

function realoadProg(time){
	document.getElementById("loaddiv").className = "loadingreload style-2";
	wait(time);
}
function wait(time) {
	setTimeout(function(){ document.getElementById("loaddiv").className = "";}, time);
}


checkPiDone = function(){

	var pollPi = function(){
		$.ajax({
			url:"get_piCommand_status.php",
			cache: false,
			type:'get',
			success: function(data){
				console.log( "is Pi done : " + data);
				if(data =="true"){
					document.getElementById("loaddiv").className = "";
					setwebsynctoFalse();
					globalWebsync = false;
					clearInterval(pollInterval);


				}
			}
		});
	};

	var pollInterval = setInterval(function(){
		pollPi();

	},1000);
};

//https://codepen.io/dpyudha/pen/qjLBjM?q=button%20load&order=popularity&depth=everything&show_forks=false
checkdoorDone = function(){

	var pollDoor = function(){
		$.ajax({
			url:"get_openDoor_status.php",
			cache: false,
			type:'get',
			success: function(data){
				console.log( "is openDoor done : " + data);
				if(data =="true"){
				var button = $('#door1');
				button.html("Force Open");
				clearInterval(pollInterval);
				}
			}
		});
	};

	var pollInterval = setInterval(function(){
		pollDoor();

	},1000);
};




