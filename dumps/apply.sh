#! /bin/sh

echo "Applying database dump ...\n"

tar -xvf db_backup.sql.tar.gz

mysql -u root -p megaprof < db_backup.sql
