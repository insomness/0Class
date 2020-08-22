## Instalasi
```sh
$ git clone https://github.com/insomness/0Class.git
$ cd 0class
$ composer install
Jika menggunakan vscode
$ code .
```

**Rename .env-example menjadi .env**
```sh
$ php artisan key:generate
```
**Setup Database**
Buka file .env dan sesuaikan db values dengan db yang anda buat
```sh
$ php artisan migrate
$ php artisan db:seed
$ php artisan storage:link
```

License
----

MIT


**Free Software, Hell Yeah!**
