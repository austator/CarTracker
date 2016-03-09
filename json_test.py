
import json
import time

data = []
with open ("highway-speeding-uncompressed.json") as file:
    for line in file:
        data.append(json.loads(line))

length = len(data)

def getFuelConsume():
    i=0
    totalConsumed = 0
    consumedArray=[]
    consumed = 0
    while i < length:
        if data[i].get("name")=="fuel_consumed_since_restart":
            if round(data[i].get("value"),2) >= consumed:
                consumed = round(data[i].get("value"),2)
            else:
                consumedArray.append(consumed)
                consumed = round(data[i].get("value"),2)
        i += 1
    for x in consumedArray:
        totalConsumed += x
    totalConsumed += consumed
    return round(totalConsumed,2) #liter

def getFuelCost():
    return (round(getFuelConsume()*13,2))#kr
def getCo2Emisions():
    return(round(getFuelConsume()*2.35,1)) #gram co2

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
    avgVehicleSpeed = round((sum/len(avgVehicleSpeedArray)),1)

    return avgVehicleSpeed #km/h


def getStartTime():
    startTime = time.strftime("%Y-%m-%d %H:%M:%S", time.localtime(int(data[0].get('timestamp'))))
    return startTime #Dato
def getEndTime():
    endTime = time.strftime("%Y-%m-%d %H:%M:%S", time.localtime(int(data[length-1].get('timestamp'))))
    return endTime #Dato
def getTripTime():
    tripTime = data[length-1].get('timestamp')-data[0].get('timestamp')
    return time.strftime("%H:%M:%S", time.gmtime(tripTime)) #Tidsbruk

if __name__ == "__main__":
    pass