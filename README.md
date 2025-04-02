!!! U folderu _SQL se nalazi predefinisana baza podataka projectdebug.sql koja moze da se importuje ukoliko necemo pokretati php artisan migrate.

Sledeci koraci za pokretanje aplikacije su:

1. composer update
2. composer audit
3. composer dump-autoload
4. composer install
5. cp .env.example .env
6. php artisan key:generate
7. php artisan cache:clear
8. php artisan config:clear
9. php artisan route:clear
10. php artisan migrate
11. php artisan serve
