#! /bin/sh

echo "Applying database dump ...\n"

tar -xzvf db_backup.sql.tar.gz

mysql -u root -p megaprof < db_backup.sql
