from fastai.vision import *
import sys
filename = sys.argv[1]

#pass the filename as commandline argument#######################################

# from google.colab import drive
# drive.mount('/content/drive')


#folder = 'nike'
#file = '/content/url_nike.txt'


path = Path('I:\DEVLOPMENT\Finalproject')
dest = "I:\DEVLOPMENT\Finalproject" #set data path
# if data exist no need to run
#dest.mkdir(parents=True, exist_ok=True)#make dir in data path



#set image to classify
filename = 'I:\\Xam\\htdocs\\Finalproject\\uploads\\' + filename
img = open_image(filename)
img
#give image to model
learn = load_learner(path)
#pridict the image type  

pred_class,pred_idx,outputs = learn.predict(img)
pred_class
print(pred_class)
