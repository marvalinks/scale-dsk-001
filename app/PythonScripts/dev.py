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
                print(f"Sent command: {command}")

            while True:
                # Attempt to receive data
                raw_data = s.recv(1024).decode('utf-8').strip()
                if raw_data:
                    print(f"Raw Data: {raw_data}")
                    
                    # Parse the payload (customize for your scale)
                    weight, unit, status = parse_avery_payload(raw_data)
                    print(f"Weight: {weight} {unit}, Status: {status}")
                else:
                    print("No data received, waiting...")
                    
    except Exception as e:
        print(f"Error: {e}")

def parse_avery_payload(payload):
    """
    Parse the Avery Weigh-Tronix payload and extract weight, unit, and status.
    Modify this function to match your scale's protocol.
    """
    try:
        # Example payload: "ST,GS, 12.345,kg"
        parts = payload.split(',')
        if len(parts) < 3:
            raise ValueError("Invalid payload format")
        
        status = parts[0].strip()  # Example: "ST" (Stable)
        weight = float(parts[1].strip())  # Example: 12.345
        unit = parts[2].strip()  # Example: "kg"
        return weight, unit, status

    except Exception as e:
        print(f"Failed to parse payload: {e}")
        return None, None, None

# Example usage
read_avery_scale_tcp(
    ip='192.168.1.100', 
    port=5000, 
    command=b'P\r\n'  # Replace with your scale's request command (if needed)
)
