<h4 style="text-align: center;">BME280 — датчик атмосферного давления,<br> влажности и температуры</h4>
<p>Сегодня расскажу о датчике BME280 с помощью которого можно получить показания влажности, температуры, атмосферного давления и высоту (расчетную). Данный датчик прост, предварительно откалиброван и для подключения не требуется дополнительных компонентов.</p>
<h5 class="h5_content">Технические параметры</h5><br>
<div class="row">
	<ul class="col-8" style="margin-left: 50px;">
		<li>Напряжение питания: 3.3 В – 5 В</li>
		<li>Рабочий ток: 1 мA</li>
		<li>Диапазон измерения давления:  300 гПа – 1100 гПа (точность ±1.0 гПа)</li>
		<li>Диапазон измерения температуры: -40 °C до +85 °C (точность ±0.5 °C)</li>
		<li>Диапазон измерения влажности: 20 % до 80 % (точность ±3 %)</li>
		<li>Интерфейс: I2C</li>
		<li>Габариты: 12 мм х 10 мм</li>
	</ul>
	<img src="img/products/bme280/1.png" class="" style="float: right;">
</div>
<h5 class="h5_content">Общие сведения</h5>
<p>Рассмотрим модуль поближе, в правой части расположен датчик BME280 фирмы Bosch (это приемник таких датчиков, как BMP180, BMP085). Данный датчик измеряет влажность, температуру и давление с помощью данных показаний осуществляется расчет высоты, но эти показания не точные, подробно о датчике можно посмотреть в документации. На обратной стороне установлен стабилизатор напряжения LM6206 на 3.3 В и преобразователь уровней I2C, поэтому можно подключить модуль к микроконтроллерам с 3.3 В или 5 В логикой, не боясь.</p>
<h5 class="h5_content">Подключение к Arduino</h5>
<h6>Назначение контактов:</h6>
<ul>
	<li><strong>VCC, GND</strong> — питание модуля 3.3 В или 5 В</li>
	<li><strong>SCL</strong> — линия тактирования (Serial CLock)</li>
	<li><strong>SDA</strong> — линия данных (Serial Data)</li>
</ul>
<h6>Подключение:</h6>
<p>В данном примере используем датчик BME280 и плату Arduino UNO R3, все получение показание отправлять в «Мониторинг порта», принципе и все, осталось собрать схему по рисунку ниже. Для интерфейса I2C на плате arduino предусмотрено только два вывода A4 и A5, другие вывода не поддерживают I2C, так что учтите при проектирование.</p>
<img src="img/products/bme280/2.jpg" style="margin: 0 auto;">
<h6>Программа:</h6>
<p>Для датчика BME280 разработана библиотека <strong>«Adafruit BME280 Library»</strong> с помощью которой можно упростить работу с датчиком. Так же, для работы датчика необходима дополнительная библиотека <strong>«Adafruit Unified Sensor«</strong>. Скачать библиотеки можно через <strong>«Менеджер библиотек»</strong>> в среде разработки IDE Arduino.</p>
<p>
	<a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Показать/Скрыть код</a>
	<div class="collapse" id="collapseExample">
		<div class="card card-body"><pre><code>
#include "Wire.h"                                         // Подключаем библиотеку Wire                     
#include "Adafruit_Sensor.h"                              // Подключаем библиотеку Adafruit_Sensor 
#include "Adafruit_BME280.h"                              // Подключаем библиотеку Adafruit_BME280 

#define SEALEVELPRESSURE_HPA (1013.25)                    // Задаем высоту                 
Adafruit_BME280 bme;

void setup() {
  Serial.begin(9600);                                     // Открытие последовательного порта на скорости 9600  

  if (!bme.begin(0x76)) {                                 // Инициализация датчика BME280
    Serial.println("Could not find a valid BME280!");     // Печать сообщения об ошибки
    while (1);
  }
}

void loop() {
  Serial.print("Temperature = ");                         // Печать текста
  Serial.print(bme.readTemperature());                    // Печать температуры
  Serial.println("*C");                                   // Печать текста

  Serial.print("Pressure = ");                            // Печать текста       
  Serial.print(bme.readPressure() / 100.0F);              // Печать атмосферное давление
  Serial.println("hPa");                                  // Печать текста

  Serial.print("Approx. Altitude = ");                    // Печать текста
  Serial.print(bme.readAltitude(SEALEVELPRESSURE_HPA));   // Вычисление высоты
  Serial.println("m");                                    // Печать текста

  Serial.print("Humidity = ");                            // Печать текста
  Serial.print(bme.readHumidity());                       // Печать влажности
  Serial.println("%");                                    // Печать текста

  Serial.println();                                       // Новая строка
  delay(1000);                                            // Пауза 1 Скекунда
}
</code></pre>
		</div>
	</div>
</p>