#!/usr/bin/python
import RPi.GPIO as GPIO
import time

#GPIO SETUP
sound = 18

GPIO.setmode(GPIO.BCM)
GPIO.setup(sound, GPIO.IN)

def callback(sound):

	if GPIO.input(sound):
                start = time.time()
		print 'first knock detected'
		knocks = 0;
		while time.time()-start < 10:
			if GPIO.input(sound):
				knocks+=1;
				print 'knock detected'
		if knocks >= 1
			print 'door unlocked'
			
GPIO.add_event_detect(sound, GPIO.BOTH, bouncetime=300)  # let us know when the pin goes HIGH or LOW
GPIO.add_event_callback(sound, callback)  # assign function to GPIO PIN, Run function on change

# infinite loop
while True:
        time.sleep(1)