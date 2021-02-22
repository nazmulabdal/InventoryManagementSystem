Steps to follow to run the code on your machine:

1.First start the local server on.
2.Then, download the zip file & extract it in your localhost destination folder
3.Now go to your phpmyadmin & create a database
4.After that you have to open the command prompt in the project directory & run the following command:
                
                cp .env.example .env
                php artisan key:generate
                
5.After the execution of the previous commands you will get a new .env file in your project folder. Now, open the .env file and edit the following section:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

To configure the email you will have to edit the follwing portion:

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_real_email_account
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=tls

6.Now, go to the mail account that is provided in the env file -> Go to its google account -> sign in & security -> allow less secure apps -> turn on -> 2 step verification off
7.Restart the server
8.Now, go to your browser & start the project by localhost/projectname
