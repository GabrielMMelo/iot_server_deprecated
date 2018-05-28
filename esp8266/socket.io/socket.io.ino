#include <Arduino.h>

#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>

#include <SocketIoClient.h>
#include <ArduinoJson.h>

#define DEBUG Serial

#define B1 5

ESP8266WiFiMulti WiFiMulti;
SocketIoClient webSocket; 

void event(const char * payload, size_t length) { 

  DEBUG.println(payload);
  digitalWrite(B1, !digitalRead(B1));
  
}

void setup() {
    pinMode(B1, OUTPUT);
    digitalWrite(B1, LOW);
    
    DEBUG.begin(115200);

    DEBUG.setDebugOutput(true);

    DEBUG.println();
    DEBUG.println();
    DEBUG.println();

      for(uint8_t t = 4; t > 0; t--) {
          DEBUG.printf("[SETUP] BOOT WAIT %d...\n", t);
          DEBUG.flush();
          delay(1000);
      }

    WiFiMulti.addAP("Dougras", "eusouodougrasvocenaoehodougras");

    while(WiFiMulti.run() != WL_CONNECTED) {
        delay(100);
    }

    webSocket.on("button-channel:App\\\\Events\\\\Button", event);
    webSocket.begin("192.168.0.109", 3000, "/socket.io/?transport=websocket");
}

void loop() {
    webSocket.loop();
}
