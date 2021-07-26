# 📖 Dizi-Library [In Development]

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

Clone repository,

```shell
git clone git@github.com:hexterror/dizilibrary.git
# or
git clone https://github.com/hexterror/dizilibrary.git
```

For Docker,

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
mysql --host localhost -P 3306 -u root -p
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

- [Website](https://hexterror.github.io)

## 📝 License

- Discussion required
