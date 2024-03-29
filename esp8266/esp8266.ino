/*
   PROJECT EDDL - Evaluating Drivers Drowsiness Level

   CODE:
   Connect to a public network, wait for a HIGH pulse from DE10-nano on an interrupt pin and send it to a extern server
   The system will check if some data wasn't sent since last startup and try to resend

   ISSUES
   1. ESP12E error encountered: the board needs more than 100mA to use SPIFFS, otherwise the watchdog timer will reset it
   2. STACK was overflowing because of many functions calls
   3. WiFiClient wasnt works when called from interrupt function

   IDEAS:
   https://gist.github.com/dogrocker/f998dde4dbac923c47c1 (Webserver running on AP mode to set ssid and pass to STA mode)

*/
#include "ESP8266WiFi.h"
#include "eddl.h"

WiFiClient client;
IPAddress server(192,168,0,106);
const int http_port = 80;

unsigned long _initialTime;
unsigned long _baseMillis;

String json = "0";

void interrupt();

void setup() {
#ifdef ESP8266
  system_update_cpu_freq(160);
#endif
  Serial.begin(115200);

  WiFi.mode(WIFI_STA);
  WiFi.begin("Dougras","eusouodougrasvocenaoehodougras");
  while(WiFi.status() != WL_CONNECTED){
    delay(100);
    _DEBUG("*");
    
  }
  delay(1000);
  _DEBUG(WiFi.localIP());
  
  pinMode(inp, INPUT);
  attachInterrupt(digitalPinToInterrupt(inp), interrupt, RISING);
  _initialTime = _getNTP();
  _baseMillis = millis();
  SPIFFS.begin();
  //SPIFFS.format(); // To format internal file system
  _createLog();
  
  /*
   * Check if already exists offline data in SPIFFS and send to server
   * 
  if (_readLog().length() == 0); _sendToServer(_baseMillis, _initialTime);
  */
}

void interrupt() {
  _DEBUG("INTERRUPT");
  /*if (WiFi.status() == WL_CONNECTED)
    json = _sendToServer(_baseMillis, _initialTime);
  else {*/
    StaticJsonBuffer<500> jsonBuffer;
    JsonObject& root = jsonBuffer.createObject();
    //root["time"] = String(millis());
    root["mac"] = WiFi.macAddress();
    root["status"] = 0;
    root["erro"] = 0;
    root.printTo(json);
    _DEBUG(json);
    /*File rFile = SPIFFS.open("/log.dat","a+");
    if(!rFile){
      _DEBUG(F("Error! Failed to open file!"));
    } else {
      rFile.println(buf);
    }
    rFile.close();*/
  }

void loop() {

    if(json != "0"){
    if ( !client.connect(server, http_port) ){
      _DEBUG("Error to connect to server");
      return;
    }

    
    _DEBUG("Enviando...");
    
    String url = "GET /iot_server/input.php?data=" + json + " HTTP/1.1";
    client.println(url);
    client.println("Host: 192.168.0.106");
    client.println("Connection: close");
    client.println();
     
    /*
     * Print response from server
     * 
    while(client.available()){
      String line = client.readStringUntil('\r');
      _DEBUG(line);
    }
    */ 
       
    json = "0";
    //_readLog();
  }
}

/*
 * Functions to use public access points 
 * 
 void _connect(char* ssid) {
  //WiFi.mode(WIFI_STA);
  WiFi.begin(ssid);
  int time_init = millis();
  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    _DEBUG(".");
    if (millis() - time_init > 10000)return;
  }
  _DEBUG(WiFi.localIP());
}

void _scanWifi() {
  uint8_t n = WiFi.scanNetworks();
  for (uint8_t i = 0; i < n; i++) {
    if (WiFi.encryptionType(i) == ENC_TYPE_NONE) {
      char* buf;
      WiFi.SSID(i).toCharArray(buf, WiFi.SSID(i).length());
      _connect(buf);
    }
  }
}
*/

