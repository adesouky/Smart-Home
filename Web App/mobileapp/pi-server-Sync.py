import urllib2 
import time

"""
returns a string in json format containing button stats

"""
def getButtonStats():
	button_status = urllib2.urlopen("http://38.88.74.88/homepage/button_stat_get.php").read()
	return button_status


"""
temprature : temp reading
humidity : hum reading
pressure : pressure reading

"""
def addSensorData(temprature,humidity,pressure):
	urllib2.urlopen("http://38.88.74.88/dataLogging/add_sensor_readings.php?temp="+str(temprature)+"&hum="+str(humidity)+"&pr="+str(pressure)).read()
	time.sleep(1)
	return


"""
accessStats : true if granted , false if denied
name: name of subject (if false supply any name)
time format must be exactly : 2017-01-02T05:00:00

"""
def addDoorData(accessStatus,name,time):
	if(accessStatus):
		st= "http://38.88.74.88/smartDoorTimeline/add_door_data.php?con=Access%20Granted%20:%20"+name+"&star="+time
		urllib2.urlopen(st).read()
		time.sleep(1)
		return	
	else:
		urllib2.urlopen("http://38.88.74.88/smartDoorTimeline/add_door_data.php?con=Access%20Denied&star="+time).read()
		time.sleep(1)
		return

"""
Reloads Buttons Status on page , must be called whenever an I/O device changes buttons example pushbutton/sound sensor
"""
def reloadButtonsOnPage():
	urllib2.urlopen("http://38.88.74.88/homepage/set_reloadStat_true.php").read()
	return

"""
Once a change happens on website it locks , and keeps waiting until this function is called
"""
def piDone():
	urllib2.urlopen("http://38.88.74.88/homepage/set_piCommand_true.php").read()
	time.sleep(1)
	resetChangeFlag()
	return

"""
Checks change flag , which signifies that the user has changed website settings
"""
def changeOccurred():
	string = urllib2.urlopen("http://38.88.74.88/homepage/get_changeFlag_status.php").read()
	return string

"""
Helper function that resets change flag , used in piDone
"""
def resetChangeFlag():
	urllib2.urlopen("http://38.88.74.88/homepage/set_changeFlag_false.php").read()
	time.sleep(1)
	return
	
