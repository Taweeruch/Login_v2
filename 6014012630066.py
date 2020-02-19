import cv2
import sys
import requests
faceCascade = cv2.CascadeClassifier(cv2.data.haarcascades + "haarcascade_frontalface_default.xml")

def create_dataset(img,id,img_id):
        cv2.imwrite("data1/pic."+str(id)+"."+str(img_id)+".jpg",img)
        

def draw_boundary(img,classifier,scaleFactor,minNeighbors,color,clf):
        gray=cv2.cvtColor(img,cv2.COLOR_BGR2GRAY)
        features=classifier.detectMultiScale(gray,scaleFactor,minNeighbors)
        coords=[]
        for (x,y,w,h) in features:
                                      
                cv2.rectangle(img,(x,y),(x+w,y+h),color,2)
                id,_= clf.predict(gray[y:y+h,x:x+w])
                if id==1:
                    if _ <= 45 :
                        cv2.putText(img,"vee",(x,y-4),cv2.FONT_HERSHEY_SIMPLEX,0.8,color,2)
                        url = 'https://notify-api.line.me/api/notify'
                        token = 'fH2W6N2Jd1FSWUA3jLyanh9VVyi1z17YTsv7qsrWwfK'
                        headers = {'content-type':'application/x-www-form-urlencoded','Authorization':'Bearer '+token}
                        msg = 'พบผู้ต้องสงสัย ณ ช่องตรวจคนเข้าเมือง กรุณาตรวจสอบ'
                        r = requests.post(url, headers=headers , data = {'message':msg})
                        print (r)
                        quit()
                                
                        
                    else :
                        cv2.putText(img,"unknow",(x,y-4),cv2.FONT_HERSHEY_SIMPLEX,0.8,color,2)

                    if (_ < 45):
                        _ = " {0}%".format(round(100 - _))
                    else:
                        _ = " {0}%".format(round(100 - _))

                    print(str(_))
                
                        
                coords=[x,y,w,h]
        return img,coords
        
def detect(img,faceCascade,img_id,clf):
        img,coords=draw_boundary(img,faceCascade,1.1,10,(255,0,0),clf)
        if len(coords)==4 :
                #img(y:y+h,x:x+w)
                id=1
                result = img[coords[1]:coords[1]+coords[3],coords[0]:coords[0]+coords[2]]
                #create_dataset(result,id,img_id)
        return img

        

img_id=0        
cap = cv2.VideoCapture(0)

clf = cv2.face.LBPHFaceRecognizer_create()
clf.read("classifier1.xml")


while (True):
        ret,frame = cap.read()
        frame=detect(frame,faceCascade,img_id,clf)
        cv2.imshow('frame',frame)
        img_id+=1
        if(cv2.waitKey(1) & 0xFF== ord('q')):
            break
cap.release()
cv2.destroyAllWindows()

