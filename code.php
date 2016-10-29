int door = 13;

String inputString = "";

boolean stringComplete = false;

 

 

void setup() {                

  Serial.begin(9600);

  pinMode(door, OUTPUT);     

}

 

void loop() {

  // print the string when a newline arrives:

  if (stringComplete) {

    if(inputString == "open\n")

       doorOpen();

    inputString = "";

    stringComplete = false;

  }

}

 

void serialEvent() {

  while (Serial.available()) {

    // get the new byte:

    char inChar = (char)Serial.read(); 

    // add it to the inputString:

    inputString += inChar;

    // if the incoming character is a newline, set a flag

    // so the main loop can do something about it:

    if (inChar == '\n') {

      stringComplete = true;

    } 

  }

}

 

void doorOpen() {

  digitalWrite(door, HIGH);

  delay(750);

  digitalWrite(door, LOW);

}