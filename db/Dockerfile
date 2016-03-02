FROM mariadb

COPY db.sql /docker-entrypoint-initdb.d/migrate.sql


ENV MYSQL_DATABASE "pie"
ENV MYSQL_ALLOW_EMPTY_PASSWORD "yes"
ENV MYSQL_ROOT_PASSWORD ""
ENV TERM "xterm"

