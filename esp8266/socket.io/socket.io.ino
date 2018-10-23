/*
* Configure file
*/
#include "config.hpp"

/*
* Outputs pins 
*/
#define OUTPUT_1 5
//#define OUTPUT_2 6

/*
* Instance Wi-Fi object
*/
ESP8266WiFiMulti WiFiMulti;

/*
* Instance socket.io client object
*/
SocketIoClient webSocket; 

/*
* Instace new custom tv object
*/
Samsung* tv = new Samsung();

/*
* Event handler function. Called on every event triggered.
*/
void event(const char * payload, size_t length) { 
  // Parse JSON received
  const size_t bufferSize = JSON_ARRAY_SIZE(1) + JSON_OBJECT_SIZE(1) + JSON_OBJECT_SIZE(2) + 30;
  DynamicJsonBuffer jsonBuffer(bufferSize);
  const char* json = payload;
  JsonObject& root = jsonBuffer.parseObject(json);
  int data_id = root["data"]["id"]; 
  
  // Verify if message destiny is this module
  if(data_id == _ID){
    String data_type = root["data"]["type"];

    // Check message type (if it's a tv command or node command)
    if(data_type == "tv"){
      String data_value = root["data"]["value"];
      
      // Do stuff
      if (data_value == "power") tv->power();
    
      else if(data_value == "volume"){ 
          if(root["data"]["value_2"] == "1") tv->volume(true);
          else tv->volume(false);
      }
  
      else if (data_value == "up") tv->up();
      else if (data_value == "down") tv->down();
      else if (data_value == "right") tv->right();
      else if (data_value == "left") tv->left();
      else if (data_value == "select") tv->select();
      else if (data_value == "source") tv->source();
  
      else if(data_value == "channel"){ 
          if(root["data"]["value_2"] == "1") tv->channel(true);
          else tv->channel(false);
      }
      delayMicroseconds(50);
    }
    else if(data_type == "light"){
      digitalWrite(OUTPUT_1, !digitalRead(OUTPUT_1));
    }
  }

  // Discard message
  else{
    DEBUG.println("it's not for me...");
  }
  delay(1000);
  sendToServer();
}

/*
* Send the pins status to server
*/
void sendToServer(){
  String message = "{\"id\":";
  message.concat(_ID);
  message.concat(",\"status\":");
  message.concat(digitalRead(OUTPUT_1));
  message.concat("}");
  const char *message_complete = message.c_str();
  webSocket.emit("esp-channel", message_complete);
}

/*
* Pin interrupt handler
*/
void interrupt(){
  sendToServer();
}

/*
* SETUP
*/
void setup() {
    pinMode(OUTPUT_1, OUTPUT);
    digitalWrite(OUTPUT_1, LOW);

    // Pin to interrupt on CHANGE logic level 
    attachInterrupt(digitalPinToInterrupt(OUTPUT_1), interrupt, CHANGE);
    
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

    // Wi-Fi stuff
    WiFiMulti.addAP(SSID, PWD);
    while(WiFiMulti.run() != WL_CONNECTED) {
      delay(100);
    }

    // Websocket subscribe on channel
    webSocket.on("button-channel:App\\\\Events\\\\Button", event);
    // Connect to server
    webSocket.begin("192.168.0.109", 3000, "/socket.io/?transport=websocket");
}

/*
* LOOP
*/
void loop() {
    webSocket.loop();
}
