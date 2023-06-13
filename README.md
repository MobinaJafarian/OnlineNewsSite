# Online News site


## Table of Contents
* [General Info](#general-information)
* [Technologies Used](#technologies-used)
* [Features](#features)
* [Screenshots](#screenshots)
* [Setup](#setup)
* [Project Status](#project-status)
* [Contact](#contact)



## General Information
An online news site that includes the latest news, news categories and breaking news with an advanced admin panel.

## Technologies Used
- PHP 8.1.10



## Features
List the ready features here:
- Breaking News
- Editor's Choice
- Controversial News
- User Permissions
- Web Setting
- Authentication


## Screenshots
![online news screenshot](./public/screenshots/Screenshot%20online%20news%20(2).png)

![online news screenshot](./public/screenshots/Screenshot%20online%20news.png)

![adminPanel screenshot](./public/screenshots/Screenshot%20Panel.png)

![online news posts screenshot](./public/screenshots/Screenshot%20Posts.png)

![RegisterPage screenshot](./public/screenshots/Screenshot%20Register.png)

## Setup

1. Install XAMPP or WAMPP

2. Open XAMPP Control panal and start [apache] and [mysql] .

3. Download project from github(https://github.com/MobinaJafarian/OnlineNewsSite)  
    OR follow gitbash commands
    
    i>cd C:\\xampp\htdocs\
    
    ii>git clone https://github.com/MobinaJafarian/OnlineNewsSite.git
    
4. extract files in C:\\xampp\htdocs\.

> **Note** <br>
>  The project name must be `OnlineNewsSite`

5. open link localhost/phpmyadmin

6. click on new at side navbar.

7. give a database name as (news-project) hit on create button.

8. after creating database name click on import.

9. browse the file in directory
[OnlineNewsSite/database/news-project.sql].

10. after importing successfully.

11. open any browser and type http://localhost/OnlineNewsSite/

12. first register and then login

13. admin login details: 
- Email=onlinenewssite@admin.com and 
- Password=123456789


> **Note** <br>
> Don't forget to configure your database information in the `index.php`


> And also mail configuration in the `index.php`  ( I used [mailtrap](https://mailtrap.io/) )



## Project Status
Project is:  _complete_




## Contact
Created by [@MobinaJafarian](https://github.com/MobinaJafarian) - feel free to contact me!
