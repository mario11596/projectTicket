Programi i paketi instalirani za izradu aplikacije:

    Visual studio code
    Laravel verzija 8
    XAMPP verzija 3.2.4 – uključeno sa MySQL i Apache
    Laravel Breeze

Upute za pokretanje aplikacije:

    U otvorenom direktoriju je potrebno pokrenuti 'composer install'
    Sa naredbom 'npm install' se instalirava node_modules direktorij
    Sa naredbom 'php artisan migrate' se stvaraju sve tablice iz projekta u bazi lokalnog sustava
    U .env file je potrebno namjestiti podatke vezano za bazu te za mailtrap sustav, gdje je prethodno potrebno napraviti registraciju na Mailtrap.io
    Potrebno je pokrenuti projekt sa naredbom 'php artisan serve', i zatim se registrirati kao novi korisnik
    Zatim se pokreće 'php artisan db:seed' sa kojom se stvaraju probni podaci
    Aplikacija se pokreće sa naredbom 'php artisan serve'.

Programs and packages installed for this application:

    Visual studio code
    Laravel version 8
    XAMPP version 3.2.4. – included with MySQL adn Apache server
    Laravel Breeze

Instructions for starting the application:

    In the open directory, it is necessary to run command 'composer install'
    Use command 'npm install', to install all node_modules directory
    With 'php artisan migrate', all tables from the project will be created in the local system datebase
    In the .env file it is necessary to set the data related to the datebase and the mailtrap system, before you have to register as a new user on the website Mailtrap.io
    Project start run with command 'php artisan serve', and then you have to register as a new user
    Then use 'php artisan db:seed' to make dataset in database
    The aplication is ready to use, run again command 'php artisan serve'

