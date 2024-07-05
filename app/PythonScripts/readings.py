# add_numbers.py
def readings(comport):
    # list1 = [1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000]
    # return random.choice(list1)
    
    try:
        serialBout = serial.Serial()
        serialBout.port = "COM13"
        serialBout.baudrate = 9600
        serialBout.open()

        packet = serialBout.readline()
        wtt = packet.decode("utf").rstrip("\n")
        return wtt
    except:
        return 0

if __name__ == "__main__":
    import sys
    import serial
    import serial.tools.list_ports
    import sys
    import random
    args = sys.argv[1:]
    port = args
    print(readings(port))
