#include <IRremoteESP8266.h>
#include <IRsend.h>
#include "IR_SAMSUNG.hpp"


#define SamsungPower        0xE0E040BF  

class Samsung {
private:
  IRsend* irsend;
public:
	void power();
	void source();
	void up();
	void down();
	void right();
	void left();
	void select();
	void volume(bool flag);
	void channel(bool flag);
	Samsung();
};
