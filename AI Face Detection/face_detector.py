import cv2
from random import randrange


trained_face_data = cv2.CascadeClassifier(
    'trained_face_data.xml')


#img = cv2.imread('rdj.jpg')
webcam = cv2.VideoCapture(0)

while True:
    # Reading faces on cam
    successful_frame_read, frame = webcam.read()

    # Converting Image to Grey Color
    grayscaled_img = cv2.cvtColor(frame, cv2.COLOR_BGR2GRAY)

    # Detecting Face
    face_coordinates = trained_face_data.detectMultiScale(grayscaled_img)

    # Drawing rectangle on face
    for (x, y, w, h) in face_coordinates:
        cv2.rectangle(frame, (x, y), (x+w, y+h), (randrange(256),
                                                  randrange(256), randrange(256)), (5))

    cv2.imshow('Face Detector (press Q to Stop)', frame)
    cv2.waitKey(1)

    key = cv2.waitKey(1)

    if key == 81 or key == 113:
        print("Quiting....")
        break


webcam.release()
print("Exit Successfull")
