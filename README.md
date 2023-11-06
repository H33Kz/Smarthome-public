<a name="readme-top"></a>


<!-- ABOUT THE PROJECT -->
## About The Project

The goal of this project was to create fullstack web application used to controll smarthome-like home system based on Arduino UNO microcontroller. Additional goal was use as little of external libraries and frameworks as possible to grasp basics of PHP, Javascript HTML.

Main features:
* Simple and minimalistic UI built with bootstrap for best user experience.
* User account creation, allowing for handling of multiple systems at once.
* Collection of timestamped temperature and humidity data from hardware's sensors for creating graphs.

<p align="right">(<a href="#readme-top">back to top</a>)</p>



### Built With

* [![PHP][Php.io]][Php-url]
* [![Javascript][Javascript.io]][Javascript-url]
* [![Html][Html.io]][Html-url]
* [![MySQL][Mysql.io]][Mysql-url]
* [![Chart][Chart.io]][Chart-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]


<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- DESIGN PRINCIPLES -->
## Design principles
This project was created with usage of most basic functions of used programming languages in mind (No frameworks). Because of that for front-end side of things mix of plain Javascript and HTML (With Bootstrap for better formatting) was used. Back-end is managed by PHP scripts and mySql database is used for data collection. Software regarding Arduino's functionality is not included within this repository however the way it should access data is mentioned further in the readme file.

<!-- USAGE EXAMPLES -->
## Usage
To use this software you need to have self-hosted or external server with PHP engine and mySql database (Xampp is a recommended choice for local). Database access variables are contained in `sql_connect.php` file. Within created database: `graphsdata`, `controlTable`, `smokeTable` and `users` tables should be created;

1. After running a server, at first you'll see login page:
   
  <p align="center">
    <img src="https://i.imgur.com/EW6rCOP.png" />
  </p>
  Login information should be stored within `users` table inside database listed in `sql_connect.php` file. Note that password is stored in plain text.
  

2. After logging in you can see controll panel (Icons on left bar where inaccesible durning making of this document):
   
  <p align="center">
    <img src="https://i.imgur.com/BKYMp2q.png"/>
  </p>
  
3. Different tabs found in left bar contain different data:
   <p>
    A) `Temperature` and `Humidity` contain graphs created with `Chart.js` library showing timestamped data form `graphsdata` table.
      <p align="center">
        <img src="https://i.imgur.com/7xlMQd0.png"/>
      </p>
    </p>
    <p>
       B) `Controls` contain on/off switches used for controll over various devices.
        <p align="center">
          <img src="https://i.imgur.com/NjsEljU.png"/>
        </p>
    </p>
    <p>
       C) `Alerts` contain information regarding measurements that are not timestamped (Smoke level and water level are used in this example).
        <p align="center">
          <img src="https://i.imgur.com/BPlyxVV.png"/>
        </p>
    </p>
    <p>
       D) `User` contain user information (Just username fetched from database at the moment as a placeholder).
        <p align="center">
          <img src="https://i.imgur.com/HpWky00.png"/>
        </p>
    </p>
    <p>
       D) `Contact` contains contact information to creators of this application.
    </p>
    

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- Requests and commands -->
## Data storage and sending data
Tables within database:
1. `users`
   This table contains user information: user id, username, password. Password in this table is stored in plain text as this project is just for demonstration purpouses.
2. `controlTable`
   Table containing information about state of devices set by user (In shown example: user id, door, light1, light2). This information is fetched by arduino in order to set controll signal to said devices. Note that Every row in this table is set permamently and different scripts should only update rows or fetch the information regarding specific user.
3. `smokeTable`
   Table for information about meassurements that dont require timestamped data (In shown example: user id, smoke level, water level). Also set permanently and only updated.
4. `graphsdata`
   Table for timestamped data (In shown example: user id, temparature, humidity, timestamp)

Updating database information with meassured data and fetching information regarding controlled devices is managed by `arduino_connect_to_db.php`, `arduino_request_value.php` and `arduino_send_smokelevel.php`. First one sends newest information for `graphsdata`, second fetches information from `controlTable` and third updates information within `smokeTable`

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- Prospect of developement -->
## Prospect of developement
Application could be extended with another features and upgrades, for example:
* Improved consistency of code and functionality - because this was created by two people at once and was a first project for both, code suffers severe incosistencies troughout its code base. For example: `tempgraph.php` accesses database with jquery trough separate PHP script, `controls.php` does the same thing directly without usage of Javascript completly. Edditing codebase to unify ways of connection to database would improve scalability of the project.
* Improved storage of state in `controlTable` - Controll table inside database contains columns regarding different devices of a user. Doing it this way ensured faster completion of the project for demonstration purpouses. However, because of that if additional devices would be put in place, it would require whole revamp of table in database. Solution to this would be to store state of the different devices in specially formatted string containing various devices names and states that would be interpretted by Arduino software. It would allow to create `controll` tab on website to fill page with all devices stored for that user automatically, improving scalability of a project further.
* The goal of this project was to not use any framework to grasp basics of used languages. With all the experience in creating this application, the advantages of using any framework to create this type of project became very apparent. It would substantially decrase complexity of a codebase, increase consistency of code and increase ease of connecting various devices to available resources. Using any popular framework would also allow for using HTML templating engine that would decrease amount of boilerplate code and would open new ways to create good user experience. 
<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->
## Contact

Piotr Snarski - snarski.piotrek@gmail.com

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->

[Php.io]:https://img.shields.io/badge/PHP-purple?style=for-the-badge&logo=php&logoColor=white
[Php-url]:https://www.php.net/

[Javascript.io]:https://img.shields.io/badge/Javascript-orange?style=for-the-badge&logo=javascript&logoColor=white
[Javascript-url]:https://js.org/index.html

[Html.io]:https://img.shields.io/badge/HTML-yellow?style=for-the-badge&logo=HTML5&logoColor=white
[Html-url]:https://www.learn-html.org/

[Chart.io]:https://img.shields.io/badge/chart.js-green?style=for-the-badge&logo=javascript&logoColor=white
[Chart-url]:https://www.chartjs.org/

[Thymeleaf.io]: https://img.shields.io/badge/Thymeleaf-grey?style=for-the-badge&logo=thymeleaf&logoColor=white
[Thymeleaf-url]: https://www.thymeleaf.org/documentation.html

[Springboot.io]: https://img.shields.io/badge/Springboot-green?style=for-the-badge&logo=springboot&logoColor=white
[Springboot-url]: https://spring.io/projects/spring-boot

[Mysql.io]: https://img.shields.io/badge/MySQL-orange?style=for-the-badge&logo=mysql&logoColor=white
[Mysql-url]: https://dev.mysql.com/doc/

[Bootstrap.com]: https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white
[Bootstrap-url]: https://getbootstrap.com

