#! /bin/sh

echo "Applying database dump ...\n"

mysql -u root -p megaprof < db_backup.sql
