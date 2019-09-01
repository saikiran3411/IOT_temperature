#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
const char* ssid = "IIT-SES-WIFI";
String MAC;
void setup() {
  Serial.begin(115200);
  Serial.setTimeout(5000);
  STA();
}

void loop() {
  if (WiFi.status() == WL_CONNECTED) {
    int temp = analogRead(A0);
    double degreesC = ((((temp / 1024.0) * 3.3)) * 100.0)-2;
    push(degreesC);
    ESP.deepSleep(10e6);
  } else {
    STA();
  }
}

void STA() {
  IPAddress staticIP(10, 10, 39, 76); //ESP static ip
  IPAddress gateway(10, 10, 36, 1);   //IP Address of your WiFi Router (Gateway)
  IPAddress subnet(255, 255, 252, 0);  //Subnet mask
  IPAddress dns(8, 8, 8, 8);  //DNS
  WiFi.config(staticIP, gateway, subnet, dns);
  WiFi.begin(ssid, NULL);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print("*");
  }
  Serial.println("");
  Serial.println("WiFi connection Successful");
  Serial.print("The IP Address of ESP8266 Module is: ");
  Serial.println(WiFi.localIP());
  MAC = WiFi.macAddress();
  Serial.println(MAC);
}
void push(double temp) {
  HTTPClient push;
  push.begin("http://www.strangerpro.com/web/temp.php");
  push.addHeader("Content-Type", "application/x-www-form-urlencoded");
  String tmp = String(temp);
  String post = "temperature=" + tmp + "&macID=" + MAC;
  int httpCode = push.POST(post);
  String payload = push.getString();
  Serial.println(httpCode);
  Serial.println(payload);
  push.end();
  delay(3000);
}
