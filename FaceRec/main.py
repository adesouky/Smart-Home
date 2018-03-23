from flask import Flask, render_template, Response, request, session
from camera import VideoCamera
import cv2
import face_recognition

app = Flask(__name__)

known_face_encodings = []
known_face_names = []


@app.route('/')
def index():
    return render_template('index.html')


def gen(camera):
    while True:
        frame = camera.get_frame()
        yield (b'--frame\r\n'
               b'Content-Type: image/jpeg\r\n\r\n' + frame + b'\r\n\r\n')


@app.route('/video_feed')
def video_feed():
    return Response(gen(VideoCamera()),
                    mimetype='multipart/x-mixed-replace; boundary=frame')


@app.route('/user', methods=['GET', 'POST'])
def user():
    return render_template('newUser.html')


@app.route('/capture', methods=['POST'])
def capture():
    Name = session.get('Name', None)
    VideoCamera().get_picture(Name)
    return render_template('index.html')



@app.route('/newuser', methods=['POST'])
def newuser():
    print("IM HERE")
    text = request.form['Name']
    session['Name'] = text.upper()
    return render_template('addUser.html')


@app.route('/openDoor', methods=['GET', 'POST'])
def openDoor():
    Text = VideoCamera().recognize()
    if Text != 'UNRECOGNIZED':
        return "WELCOME HOME " + Text

    else:
        return "Step Away From Door"


if __name__ == '__main__':
    app.secret_key = 'super secret key'
    app.config['SESSION_TYPE'] = 'filesystem'
    app.run(host='0.0.0.0', debug=True, threaded=True)