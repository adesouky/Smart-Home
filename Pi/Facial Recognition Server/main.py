from flask import Flask, render_template, Response, request, session, abort, redirect, url_for, make_response
from camera import VideoCamera
import cv2
import os
import face_recognition
import re
from functools import wraps, update_wrapper
from datetime import datetime
import time
from gtts import gTTS
from tempfile import TemporaryFile
import pygame
import time
from time import gmtime, strftime
import urllib.request as urllib2

def checkOpenDoor():
    string = urllib2.urlopen("http://38.88.74.88/homepage/get_openDoor_status.php").read()
    output = string.decode('utf-8')
    return output


def addDoorData(accessStatus,name):
    if(accessStatus):
        st= "http://38.88.74.88/smartDoorTimeline/add_door_data.php?con=Access%20Granted%20:%20"+name+"&star="+strftime("%Y-%m-%dT%H:%M:%S", time.localtime(time.time()))
        print(st)
        html = urllib2.urlopen(st)
        return html.read()
    else:
        urllib2.urlopen("http://38.88.74.88/smartDoorTimeline/add_door_data.php?con=Access%20Denied&star="+strftime("%Y-%m-%dT%H:%M:%S", gmtime())).read()
        return




def setOpenDoorFalse():
    urllib2.urlopen("http://38.88.74.88/homepage/set_openDoor_false.php").read()
    return



def textToSpeech(text):
    tts = gTTS(text=text, lang='en')
    tts.save("file.mp3")
    pygame.mixer.init()
    pygame.mixer.music.load('file.mp3')
    pygame.mixer.music.play()
    while pygame.mixer.music.get_busy():
        continue

    pygame.mixer.music.stop()




app = Flask(__name__)

# GPIO.setmode(GPIO.BCM)

known_face_encodings = []
known_face_names = []
pastframe=0



@app.after_request
def add_header(r):
    """
    Add headers to both force latest IE rendering engine or Chrome Frame,
    and also to cache the rendered page for 10 minutes.
    """
    r.headers["Cache-Control"] = "no-cache, no-store, must-revalidate"
    r.headers["Pragma"] = "no-cache"
    r.headers["Expires"] = "0"
    r.headers['Cache-Control'] = 'public, max-age=0'
    return r

def nocache(view):
    @wraps(view)
    def no_cache(*args, **kwargs):
        response = make_response(view(*args, **kwargs))
        response.headers['Last-Modified'] = datetime.now()
        response.headers['Cache-Control'] = 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0'
        response.headers['Pragma'] = 'no-cache'
        response.headers['Expires'] = '-1'
        return response

    return update_wrapper(no_cache, view)

@app.route('/')
@nocache
def index():
   
    VideoCamera().initializeArrays()
    VideoCamera().initializePersons()

        # res = re.findall("Images/(\d+).png", hist)
        # if not res:
        #     continue
        # print(res[0])

    return render_template('index.html')


@app.route('/whitelist', methods=['GET', 'POST'])
@nocache
def whitelist():

    hists = os.listdir('static/images')
    hists = ['images/' + file for file in hists]
    print(hists)


    names = []
    for hist in hists:
        input_file = hist
        output_file = input_file[input_file.find("/") + 1:]
        name= output_file[:-4]
        names.append(name)

        # res = re.findall("Images/(\d+).png", hist)
        # if not res:
        #     continue
        # print(res[0])

    return render_template('whitelist.html', images= zip(hists, names), zip=zip)


def gen(camera):
    global pastframe
    while True:
        frame = camera.get_frame()
        if frame is None:
            frame=pastframe
        else:
            pastframe = frame
        yield (b'--frame\r\n'
               b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n\r\n')


@app.route('/video_feed')
@nocache
def video_feed():
    return Response(gen(VideoCamera()),
                    mimetype='multipart/x-mixed-replace; boundary=frame')


@app.route('/user', methods=['GET', 'POST'])
@nocache
def user():
    return render_template('newUser.html')


@app.route('/deleteuser', methods=['GET', 'POST'])
@nocache
def deleteuser():
    Name = session.get('Name', None)
    VideoCamera().deleteUser(Name)
    return redirect(url_for('index'))

@app.route('/userpage', methods=['GET', 'POST'])
@nocache
def userpage():
    if 'name' in request.form:
        Name = request.form['name']
        session['Name'] = Name.upper()
        Email = VideoCamera().getEmail(Name)
        Image = VideoCamera().getImage(Name)

        input_file = Image
        output_file = input_file[input_file.find("static/") + 7:]
        Image=output_file

   # name = request.form['name2']

    return render_template('userpage.html', Image=Image, Name=Name, Email= Email)

@app.route('/capture', methods=['POST'])
@nocache
def capture():
    Name = session.get('Name', None)
    Email = session.get('Email', None)
    VideoCamera().get_picture(Name, Email)
    return redirect(url_for('index'))


@app.route('/newuser', methods=['POST'])
@nocache
def newuser():
    print("IM HERE")
    Name = request.form['Name']
    session['Name'] = Name.upper()
    Email = request.form['Email']
    session['Email'] = Email.upper()
    return render_template('addUser.html')


@app.route('/openDoor', methods=['GET', 'POST'])
@nocache
def openDoor():
    Text = VideoCamera().recognize()
    if Text == "ERROR":
        textToSpeech("ERROR FOUND")
    elif Text != 'Unknown':
        setOpenDoorFalse()
        pygame.mixer.init()
        pygame.mixer.music.load('heart_and_soul.mp3')
        pygame.mixer.music.play()
        time.sleep(2)
        pygame.mixer.music.fadeout(3000)
        textToSpeech("Welcome Home" + Text)
        return redirect(url_for('index'))

    else:
        pygame.mixer.init()
        pygame.mixer.music.load('Chime.mp3')
        pygame.mixer.music.play()
        time.sleep(2)
        pygame.mixer.music.fadeout(3000)
        textToSpeech("Unauthorised user detected, waiting for authorisation")
        return redirect(url_for('index'))



if __name__ == '__main__':
    app.secret_key = 'super secret key'
    app.config['SESSION_TYPE'] = 'filesystem'
    app.run(host='0.0.0.0', debug=True, threaded=True)
    