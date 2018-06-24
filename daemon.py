import time
import RPi.GPIO as GPIO
import temp


GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)

try:
    with open('time.txt') as timer:
        timer_line = timer.readlines()
        timer_start = timer_line[0]
        (hs, ms) = timer_start.split(':')
        timer_start = int(hs) * 10000 + int(ms) * 100
        timer_koniec = timer_line[1]
        (hk, mk) = timer_koniec.split(':')
        timer_koniec = int(hk) * 10000 + int(mk) * 100
        timer_pin = int(timer_line[2])
        GPIO.setup(timer_pin,GPIO.OUT)
        timer_flag = GPIO.input(timer_pin)
        
except IOError:
    print "Nie mozna otworzy pliku z ustawieniami timera"
	
try:
    with open('cooling.txt') as cooling:
        cooling_line = cooling.readlines()
        cooling_temp = float(cooling_line[0])
        cooling_pin = int(cooling_line[1]) 
        GPIO.setup(cooling_pin,GPIO.OUT)
        cooling_flag = GPIO.input(cooling_pin)
        
except IOError:
    print "Nie mozna otworzy pliku z ustawieniami klimatyzacji"
	
try:
    with open('heating.txt') as heating:
        heating_line = heating.readlines()
        heating_temp = float(heating_line[0])
        heating_pin = int(heating_line[1])
        GPIO.setup(heating_pin,GPIO.OUT)
        heating_flag = GPIO.input(heating_pin)
        
except IOError:
    print "Nie mozna otworzy pliku z ustawieniami ogrzewania"

try:
    while True:
        czas = int(time.strftime('%H%M%S'))
        temperatura = float("{0:.1f}".format(temp.read_temp()))
        print czas
        
        try:
            cooling_temp
            if temperatura < cooling_temp and cooling_flag == 1:
                GPIO.output(cooling_pin,GPIO.LOW)
                cooling_flag = 0
                
            elif temperatura > cooling_temp and cooling_flag == 0:
                GPIO.output(cooling_pin,GPIO.HIGH)
                cooling_flag = 1
                
        except NameError:
            print 'brak ustawien klimatyzacji'
            
        try:
            if temperatura > heating_temp and heating_flag == 1:
                GPIO.output(heating_pin,GPIO.LOW)
                heating_flag = 0
            elif temperatura < heating_temp and heating_flag == 0:
                GPIO.output(heating_pin,GPIO.HIGH)
                heating_flag = 1
                
        except NameError:
            print 'brak ustawien ogrzewania'
            
        try:
            timer_start
            if timer_start > timer_koniec:
                if (czas > timer_start or czas < timer_koniec) and timer_flag == 0:
                    GPIO.output(timer_pin,GPIO.HIGH)
                    timer_flag = 1
                    print 'on'
                if czas > timer_koniec and czas < timer_start and timer_flag == 1:
                    GPIO.output(timer_pin,GPIO.LOW)
                    timer_flag = 0
                    print 'off'
            elif timer_start < timer_koniec:
                if czas > timer_start and czas < timer_koniec and timer_flag == 0:
                    GPIO.output(timer_pin,GPIO.HIGH)
                    timer_flag = 1
                    print 'on'
                if (czas > timer_koniec or czas < timer_start) and timer_flag == 1 :
                    GPIO.output(timer_pin,GPIO.LOW)
                    timer_flag = 0   
                    print 'off'
                
        except NameError:
            print 'brak ustawien timera'
            
        time.sleep(10)
except KeyboardInterrupt:
    pass
GPIO.cleanup()

