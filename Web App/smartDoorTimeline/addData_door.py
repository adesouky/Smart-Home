import urllib2
test = urllib2.urlopen("http://38.88.74.88/smartDoorTimeline/add_door_data.php?con="+"10"+"&star="+"11").read()
print test