<h4 style="text-align: center;">Часы реального времени DS3231</h4>
<p>Модуль <strong>DS3231 (RTC)</strong> — представляет собой недорогую плату с чрезвычайно точными часами реального времени (RTC), с температурной компенсацией кварцевого генератора и кристалла. Модуль включает в себя литиевую батарею, которая поддерживает бесперебойную работу, даже при отключении источник питания. Интегрированный генератор улучшить точность устройства и позволил уменьшить количество компонентов.</p>
<h5 style="text-align: center;">Технические параметры</h5>
<div class="row">
	<ul class="col-8" style="margin-left: 50px;">
		<li>Напряжение питания: 3.3 В – 5 В</li>
		<li>Чип памяти: AT24C32 (32 Кб)</li>
		<li>Точность: ± 0.432 сек в день</li>
		<li>Частота кварца:32.768 кГц</li>
		<li>Поддерживаемый протокол: I2C</li>
		<li>Габариты: 38мм x 22мм x 15мм</li>
	</ul>
</div>
<h5 style="text-align: center;">Общие сведения</h5>
<p>Большинство микросхем, таких как DS1307 используют внешний кварцевый генератор частотой 32кГц, но в них есть существенный недостаток, при изменении температуры меняется частота кварца, что приводит к погрешности в подсчете времени. Эта проблема устранена в чипе DS3231, внутрь которого установили кварцевый генератор и датчик температуры, который компенсирует изменения температуры, так что время остается точным (при необходимости, данные температуры можно считать). Так же чип DS3231 поддерживает секунды, минуты, часы, день недели, дата, месяц и год информацию, а так же следит за количеством дней в месяце и делает поправку на високосный год. Поддерживает работу часов в двух форматов 24 и 12, а так-же возможно запрограммировать два будильника. Модуль работает по двух проводной шине I2C.</p>
<img src="img/products/ds3231/2.jpg" style="width: 30rem">
<p>Теперь немного о самом модуле, построен он на микросхеме DS3231N. Резисторная сборка RP1 (4.7 кОм), необходима для подтяжки линий 32K, SQW, SCL и SDA (кстати, если используется несколько модулей с шиной I2C, необходимо выпаять подтягивающие резисторы на других модулях). Вторая сборка резисторов, необходима для подтяжки линий A0, A1 и A2, необходимы они для смены адресации микросхемы памяти AT24C32N. Резистор R5 и диод D1, служат для подзарядки батарее, в принципе их можно выпаять, так как обычной батарейки SR2032 хватает на годы. Так же установлена микросхема памяти AT24C32N, это как бы бонус, для работы часов RTC DS3231N в ней нет необходимости. Резистор R1 и светодиод Power, сигнализируют о включении модуля. Как и говорилось, модуль работает по шине I2C, для удобства эти шины были выведены на два разъема J1 и J2, назначение остальных контактов, можно посмотреть ниже.</p>
<p><strong>Назначение J1</strong></p>
<ul>
	<li>32K: выход, частота 32 кГц</li>
	<li>SQW: выход</li>
	<li>SCL: линия тактирования (Serial CLock)</li>
	<li>SDA: линия данных (Serial Data)</li>
	<li>VCC: «+» питание модуля</li>
	<li>GND: «-» питание модуля</li>
</ul>
	<p><strong>Назначение J1</strong></p>
<ul>
	<li>SCL: линия тактирования (Serial CLock)</li>
	<li>SDA: линия данных (Serial Data)</li>
	<li>VCC: «+» питание модуля</li>
	<li>GND: «-» питание модуля</li>
</ul>
<br>
<p>Немного расскажу, о микросхеме AT24C32N, это микросхема с 32к памятью (EEPROM) от производителя Atmel, собранная в корпусе SOIC8, работающая по двухпроводной шине I2C. Адрес микросхемы 0x57, при необходимости легко меняется, с помощью перемычек A0, A1 и A2 (это позволяет увеличить количество подключенных микросхем AT24C32/64). Так как чип AT24C32N имеет, три адресных входа (A0, A1 и A2), которые могут находится в двух состояния, либо лог «1» или лог «0», микросхеме доступны восемь адресов. от 0x50 до 0x57.</p>
<h5 style="text-align: center;">Подключение DS3231 к Arduino</h5>
<p>В данном примере буду использовать только модуль DS3231 и Arduino UNO R3, все данные будут передаваться в «Мониторинг порта». Схема не сложная, необходимо всего четыре провода, сначала подключаем шину I2C, SCL в A4 (Arduino UNO) и SDA в A5 (Arduino UNO), осталось подключить питание GND к GND и VCC к 5V (можно записать и от 3.3В), схема собрана, теперь надо подготовить программную часть.</p>
<img src="img/products/ds3231/4.jpg" style="margin:25px 0;">
<p>Библиотеки работающий с DS3231 нет в среде разработке IDE Arduino, необходимо скачать «DS3231 » и добавить в среду разработки Arduino.</p>
<strong>Установка времени DS3231</strong>
<p>При первом включении необходимо запрограммировать время, откройте пример из библиотеки DS3231 «Файл» —> «Примеры» —> «DS3231» —> «Arduino» —> «DS3231_Serial_Easy», или скопируйте код снизу.</p>
<p>
	<a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Показать/Скрыть код</a>
	<div class="collapse" id="collapseExample">
		<div class="card card-body">
			<pre><code>
#include "DS3231.h"                    // Подключаем библиотеку Wire  
DS3231  rtc(SDA, SCL);                 // Инициализация DS3231
 
void setup() {
	Serial.begin(115200);                // Установка последовательного соединения
	rtc.begin();                         // Инициализировать rtc
  
// Установка времени
	rtc.setDOW(FRIDAY);                  //  Установить день-недели
	rtc.setTime(16, 29, 0);              //  Установить время 16:29:00 (формат 24 часа)
	rtc.setDate(31, 8, 2018);            //  Установить дату 31 августа 2018 года
}
void loop() {
	Serial.print(rtc.getDOWStr());       // Отправляем день-неделя
	Serial.print(" ");
	
	Serial.print(rtc.getDateStr());      // Отправляем дату
	Serial.print(" -- ");
 
	Serial.println(rtc.getTimeStr());    // Отправляем время
  
	delay (1000);                        // Задержка в одну секунду
}
			</code></pre>
		</div>
	</div>
</p>
