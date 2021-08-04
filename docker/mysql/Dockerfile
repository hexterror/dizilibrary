FROM mysql:5.7

ENV MYSQL_ROOT_PASSWORD adminhexterror
ENV MYSQL_DATABASE library

COPY ./schema.sql /docker-entrypoint-initdb.d/
