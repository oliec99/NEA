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

connection = pymysql.connect(host='localhost', user='root', passwd='', db='studiobookingsystem')

rfidIn = str(input("Please scan your card/fob: "))


try:
  with connection.cursor() as cursor:
    sql = "SELECT user_uid FROM users WHERE user_rfid = &s";
    cursor.execute(sql, (rfidIn, ))
    result = cursor.fetchall()
    print(result)

finally:
  connection.close()
