import RPi.GPIO as GPIO
import time

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(16, GPIO.IN)         #Read output from PIR motion sensor

while True:
  i=GPIO.input(16)
  if i==0:                 #When output from motion sensor is LOW
    print ("NO")
    time.sleep(0.1)

  elif i==1:               #When output from motion sensor is HIGH
    print ("IN")

time.sleep(0.1)
