# Applaudo Studios Final Project

Here is my final project developed to Applaudo Studios BackEnd program. It is about a website for a job applications, and it is entire implement on Laravel Framework, with the follow considerations for the correct deploying:

-   The project is already seted to running by Docker platform. Necesary containers are listed on Docker-compose file.
-   The main database is seted by default using MySql and its connection parameters. The .env file must be changed in every different enviorment with its owns passwords and permitions. A brand new DB is created and populated sure enough to test the application having certain information, such a simulated users, positions and status.
-   The site differentiates 3 categories of users: Candidates, Companies and Recruiters, each with its own login instantiate and prefixed roles. Only candidate's room page is entire public without need of a successful autentication.
-   It is strongly recommended to run seeders on time the application is running up to test all the website demo functionalities

Comments: this project was developed on Php 8.1, using Laravel 9 version. Could be running under a common web server but it is recommended better run on Nginx background.
