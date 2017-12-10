import socket
import threading
import sys

f = open("/tmp/listen.out", 'w')
sys.stdout = f

BIND_IP = '0.0.0.0'
BIND_PORT = 80

def handle_client(client_socket):
    request = client_socket.recv(1024)
    print "[*] Received: " + request
    client_socket.send('ACK')
    client_socket.close()

def tcp_server():
    server = socket.socket( socket.AF_INET, socket.SOCK_STREAM)
    server.bind(( BIND_IP, BIND_PORT))
    server.listen(5)
    print"[*] Listening on %s:%d" % (BIND_IP, BIND_PORT)

    while 1:
        client, addr = server.accept()
        print "[*] Accepted connection from: %s:%d" %(addr[0], addr[1])
        client_handler = threading.Thread(target=handle_client, args=(client,))
        client_handler.start()

if __name__ == '__main__':
    tcp_server()

f.close()

# Script baseado no modelo proposto na página Black Hat Python
# http://bt3gl.github.io/black-hat-python-networking-the-socket-module.html
