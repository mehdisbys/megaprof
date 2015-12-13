#! /bin/sh

echo "Dumping Database to file ...\n"

mysqldump -u root -p megaprof > db_backup.sql
