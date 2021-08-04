# 📖 Dizi Library

**Online Library Management System**

```qoute
A Library Management System is a software built to handle the primary
housekeeping functions of a library. Libraries rely on library management
systems to manage asset collections as well as relationships with their
members. Library management systems help libraries keep track of the books
and their checkouts, as well as members’ subscriptions and profiles.
```

## 💻 Requirements

- [Apache2](https://httpd.apache.org/download.cgi) or [XAMPP](https://www.apachefriends.org/download.html)
- [php 7.3](https://www.php.net/downloads.php)
- [MySQL](https://www.mysql.com/downloads/)
- [Docker](https://www.docker.com/) (Optional)

Required extensions are written in [composer.json](https://github.com/hexterror/dizilibrary/blob/main/composer.json).

## 👨‍💻 Development

**default username: `admin` and password: `admin` for dizi library**
**default email: `student1@library.local` and password: `password`**

**Note: change the admin password while using for production**

Clone repository,

```shell
git clone git@github.com:hexterror/dizilibrary.git
# or
git clone https://github.com/hexterror/dizilibrary.git
```

Set up database configurations by copying `credentials.php.example` to `credentials.php`
And set those variables.

```shell
cp credentials.php{.example,}
# and edit with your editor
```

For Docker,

Credentials for Docker,

```php
// credentials.php
<?php

return [
    'db_host' => 'db',
    'db_user' => 'root',
    'db_pass' => 'adminhexterror',
    'db_name' => 'library',
];
?>
```

```shell
docker-compose up --build -d
```

For Linux,

```shell
mv library /var/www/html

systemctl restart apache2
```

For Windows,

Move the content to your apache server directory.

And Done (If you install XAMPP properly.)

## 🔨 Migrations

Go, where schema.sql is located that is
`docker/php/schema.sql`

```shell
cd docker/php
```

Login to mysql,

```shell
mysql --host localhost -P 3306 -D library -u root -p
```

```sql
source schema.sql;
```

Note: Migrations script is coming soon.

## ✨ Contributing

Kindly read the guideline before contributing.

- [Development Guide](https://github.com/hexterror/dizilibrary/blob/main/DEVELOPMENT.md)

## 🍻 Credits

- Mahafajul Haque <emonmondal083@gmail.com>
- Injamul Mohammad Mollah <mrinjamul@gmail.com>

## 🖊️ Author

- 🏢 [hexterror](https://hexterror.github.io)

### 🔗 Links

- [Try Dizi Library](https://online-library-m-s.herokuapp.com)

## 📝 License

open-sourced under [MIT License](https://github.com/hexterror/dizilibarary/blob/main/LICENSE)
