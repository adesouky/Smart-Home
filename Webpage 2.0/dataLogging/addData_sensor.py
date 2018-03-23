import urllib2
test = urllib2.urlopen("http://38.88.74.88/dataLogging/add_sensor_readings.php?temp="+"10"+"&hum="+"11"+"&pr="+"112").read()
print test