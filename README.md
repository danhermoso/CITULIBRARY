# CITULIBRARY
cit-u library website/chatbot

## Requirements

Before you start, ensure you have met the following requirements:<br>
- **Python Version**: Ensure you have Python 3.8 or higher installed. You can download it from [python.org](https://www.python.org/downloads/).<br>
- **Visual Studio**: Download and install Visual Studio. You can get it from [visualstudio.microsoft.com](https://visualstudio.microsoft.com/).<br>
- **HeidiSQL**: Download and install HeidiSQL for managing your database. You can get it from [heidisql.com](https://www.heidisql.com/download.php).<br>
- **XAMPP**: Download and install XAMPP to set up a local web server. You can get it from [apachefriends.org](https://www.apachefriends.org/index.html).<br>
- **Package Manager**: Ensure you have `pip` installed.<br>
- **Dependencies**: All required Python packages are listed in the `pip install.txt` file.<br>

To install the required Python packages, run:<br>
pip install -r all the modules that are required and being used in the system - requirements.txt<br>


How to Deploy the Project<br>
Follow these steps to run and access the project on your local machine:<br>
1.)	Clone the repository<br>
2.)	Move the project to the XAMPP directory:<br>
    •	Navigate to the XAMPP installation location.<br>
    •	Follow the path: XAMPP -> htdocs -> Project.<br>
    •	Place the CITUMAINLIBRARY folder in the Project directory.<br>
3.)	Set up the database:<br>
    •	Download the MySQL file for the project.<br>
    •	Open HeidiSQL and click on "New".<br>
    •	Ensure the port number matches the one running on XAMPP.<br>
    •	Open the MySQL file using Visual Studio, copy the MySQL code, go to the "Query" tab in HeidiSQL, and run the code.<br>
4.)	Configure database connection:<br>
    •	Open Visual Studio and edit the db_connection.php file.<br>
    •	Update the port number to match the one used by XAMPP.<br>
5.) Start XAMPP services:<br>
    •	Ensure both Apache and MySQL are running in XAMPP.<br>
6.) Access the project:<br>
    •	Open your web browser and go to http://localhost/Project/CITUMAINLIBRARY/index.php.<br>
7.)  Run the chatbot:<br>
    •	In your terminal, navigate to the project directory and run:<br>
     python app.py<br>
-----------------------------------------------------------------------------------------------------------------------------------------------------<br>
How to Start/run the Project<br>
!.) Open xampp and start Apache & MySQL<br>
2.) Open Sql (heidiSQL) and open the database<br>
3.) Once connetected to the database, you can now access the system to your browser (http://localhost/project/)<br>
4.) After that, you can now freely explore and use the system.<br>

HOW TO USE LISA CHATBOT<br>
5.) In visual studio start the flask server named app.py inside chat-bot-lisa folder.<br>
6.) In the website navigate and click the LISA button in the navigation bar at the top part of the website.<br>
7.) You'll be redirected to a LISA introduction page. press chat LISA to start communicating with LISA.<br>
