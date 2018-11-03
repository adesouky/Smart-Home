#!/usr/bin/python
import RPi.GPIO as GPIO
import time

#GPIO SETUP
sound = 18

GPIO.setmode(GPIO.BCM)
GPIO.setup(sound, GPIO.IN)

def callback(sound):
	t=0
	if GPIO.input(sound):
		print 'first knock detected'
		t=1
		time.sleep(2)
		start = time.time()
		
		while time.time()-start < 3:
			if GPIO.input(sound):
				print 'knock 2 detected'
				t=2
				break
		
		if t!=2:
			return

		time.sleep(2)
		
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
			print 'door unlocked'		
			
GPIO.add_event_detect(sound, GPIO.BOTH, bouncetime=100)  # let us know when the pin goes HIGH or LOW
GPIO.add_event_callback(sound, callback)  # assign function to GPIO PIN, Run function on change

# infinite loop
while True:
        time.sleep(1)