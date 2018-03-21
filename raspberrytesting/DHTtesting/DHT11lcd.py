#!/usr/bin/python
import sys
import Adafruit_DHT

from RPLCD import CharLCD

lcd = CharLCD(cols=16, rows=2, pin_rs=37, pin_e=35, pins_data=[33, 31, 29, 23])


while True:
    humidity, temperature = Adafruit_DHT.read_retry(11, 4)

    lcd.cursor_pos = (0, 0)
    lcd.write_string("Temp: %d C" % temperature)
    lcd.cursor_pos = (1, 0)
    lcd.write_string("Humidity: %d %%" % humidity)
    