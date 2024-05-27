# CITULIBRARY
cit-u library website/chatbot

## Requirements

Before you start, ensure you have met the following requirements:
- **Python Version**: Ensure you have Python 3.8 or higher installed. You can download it from [python.org](https://www.python.org/downloads/).
- **Visual Studio**: Download and install Visual Studio. You can get it from [visualstudio.microsoft.com](https://visualstudio.microsoft.com/).
- **HeidiSQL**: Download and install HeidiSQL for managing your database. You can get it from [heidisql.com](https://www.heidisql.com/download.php).
- **XAMPP**: Download and install XAMPP to set up a local web server. You can get it from [apachefriends.org](https://www.apachefriends.org/index.html).
- **Package Manager**: Ensure you have `pip` installed.
- **Dependencies**: All required Python packages are listed in the `pip install.txt` file.

To install the required Python packages, run:
pip install -r all the modules that are required and being used in the system - requirements.txt


How to Deploy the Project
Follow these steps to run and access the project on your local machine:
1.)	Clone the repository
2.)	Move the project to the XAMPP directory:
    •	Navigate to the XAMPP installation location.
    •	Follow the path: XAMPP -> htdocs -> Project.
    •	Place the CITUMAINLIBRARY folder in the Project directory.
3.)	Set up the database:
    •	Download the MySQL file for the project.
    •	Open HeidiSQL and click on "New".
    •	Ensure the port number matches the one running on XAMPP.
    •	Open the MySQL file using Visual Studio, copy the MySQL code, go to the "Query" tab in HeidiSQL, and run the code.
4.)	Configure database connection:
    •	Open Visual Studio and edit the db_connection.php file.
    •	Update the port number to match the one used by XAMPP.
5.) Start XAMPP services:
    •	Ensure both Apache and MySQL are running in XAMPP.
6.) Access the project:
    •	Open your web browser and go to http://localhost/Project/CITUMAINLIBRARY/index.php.
7.)  Run the chatbot:
    •	In your terminal, navigate to the project directory and run:
     python app.py
-----------------------------------------------------------------------------------------------------------------------------------------------------
How to Start/run the Project
!.) Open xampp and start Apache & MySQL
2.) Open Sql (heidiSQL) and open the database
3.) Once connetected to the database, you can now access the system to your browser (http://localhost/project/)
4.) After that, you can now freely explore and use the system.

HOW TO USE LISA CHATBOT
5.) In visual studio start the flask server named app.py inside chat-bot-lisa folder.
6.) In the website navigate and click the LISA button in the navigation bar at the top part of the website.
7.) You'll be redirected to a LISA introduction page. press chat LISA to start communicating with LISA.
