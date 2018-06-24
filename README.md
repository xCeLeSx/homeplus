# HomePlus
Technika Komputerowa - Projekt

Aplikacja internetowa do sterowania ogrzewaniem i oświetleniem w mieszkaniu

## Specyfikacja
* Układ – Raspberry PI Zero WH,
* Karta MicroSD z systemem Raspbian,
* Serwer WWW, PHP – Lighttpd,
* Technologie użyte po stronie webowej – HTML, CSS3, PHP, JavaScript 
(z wykorzystaniem biblioteki jQuery, Ajax),
* Obsługa kontrolera zaprogramowana w języku Python 
(z wykorzystaniem biblioteki GPIO),
* Cyfrowy czujnik temperatury - DS18B20,
* Trzy diody LED, czerwona, niebieska i żółta,
* Trzy rezystory 1k Ω, jeden rezystor 4.7k Ω,
* Przewody połączeniowe żeńsko-męskie, płytka stykowa.

## Funkcjonalność i założenia
Głównym celem aplikacji jest symulowanie sterowania trzema modułami:
* Oświetlenia – poglądowo dioda żółta,
* Klimatyzacji – poglądowo dioda niebieska, 
* Ogrzewania – poglądowo dioda czerwona.
Aplikacja webowa korzysta z systemu logowania (domyślnie login: admin, hasło: test) w celu zabezpieczenia przed niepożądanym dostępem. W przypadku błędnego logowania wyświetla się komunikat. Po pomyślnym zalogowaniu możemy zobaczyć panel główny aplikacji zawierający podgląd na następujące elementy oraz funkcje:
* Bieżący czas.
* Bieżącą temperaturę – pobraną z czujnika i wartość zapisaną w układzie, temperatura jest odświeżana automatycznie co 10 sek., możliwe jest również wymuszenie odświeżania manualnie przez kliknięcie na odczytaną temperaturę,
* Obecna data.
* Poszczególne moduły z możliwością manualnego włączenia i wyłączenia oraz: 
    * W przypadku oświetlenia można zdefiniować czas włączenia światła, 
    * Klimatyzacja uruchamia się powyżej zdefiniowanej temperatury (z przedziału od 10°C do 40°C),
    * Dla ogrzewania ustawiamy temperaturę, poniżej której ma włączyć się grzanie (ograniczony przedział temperatury do wyboru od -10°C do 20°C),
    * Po naciśnięciu „Zapisz”, otrzymujemy komunikat w celu potwierdzenia zmiany.
* Obsługę i dodawanie kolejnych modułów – w obecnej wersji aplikacji funkcjonalność wyłączona,
* Ustawienia - w obecnej wersji aplikacji funkcjonalność wyłączona,
* Wylogowanie.

