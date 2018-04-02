#!/usr/bin/python
import RPi.GPIO as GPIO
import time

#GPIO SETUP
sound = 17
led = 27
GPIO.setmode(GPIO.BCM)
GPIO.setup(sound, GPIO.IN)
GPIO.setup(led,GPIO.OUT)
def callback(sound):
        if GPIO.input(sound):
                print "Sound Detected!"
        	GPIO.output(led,HIGH)
	else:
                print "Sound Detected!"
		GPIO.output(led,LOW)
GPIO.add_event_detect(sound, GPIO.BOTH, bouncetime=300)  # let us know when the pin goes HIGH or LOW
GPIO.add_event_callback(sound, callback)  # assign function to GPIO PIN, Run function on change

# infinite loop
while True:
        time.sleep(1)