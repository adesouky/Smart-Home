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


known_face_encodings = []
known_face_names = []
Emails =[]
Images= []
Persons = []



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

        video_capture = self.video


        # Grab a single frame of video
        success, frame = video_capture.read()

        ret, jpeg = cv2.imencode('.jpg', frame)
        return jpeg.tobytes()

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

        video_capture = self.video

        return_value, image = video_capture.read()


        filename ="static/images/" + Name + ".png"

        global Persons


        my_file = Path(filename)

        if not my_file.is_file():
          Persons.append(Person(Name, Email, filename))

        else:
             flag=0
             for person in Persons:
                 if person.Image == filename:
                    person.Name = Name
                    person.Email = Email
                    flag=1

             if flag == 0 :
                   Persons.append(Person(Name, Email, filename))




        cv2.imwrite(filename, image)


        unknown_image = face_recognition.load_image_file(filename)
        unknown_encoding = face_recognition.face_encodings(unknown_image)[0]

        global known_face_encodings
        global known_face_names

        encoding = [unknown_encoding]
        known_face_encodings.append(unknown_encoding)
        known_face_names.append(Name)
        Emails.append(Email)
        Images.append(filename)

        #
        # with open('known_face_encodings.txt', 'w') as outfile:
        #     json.dump(known_face_encodings, codecs.open("known_face_encodings.json", 'w', encoding='utf-8'), separators=(',', ':'), sort_keys=True,
        #               indent=4)  ### this saves the array in .json format

        #
        self.saveAsJson()
        #
        #
        # with open('Persons.txt', 'w') as outfile:
        #     json.dump(Persons.tolist(), outfile)


        print(known_face_names)
        #print(known_face_encodings)


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
        video_capture = self.video
        returnString = 'Unknown'
        face_locations = []
        face_encodings = []
        face_names = []



        # Grab a single frame of video
        return_value, image = video_capture.read()


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

            for person in Persons:

                if person.Name == returnString.upper():
                    returnString = person.Email

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


