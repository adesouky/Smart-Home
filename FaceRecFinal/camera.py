import cv2
import json
from Person import Person
import face_recognition
import os
import numpy as np
from pathlib import Path
import json
import codecs
import sys
import smtplib
from email.mime.text import MIMEText
from email.mime.base import MIMEBase
from email import encoders
from email.mime.multipart import MIMEMultipart
 




known_face_encodings = []
known_face_names = []
Emails =[]
Images= []
Persons = []

frame=0

flag=1


class VideoCamera(object):



    def __init__(self):
        # Using OpenCV to capture from device 0. If you have trouble capturing
        # from a webcam, comment the line below out and use a video file
        # instead.

        self.video = cv2.VideoCapture(0)
        # If you decide to use video.mp4, you must have this file in the folder
        # as the main.py.
        # self.video = cv2.VideoCapture('video.mp4')

    def __del__(self):
        self.video.release()

    def get_frame(self):
        global flag

        while not flag:
            continue

        flag=0
        global frame
        video_capture = self.video


        # Grab a single frame of video
        success, frame = video_capture.read()
        i=0
        while success == False:
            if i>10:
               break
            self.video.release()
            self.video = cv2.VideoCapture(0)
            success, frame = video_capture.read()
            success, frame = video_capture.read()
            success, frame = video_capture.read()
            success, frame = video_capture.read()
            i=i+1

        flag=1
        
        if not success==False:
            ret, jpeg = cv2.imencode('.jpg', frame)
            return jpeg.tobytes()
        else:
            return None

    def initializeArrays(self):
        global known_face_names
        global known_face_encodings
        global Emails
        global Images


        savedknown_face_encodings =[]


        if not os.path.exists('known_face_names.json'):
                open('known_face_names.json', 'w').close()
        else :
                with open('known_face_names.json') as json_data:
                    known_face_names = json.load(json_data)

        with open('Images.json') as json_data:
                Images = json.load(json_data)

        with open('Emails.json') as json_data:
                Emails = json.load(json_data)

        with open('known_face_encodings.json') as json_data:
                savedknown_face_encodings = json.load(json_data)

        known_face_encodings =[]
        for face_encoding in savedknown_face_encodings:
                myarray= np.asarray(face_encoding)
                known_face_encodings.append(myarray)





    def get_picture(self, Name, Email):
        newUser=True

        global flag
        while not flag:
            continue
            
        flag=0
        global frame

        image = frame
        flag=1


        filename ="static/images/" + Name + ".png"

        global Persons


        my_file = Path(filename)

        if not my_file.is_file():
          Persons.append(Person(Name, Email, filename))
          newUser=True

        else:
             flag=0
             for person in Persons:
                 if person.Image == filename:
                    person.Name = Name
                    person.Email = Email
                    flag=1
                    newUser=False

             if flag == 0 :
                   Persons.append(Person(Name, Email, filename))
                   newUser=True




        cv2.imwrite(filename, image)

        if newUser==True:
            
            unknown_image = face_recognition.load_image_file(filename)
            unknown_encoding = face_recognition.face_encodings(unknown_image)[0]

            global known_face_encodings
            global known_face_names

            encoding = [unknown_encoding]
            known_face_encodings.append(unknown_encoding)
            known_face_names.append(Name)
            Emails.append(Email)
            Images.append(filename)



        self.saveAsJson()


    def initializePersons(self):
        global known_face_names
        global Emails
        global Images
        global Persons
        i =0
        while i < len(known_face_names):
            Persons.append(Person(known_face_names[i], Emails[i], Images[i]))
            i=i+1



    def saveAsJson(self):
        global known_face_names
        global known_face_encodings
        global Emails
        global Images
        print("known face encodings is " + str(len(known_face_encodings)))
        savedknown_face_encodings = []
        for face_encoding in known_face_encodings:
            savedknown_face_encodings.append(face_encoding.tolist())
        print("saved is" + str(len(savedknown_face_encodings)))
        with open('known_face_encodings.json', 'w') as outfile:
            json.dump(savedknown_face_encodings, outfile)

        with open('known_face_names.json', 'w') as outfile:
            json.dump(known_face_names, outfile)

        with open('Emails.json', 'w') as outfile:
            json.dump(Emails, outfile)

        with open('Images.json', 'w') as outfile:
            json.dump(Images, outfile)


    def recognize(self):
        global Persons
        global Emails
        
        returnString = 'Unknown'
        face_locations = []
        face_encodings = []
        face_names = []


        global flag
        while not flag:
            continue
        
        flag=0
        global frame
        # Grab a single frame of video
        image = frame
        filename ="static/images/Unknown.jpg"
        cv2.imwrite(filename, image)
        flag=1

        
        # Resize frame of video to 1/4 size for faster face recognition processing
        small_frame = cv2.resize(image, (0, 0), fx=0.25, fy=0.25)

        # Convert the image from BGR color (which OpenCV uses) to RGB color (which face_recognition uses)
        rgb_small_frame = small_frame[:, :, ::-1]

        # Only process every other frame of video to save time

            # Find all the faces and face encodings in the current frame of video
        face_locations = face_recognition.face_locations(rgb_small_frame)
        face_encodings = face_recognition.face_encodings(rgb_small_frame, face_locations)


        face_names = []
        if not face_encodings:
            print("////////////////////////////"  + str(len(Emails)))
            if not len(Emails) ==0 :
                print("first email is " + Emails[0])
                self.sendEmail(Emails[0] , "Picture" , filename)
            returnString = "Unknown"

        else:
            for face_encoding in face_encodings:
                    # See if the face is a match for the known face(s)
                    matches = face_recognition.compare_faces(known_face_encodings, face_encoding, tolerance=0.50)
                    returnString = "Unknown"
                    


                    # If a match was found in known_face_encodings, just use the first one.
                    if True in matches:
                        first_match_index = matches.index(True)
                        name = known_face_names[first_match_index]
                        returnString = name

                    else:
                        print(len(Emails))
                        if not len(Emails) ==0 :
                            print("first email is " + Emails[0])
                            self.sendEmail(Emails[0] , "Picture" , filename)

            for person in Persons:

                if person.Name == returnString.upper():
                    returnString = person.Name


        os.remove(filename)
        return returnString

       



    def getEmail(self, name):
            for person in Persons:
                flag=0
                if name == person.Name:
                    return person.Email
                    flag=1;

            return 'not available'


    def getImage (self, name):
            for person in Persons:
                flag = 0
                if name == person.Name:
                    return person.Image
                    flag = 1;

            return 'not available'

    def deleteUser (self, name):
            Image = ''
            for person in Persons:
                if person.Name == name:
                    Image = person.Image
                    Persons.remove(person)

                    break;

            i = known_face_names.index(name)
            known_face_names.pop(i)
            print("before" + str(len(known_face_encodings)))
            known_face_encodings.pop(i)
            print("after" + str(len(known_face_encodings)))
            Emails.pop(i)
            Images.pop(i)
            os.remove(Image)

            self.saveAsJson()


    def sendEmail(self, toaddr,filename,filepath):
            fromaddr = "smart.home.inc.2018@gmail.com" 
         
            msg = MIMEMultipart()
         
            msg['From'] = fromaddr
            msg['To'] = toaddr
            msg['Subject'] = "UNAUTHORISED INDIVIDUAL DETECTED"
         
            body = "An unauthorised person tried to access your home. Check attachment for a picture." 
         
            msg.attach(MIMEText(body, 'plain'))
         
            attachment = open(filepath, "rb")
         
            part = MIMEBase('application', 'octet-stream')
            part.set_payload((attachment).read())
            encoders.encode_base64(part)
            part.add_header('Content-Disposition', "attachment; filename= %s" % filename)
         
            msg.attach(part)
         
            server = smtplib.SMTP('smtp.gmail.com', 587)
            server.starttls()
            server.login(fromaddr, "G3123456")
            text = msg.as_string()
            server.sendmail(fromaddr, toaddr, text)
            server.quit()


