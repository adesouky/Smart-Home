import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)

GPIO.setup( ,GPIO.OUT)
GPIO.setup( ,GPIO.OUT)

WORDS = ["TURN", "BEDROOM" ,"LIVING ROOM", "LIGHTS", "OFF"]

def handle(text, mic, profile):

	if 'BEDROOM' in text:
		 GPIO.output( ,GPIO.LOW)		
    	
	elif 'LIVING ROOM' in text:
    		 GPIO.output( ,GPIO.LOW)
  	
	else:
    		mic.say("Room not recognised.")
	
	reloadButtonsOnPage()

def isValid(text):
    """
        Returns True if the input is related to turning lights on.
        Arguments:
        text -- user-input, typically transcribed speech
    """
	return bool(re.search(r'\bLIGHTS OFF\b', text, re.IGNORECASE))