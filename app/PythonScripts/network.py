
def read_avery_scale_tcp(ip, port, command=None):
    try:
        # Connect to the scale over TCP
        with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
            s.connect((ip, port))
            # print(f"Connected to scale at {ip}:{port}")
            
            # Send request command if needed
            if command:
                s.sendall(command)

            while True:
                # Attempt to receive data
                raw_data = s.recv(1024).decode('utf-8').strip()
                if raw_data:
                    return raw_data
                else:
                    # print("No data received, waiting...")
                    return 0
                    
    except Exception as e:
        print(f"Error: {e}")

if __name__ == "__main__":
    import sys
    import socket
    host = sys.argv[1]
    port = sys.argv[2]
    print(read_avery_scale_tcp(
    ip=host, 
    port=int(port), 
    command=b'P\r\n'
    ))