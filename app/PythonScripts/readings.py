# add_numbers.py
def readings(comport):
    list1 = [1000, 2000, 3000, 4000, 5000, 6000, 7000, 8000, 9000]
    return random.choice(list1)
    # return comport
    # return 400

if __name__ == "__main__":
    import sys
    import serial
    import serial.tools.list_ports
    import sys
    import random
    args = sys.argv[1:]
    port = args
    print(readings(port))
