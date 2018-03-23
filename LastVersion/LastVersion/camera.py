import cv2
import face_recognition
import os
import numpy as np
from pathlib import Path
import json


known_face_encodings = []
known_face_names = []


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

    def get_picture(self, Name):
        video_capture = self.video

        return_value, image = video_capture.read()


        filename = Name + ".png"
        my_file = Path(filename)
        x=1

        if not my_file.is_file():
            cv2.imwrite(filename, image)

        else:
            while my_file.is_file():
                    x += 1
                    filename = Name + str(x) + ".png"
                    my_file = Path(filename)


            cv2.imwrite(filename, image)

        unknown_image = face_recognition.load_image_file(filename)
        unknown_encoding = face_recognition.face_encodings(unknown_image)[0]

        global known_face_encodings
        global known_face_names

        encoding = [unknown_encoding]
        known_face_encodings.append(unknown_encoding)
        known_face_names.append(Name)

        with open(" known_face_encodings", 'wb') as outfile:
            json.dump(known_face_encodings, outfile)

        with open(" known_face_names", 'wb') as outfile:
            json.dump(known_face_names, outfile)

        print(known_face_names)
        print(known_face_encodings)

    def recognize(self):

        video_capture = self.video
        returnString = ''
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
        for face_encoding in face_encodings:
                # See if the face is a match for the known face(s)
                matches = face_recognition.compare_faces(known_face_encodings, face_encoding, tolerance=0.50)
                returnString = "Unknown"

                # If a match was found in known_face_encodings, just use the first one.
                if True in matches:
                    first_match_index = matches.index(True)
                    name = known_face_names[first_match_index]
                    returnString = name

        return returnString

        # video_capture = self.video
        #     # Grab a single frame of video
        # success, frame = video_capture.read()
        #     # Resize frame of video to 1/4 size for faster face recognition processing
        # small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)
        #
        #     # Convert the image from BGR color (which OpenCV uses) to RGB color (which face_recognition uses)
        # rgb_small_frame = small_frame[:, :, ::-1]
        #
        #     # Only process every other frame of video to save time
        #
        #         # Find all the faces and face encodings in the current frame of video
        # face_locations = face_recognition.face_locations(rgb_small_frame)
        # face_encodings = face_recognition.face_encodings(rgb_small_frame, face_locations)
        #
        # global known_face_encodings
        # known_face_encodings = [
        #     face_encodings
        # ]
        #
        # ret, jpeg = cv2.imencode('.jpg', frame)
        # cv2.imwrite('newUser.jpg', jpeg)
        #
        # return jpeg.tobytes()

    # def get_picture(self):
    #
    #     video_capture = self.video
    #     anas_image = face_recognition.load_image_file("anas.jpg")
    #     anas_face_encoding = face_recognition.face_encodings(anas_image)[0]
    #
    #     known_face_encodings = [
    #         anas_face_encoding
    #     ]
    #
    #     known_face_names = [
    #         "Anas Desouky"
    #     ]
    #
    #     face_locations = []
    #     face_encodings = []
    #     face_names = []
    #     process_this_frame = True
    #
    #
    #         # Grab a single frame of video
    #     success, frame = video_capture.read()
    #
    #
    #         # Resize frame of video to 1/4 size for faster face recognition processing
    #     small_frame = cv2.resize(frame, (0, 0), fx=0.25, fy=0.25)
    #
    #         # Convert the image from BGR color (which OpenCV uses) to RGB color (which face_recognition uses)
    #     rgb_small_frame = small_frame[:, :, ::-1]
    #
    #         # Only process every other frame of video to save time
    #
    #             # Find all the faces and face encodings in the current frame of video
    #     face_locations = face_recognition.face_locations(rgb_small_frame)
    #     face_encodings = face_recognition.face_encodings(rgb_small_frame, face_locations)
    #
    #     face_names = []
    #     for face_encoding in face_encodings:
    #                 # See if the face is a match for the known face(s)
    #                 matches = face_recognition.compare_faces(known_face_encodings, face_encoding)
    #                 name = "Unknown"
    #
    #                 # If a match was found in known_face_encodings, just use the first one.
    #                 if True in matches:
    #                     first_match_index = matches.index(True)
    #                     name = known_face_names[first_match_index]
    #
    #                 face_names.append(name)
    #
    #
    #
    #         # Display the results
    #     for (top, right, bottom, left), name in zip(face_locations, face_names):
    #             # Scale back up face locations since the frame we detected in was scaled to 1/4 size
    #             top *= 4
    #             right *= 4
    #             bottom *= 4
    #             left *= 4
    #
    #             # Draw a box around the face
    #             cv2.rectangle(frame, (left, top), (right, bottom), (0, 0, 255), 2)
    #
    #             # Draw a label with a name below the face
    #             cv2.rectangle(frame, (left, bottom - 35), (right, bottom), (0, 0, 255), cv2.FILLED)
    #             font = cv2.FONT_HERSHEY_DUPLEX
    #             cv2.putText(frame, name, (left + 6, bottom - 6), font, 1.0, (255, 255, 255), 1)
    #
    #         # Display the resulting image
    #     # We are using Motion JPEG, but OpenCV defaults to capture raw images,
    #     # so we must encode it into JPEG in order to correctly display the
    #     # video stream.
    #     ret, jpeg = cv2.imencode('.jpg', frame)
    #     return jpeg.tobytes()
