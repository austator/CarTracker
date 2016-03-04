
import json
import time

data = []
with open ("driving.json") as file:
    for line in file:
        data.append(json.loads(line))

length = len(data) -1


def getAvgSpeed():
    i=0
    avgVehicleSpeedArray = []
    while i < length:
        if data[i].get("name")=="vehicle_speed":
            avgVehicleSpeedArray.append(data[i].get("value"))
        i+=1
    sum = 0
    for x in avgVehicleSpeedArray:
        sum += x
    avgVehicleSpeed = round((sum/len(avgVehicleSpeedArray)),2)

    return avgVehicleSpeed

if __name__ == "__main__":

    time = data[length].get("timestamp")- data[0].get("timestamp")
    print "seconds: " + str(time)
    print(getAvgSpeed())
