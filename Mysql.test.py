from __future__ import print_function
import datetime
import mysql.connector
import json_test as jsn

#Connect to database
db = mysql.connector.Connect(user='madssst_PU',password='12345678',host='mysql.stud.ntnu.no',database='madssst_PUDB')
print(db)

#Create cursor for db interaction
cursor = db.cursor()



#Insert values
add_avgSpeed = ("""INSERT INTO Trip
(StartTidspunkt, SluttTidspunkt, AvgVehicleSpeed,TripTime, Co2, FuelConsume,FuelCost)
VALUES (%s,%s,%s,%s,%s,%s,%s);""")

data_Trip = (jsn.getStartTime(),jsn.getEndTime(), jsn.getAvgSpeed(),jsn.getTripTime(),jsn.getCo2Emisions(),jsn.getFuelConsume(),jsn.getFuelCost())
#Execute SQL code for db interaction
cursor.execute(add_avgSpeed,data_Trip)

#Commit changes to database
db.commit()

#SQL code for showing useful stuff

SQL_showColums = ("SHOW COLUMNS FROM Trip")
SQL_showAllEntries = ("SELECT * FROM Trip")
cursor.execute(SQL_showAllEntries)
#cursor.execute(SQL_showColums)
for i in cursor:
    print(i)


#Close stuff
cursor.close()
db.close