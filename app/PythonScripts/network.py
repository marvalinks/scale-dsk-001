
def read_from_network_scale(host, port):
    try:
        # Connect to the scale
        with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
            s.connect((host, port))
            # print(f"Connected to scale at {host}:{port}")
            
            while True:
                data = s.recv(1024).decode('utf-8').strip()
                if data:
                    # print(f"Weight: {data}")
                    return data
    except Exception as e:
        # print(f"Error: {e}")
        return 0

# read_from_network_scale(host='192.168.1.100', port=12345)  # Replace with your scale's IP/Port

if __name__ == "__main__":
    import sys
    import socket
    host = sys.argv[1]
    port = sys.argv[2]
    print(read_from_network_scale(host, port))