DISTANT-ELOGISTICS Set Up
1. Copy the folder 'distant-elogistics' and paste it in htdocs
2. Open localhost/phpmyadmin
4. Create database called 'distant_db'
5. Import sql file from the distant-elogistics/database folder and import the sql file inside in 'distant_db' database

IF PASSWORDED phpMyAdmin. CHANGE THE DATABASE PASSWORD 
1. Access the folder inside in distant-elogistics/process
2. Find the 3 following files:
	- accept_deny.php
	- connection.php
	- database_connection.php
3. Change the DBPASSWORD or DBPASS, it is also commented like this "//CHANGE PASSWORD HERE!"

You can now access DISTANT-ELOGISTICS.