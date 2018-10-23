#include "ir.hpp"

Samsung::Samsung(){
  // Set pin 4 to output IR
  this->irsend = new IRsend(4); 
  this->irsend->begin();
}

/*
* Power button
*/
void Samsung::power(){
  this->irsend->sendSAMSUNG(SamsungPower, SAMSUNG_BITS, 1);  // (hex value, 16 bits, no repeat)
}

/*
* Source button
*/
void Samsung::source(){
  this->irsend->sendSAMSUNG(SamsungSource, SAMSUNG_BITS, 1);
}

/*
* Select button
*/
void Samsung::select(){
  this->irsend->sendSAMSUNG(SamsungSelect, SAMSUNG_BITS, 1);
}

/*
* Left button
*/
void Samsung::left(){
  this->irsend->sendSAMSUNG(SamsungLeft, SAMSUNG_BITS, 1);
}

/*
* Right button
*/
void Samsung::right(){
  this->irsend->sendSAMSUNG(SamsungRight, SAMSUNG_BITS, 1);
}

/*
* Up button
*/
void Samsung::up(){
  this->irsend->sendSAMSUNG(SamsungUp, SAMSUNG_BITS, 1);
}

/*
* Down button
*/
void Samsung::down(){
  this->irsend->sendSAMSUNG(SamsungDown, SAMSUNG_BITS, 1);
}

/*
* Up/Down volume button
*/
void Samsung::volume(bool flag){
  if(flag)	
    this->irsend->sendSAMSUNG(SamsungUpVol, SAMSUNG_BITS, 1);
  else
  	this->irsend->sendSAMSUNG(SamsungDownVol, SAMSUNG_BITS, 1);
}

/*
* Up/Down channel button
*/
void Samsung::channel(bool flag){
  if(flag)	
    this->irsend->sendSAMSUNG(SamsungUpCh, SAMSUNG_BITS, 1);
  else
  	this->irsend->sendSAMSUNG(SamsungDownCh, SAMSUNG_BITS, 1);
}
