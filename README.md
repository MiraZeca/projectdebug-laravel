!!! U folderu _SQL se nalazi predefinisana baza podataka projectdebug.sql koja moze da se importuje ukoliko necemo da pokrenemo ili zelimo da izbegnemo php artisan migrate. U tom slucaju naziv baze mora biti kao u .env file: DB_DATABASE=project

Sledeci koraci za pokretanje aplikacije su:

1. composer update
2. composer audit
3. composer dump-autoload
4. cp .env.example .env
5. php artisan key:generate
6. php artisan migrate
7. php artisan serve

