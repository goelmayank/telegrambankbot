# telegrambankbot
## Telegram bot - Virtual Assistant for banks
### Read about Bot in my blog [here](myLib/README.md) (russian language)

Boat for a few seconds can answer the simplest questions from customers on exchange rates, the nearest ATM, bank offices, and more. Try bot functionality you can add to @sberbankkztestbot Telegram.

**What is now implemented**

    Location of the nearest branch or ATM
    Exchange Rates
    Information for the client

**Technologies**

    programming language - PHP
    Database - MySQL
    API Telegram

Few technical details.
**The structure of the databases is very simple:**
1. message_queue Table - contains so to speak the message queue for each chat.
2. markers Table - contains contact details and coordinates (longitude and latitude) of the bank branch.
3. markers_schedule Table - contains a timetable for the offices by day.
4. Table text - contains the title and the text of the facts or the board, the type field specifies the type of text.
5. atm Table - contains data and coordinates (longitude and latitude) ATMs.

**Capabilities**
this bot bot interface replica of the Savings Bank of Russia @SberbankBot. In my opinion, it is very easy to use menu. you can quite easily change it if you wish.
![alt tag](http://freshbrain.kz/pictures/1-min_1.PNG)

**Locate a Branch**
The nearest branch is sought in a 2 km radius of your location.
When sending location bot sends the user name, address and contact information, schedule, approximate distance in meters, and the location on the map.
![alt tag](http://freshbrain.kz/pictures/2-min.PNG)

**Display currency**
Conclusion exchange rates carried out from the site of the National Bank of the Republic of Kazakhstan.
![alt tag](http://freshbrain.kz/pictures/3-min.PNG)

**Find the nearest ATM**
The nearest ATM is sought in a 2 km radius of your location.
When sending location bot sends the user name, address, work schedule, approximate distance in meters, and the location on the map.
![alt tag](http://freshbrain.kz/pictures/4-min.PNG)

**Facts and Tips**

![alt tag](http://freshbrain.kz/pictures/5-min.PNG)

**Development plans**

1. Conclusion drag quotations. metals, oil
2. Quick commands for the conversion (example: 5000 rubles)
3. Sending feedback
4. Scripts answers by product (replacement call center for frequently asked questions)
5. Interface Development for filling and editing database
