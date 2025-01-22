import socket

def read_avery_scale_tcp(ip, port, command=None):
    try:
        # Connect to the scale over TCP
        with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
            s.connect((ip, port))
            print(f"Connected to scale at {ip}:{port}")
            
            # Send request command if needed
            if command:
                s.sendall(command)

            while True:
                # Attempt to receive data
                raw_data = s.recv(1024).decode('utf-8').strip()
                if raw_data:
                    print(raw_data)
                    
                    # Parse the payload (customize for your scale)
                    # weight, unit, status = parse_avery_payload(raw_data)
                    # print(f"Weight: {weight} {unit}, Status: {status}")
                else:
                    print("No data received, waiting...")
                    
    except Exception as e:
        print(f"Error: {e}")

# Example usage
read_avery_scale_tcp(
    ip='192.168.1.51', 
    port=23, 
    command=b'P\r\n'  # Replace with your scale's request command (if needed)
)
