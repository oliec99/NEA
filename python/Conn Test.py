import pymysql.cursors

#rfidIn = (input("Please scan your card/fob: "))

connection = pymysql.connect(host='localhost', user='root', passwd='', db='studiobookingsystem')

rfidIn = int(input("Please scan your card/fob: "))
print(rfidIn)

try:
  with connection.cursor() as cursor:
    sql = "SELECT user_rfid FROM users WHERE user_rfid='&s'"
    cursor.execute(sql, (rfidIn, ))
    result = cursor.fetchone()
    print(result)

finally:
  connection.close()
