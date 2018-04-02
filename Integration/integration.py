import urllib2 
import time
import RPi.GPIO as GPIO
import sys
import Adafruit_DHT
import json

#LED declaration
GPIO.setmode(GPIO.BCM)
# NOTE : Change pins accordingly
GPIO.setup(5,GPIO.OUT) # for cb1 
GPIO.setup(6,GPIO.OUT) # for cb5
GPIO.setup(13,GPIO.OUT) # for cb9
GPIO.setup(19,GPIO.OUT) # for cb13

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

# Main Function
def main():
    
    while True:

        if changeOccurred() == "true": #Assuming changeOccured() returns string "1" if true
            
            #Get status of buttons as JSON Object 
            buttonsStatus = json.loads(getButtonStats())

            #Turns corresponding task of buttons; Only using 4 buttons from each
            #for demsonstation
            if buttonsStatus['cb1'] == "on": #Temperature : Living Room
                GPIO.output(5,GPIO.HIGH)
            else:
                GPIO.output(5,GPIO.LOW)
            
            if buttonsStatus['cb5'] == "on": #Lighting : Living Room
                GPIO.output(6,GPIO.HIGH)
            else:
                GPIO.output(6,GPIO.LOW)
            
            if buttonsStatus['cb9'] == "on": #Humidity :Living Room
                GPIO.output(13,GPIO.HIGH)
            else:
                GPIO.output(13,GPIO.LOW)
            
            if buttonsStatus['cb11'] == "on": #Front Door : Door 1 
                GPIO.output(19,GPIO.HIGH)
            else:
                GPIO.output(19,GPIO.LOW)

            #Reading Temperature and Humidity 
            humidity, temperature = Adafruit_DHT.read_retry(11, 24)
            pressure = 47
            # Sending Sensor Data to webpage 
            #NOTE: pressure sensor not yet reading, hence sending empty variable 
            addSensorData(temperature,humidity,pressure)
            
            piDone()
        

#Calling main
main()
            






