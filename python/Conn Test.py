import pymysql.cursors
import time
import datetime

currentDate = '%Y-%m-%d'
stime = time.localtime()
ftime = time.strftime(currentDate, stime)
print(ftime)

currentTime = '%H:%M:%S'
stime2 = time.localtime()
gtime = time.strftime(currentTime, stime2)
print(gtime)
