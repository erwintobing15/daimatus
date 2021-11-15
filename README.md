# daimatus

![Logo](images/logo.png)

## Introduction

> This is a fullstack web used as online learning platform for fourth grade student. This web has client side for student to watch learning materials and do quiz. The admin web for teacher used for customize learning materials and quizzes. This web built using php native, html, css, and js.

## Demo
Check out the working live demo [client-site](https://daimatus.000webhostapp.com/) and [admin-site](https://daimatus.000webhostapp.com/)) with username : daimatus-admin and pass: daimatus-admin.

## Web Screenshoot
![Home](../assets/home_web.PNG)

![Materi](../assets/materi_web.PNG)

![Video](../assets/video_web.PNG)

![Kui](../assets/kuis_web.PNG)

![Admin Matpel](../assets/admin_matpel.PNG)

![Admin Kuis](../assets/admin_kuis.PNG)


## Mobile Screenshoot
The client site for students is compatible with mobile devices of all sizes.
<table>
    <tr>
        <td valign="top"><img src="../assets/home_mobile.jpg"></td>
        <td valign="top"><img src="../assets/materi_mobile.jpg"></td>
        <td valign="top"><img src="../assets/topic_mobile.jpg"></td>
    </tr>
    <tr>
        <td valign="top"><img src="../assets/video_mobile.jpg"></td>
        <td valign="top"><img src="../assets/kuis_mobile.jpg"></td>
        <td valign="top"><img src="../assets/check_answer.jpg"></td>
    </tr>
</table>

## Technologies 
* PHP 8.0.3
* HTML 5
* CSS
* JS
* MySQL
* Font Awesome 4.7.0
* Bootstrap 5.0
* JQuery 3.5.1
* SweetAlert 2

## Setup
Run this project using locally xampp:

* Open xampp, start apache and mysql and then open phpmyadmin 
* Clone or download daimatus and move it to htdocs directory on xampp
* On phpmyadmin create new database and name it daimatus
* Klik import and choose file daimatus.sql from daimatus website in htdocs directory
* Open browser and go to link localhost/daimatus
* To open admin web got to localhost/daimatus/admin and login with username : daimatus-admin and password : daimatus-admin

## Features
Client site :
* List of all subjects 
* Every subject have a list of topic material 
* Students can watch video material on a topic 
* Students can do a quiz on a topic, submit the quiz, and get the grade

Admin site :
* can log in to an existing admin account, create a new account, or update the account
* Ability to upload, update, and delete subject, topic, subtopic, and logo of a subject
* Ability to upload, update, and delete video materials
* Ability to upload, update, and delete quiz material
* monitor students quizzes grade
* can display or hide a subject

## License
This project is licensed under the terms of the [MIT license](https://github.com/erwintobing15/daimatus/blob/main/LICENSE).

