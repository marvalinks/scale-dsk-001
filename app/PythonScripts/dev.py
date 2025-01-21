# add_numbers.py
def readings(comport):
    list1 = [4.6, 10, 7.2, 18.8, 15, 2.6, 14.7, 8.0, 12.5]
    return random.choice(list1)



if __name__ == "__main__":
    import sys
    import serial
    import serial.tools.list_ports
    import sys
    import random
    args = sys.argv[1]
    port = args
    print(readings(port))
