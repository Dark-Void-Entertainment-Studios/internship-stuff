#include <Servo.h>

Servo arm1;
Servo arm2;
Servo arm3;
Servo arm4;
Servo arm5;
Servo arm6;

int pos1 = 75;
int pos2 = 90;
int pos3 = 90;
int pos4 = 90;
int pos5 = 90;
int pos6 = 90;

const int X_pin1 = A0;
const int Y_pin1 = A1;
const int X_pin2 = A2;
const int Y_pin2 = A3;
const int X_pin3 = A4;
const int Y_pin3 = A5;

void setup() {
  Serial.begin(9600);
  pinMode(9, OUTPUT);
  pinMode(8, OUTPUT);
  pinMode(7, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(5, OUTPUT);
  pinMode(4, OUTPUT);
  arm1.attach(9);
  arm2.attach(8);
  arm3.attach(7);
  arm4.attach(6);
  arm5.attach(5);
  arm6.attach(4);
  
}

void loop() {
  // arm 1
  if ((analogRead(X_pin1)) > 1000){
    pos1 = pos1 - 7;
    arm1.write(pos1);
    delay(35);
}
  if ((pos1) <= 0){
     pos1 = pos1 + 7;
}

  if ((analogRead(X_pin1)) < 300){
    pos1 = pos1 + 7;
    arm1.write(pos1);
    delay(35);
}

  if ((pos1) >= 180){
    pos1 = pos1 - 7;
}
    // end arm 1
    // arm2
  if ((analogRead(Y_pin1)) > 1000){
    pos2 = pos2 - 7;
    arm2.write(pos2);
    delay(40);
}  
  if ((pos2) <= 10){
     pos2 = pos2 + 7;
}
  
  if ((analogRead(Y_pin1)) < 300){
    pos2 = pos2 + 7;
    arm2.write(pos2);
    delay(40);
}
  if ((pos2) >= 150){
    pos2 = pos2 - 7
    ;
}
  // end arm 2
  //arm 3
  if ((analogRead(X_pin2)) > 1000){
    pos3 = pos3 - 10;
    arm3.write(pos3);
    delay(40);
}
  if ((pos3) <= 0){
     pos3 = pos3 + 10;
}

  if ((analogRead(X_pin2)) < 300){
    pos3 = pos3 + 10;
    arm3.write(pos3);
    delay(40);
}

  if ((pos3) >= 180){
    pos3 = pos3 - 10;
}
  // end arm 3
  // arm 4
  if ((analogRead(Y_pin2)) > 1000){
    pos4 = pos4 - 10;
    arm4.write(pos4);
    delay(40);
}
  if ((pos4) <= 0){
     pos4 = pos4 + 10;
}

  if ((analogRead(Y_pin2)) < 300){
    pos4 = pos4 + 10;
    arm4.write(pos4);
    delay(40);
}

  if ((pos4) >= 180){
    pos4 = pos4 - 10;
}
  // end arm 4
  // arm 5
  if ((analogRead(X_pin3)) > 1000){
    pos5 = pos5 - 10;
    arm5.write(pos5);
    delay(40);
}
  if ((pos5) <= 0){
     pos5 = pos5 + 10;
}

  if ((analogRead(X_pin3)) < 300){
    pos5 = pos5 + 10;
    arm5.write(pos5);
    delay(40);
}

  if ((pos5) >= 180){
    pos5 = pos5 - 10;
}
  // end arm 5
  // arm 6
  if ((analogRead(Y_pin3)) > 1000){
    pos6 = pos6 - 10;
    arm6.write(pos6);
    delay(40);
}
  if ((pos6) <= 0){
     pos6 = pos6 + 10;
}

  if ((analogRead(Y_pin3)) < 300){
    pos6 = pos6 + 10;
    arm6.write(pos6);
    delay(40);
}

  if ((pos6) >= 180){
    pos6 = pos6 - 10;
}
  // end arm 6
}
