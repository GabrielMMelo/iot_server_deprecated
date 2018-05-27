#include <Arduino.h>

#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>

#include <SocketIoClient.h>

#define USE_SERIAL Serial

ESP8266WiFiMulti WiFiMulti;
SocketIoClient webSocket;

void event(const char * payload, size_t length) {
  USE_SERIAL.printf("got message: %s\n", payload);
  USE_SERIAL.println("oi");
  
}

void setup() {
    USE_SERIAL.begin(115200);

    USE_SERIAL.setDebugOutput(true);

    USE_SERIAL.println();
    USE_SERIAL.println();
    USE_SERIAL.println();

      for(uint8_t t = 4; t > 0; t--) {
          USE_SERIAL.printf("[SETUP] BOOT WAIT %d...\n", t);
          USE_SERIAL.flush();
          delay(1000);
      }

    WiFiMulti.addAP("Dougras", "eusouodougrasvocenaoehodougras");

    while(WiFiMulti.run() != WL_CONNECTED) {
        delay(100);
    }

    webSocket.on("teste", event);
    webSocket.begin("192.168.0.109", 3000, "/socket.io/?transport=websocket");
    //webSocket.begin("192.168.0.109", 3000, "/socket.io/");
    //message
}

void loop() {
    webSocket.loop();
}
