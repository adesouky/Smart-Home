#!/usr/bin/python
import RPi.GPIO as GPIO
import time
import urllib2

#GPIO SETUP
sound = 18

GPIO.setmode(GPIO.BCM)
GPIO.setup(sound, GPIO.IN)

def setOpenDoorFalse():
    urllib2.urlopen("http://38.88.74.88/homepage/set_openDoor_false.php").read()
    return

def callback(sound):
	t=0
	if GPIO.input(sound):
		print 'first knock detected'
		t=1
		
		time1 = time.time()
		
		while time.time()-time1<3:
			if GPIO.input(sound)
			print "too early for knock 2"
			return

		start = time.time()
		
		while time.time()-start < 3:
			if GPIO.input(sound):
				print 'knock 2 detected'
				t=2
				break
		
		if t!=2:
			return
		
		time2 = time.time()
		
		while time.time()-time2<3:
			if GPIO.input(sound)
			print "too early for knock 3"
			return
		
		start2 = time.time()
		t2=0
		while time.time()-start2 < 10:
			if GPIO.input(sound):
				print 'knock detected'
				t2 += 1
				time.sleep(1)
			if t2 >= 4:
				break
		if t+t2 >= 6:
			setOpenDoorFalse()			
			
GPIO.add_event_detect(sound, GPIO.BOTH, bouncetime=100)  # let us know when the pin goes HIGH or LOW
GPIO.add_event_callback(sound, callback)  # assign function to GPIO PIN, Run function on change

# infinite loop
while True:
        time.sleep(1)