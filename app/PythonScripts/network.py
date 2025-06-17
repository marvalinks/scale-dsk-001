
def read_avery_scale_tcp(ip, port, command=None):
    try:
        # Connect to the scale over TCP
        with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
            s.settimeout(5)
            s.connect((ip, port))
            # print(f"Connected to scale at {ip}:{port}")
            
            # Send request command if needed
            if command:
                s.sendall(command)

            while True:
                # Attempt to receive data
                raw_data = s.recv(1024).decode('utf-8').strip()
                if raw_data:
                    # weight_in_kg = parse_scale_payload(raw_data)
                    # return weight_in_kg
                    return raw_data
                    # return 30
            else:
                # print("No data received, waiting...")
                return 0
                    
    except Exception as e:
        print(f"Error: {e}")


def parse_scale_payload(payload):
    try:
        payload = payload.strip()

        if 'kg' in payload:
            weight = payload.split('kg')[0].strip()
            weight = ''.join(c for c in weight if c.isdigit() or c == '.')
            return float(weight)
        else:
            raise ValueError("Unit 'kg' not found in payload")
        
    except Exception as e:
        print(f"Error parsing payload: {e}")
        return None

if __name__ == "__main__":
    import sys
    import socket
    import time
    host = sys.argv[1]
    port = sys.argv[2]
    print(read_avery_scale_tcp(
    ip=host, 
    port=int(port), 
    command=b'P\r\n'
    ))