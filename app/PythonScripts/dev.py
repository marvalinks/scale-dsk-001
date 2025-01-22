import socket

def read_mipayload_scale(ip, port):
    try:
        # Connect to the scale
        with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
            s.connect((ip, port))
            print(f"Connected to scale at {ip}:{port}")
            
            # Request data (optional, depends on the scale protocol)
            command = b'\x00'  # Replace with the actual request command for MIPayload
            s.sendall(command)
            
            while True:
                # Receive and decode the data
                raw_data = s.recv(1024)  # Adjust buffer size if needed
                if not raw_data:
                    break

                # Decode MIPayload (assuming ASCII payload, modify for binary)
                data = raw_data.decode('utf-8').strip()
                print(f"Raw Data: {data}")

                # Parse the payload
                weight, unit, status = parse_mipayload(data)
                print(f"Weight: {weight} {unit}, Status: {status}")

    except Exception as e:
        print(f"Error: {e}")

def parse_mipayload(payload):
    """
    Parse the MIPayload string and extract weight, unit, and status.
    Adjust based on the actual MIPayload format.
    """
    try:
        # Example payload: "ST,GS, 12.345,kg"
        parts = payload.split(',')
        if len(parts) < 4:
            raise ValueError("Invalid payload format")

        status = parts[0]  # Example: "ST" (Stable)
        mode = parts[1]    # Example: "GS" (Gross weight)
        weight = float(parts[2].strip())  # Example: 12.345
        unit = parts[3].strip()           # Example: "kg"
        return weight, unit, status

    except Exception as e:
        print(f"Failed to parse payload: {e}")
        return None, None, None

# Example usage
read_mipayload_scale(ip="192.168.1.51", port=23)
