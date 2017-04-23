<?php


$localArchiveName = "db_backup.sql.gz";

$archiveNameOnDropBox = 'backup-' . time() . '.tar.gz.gpg';

$command = "mysqldump -u root megaprof > db_backup.sql ; tar -czvf {$localArchiveName} db_backup.sql ; gpg --encrypt --recipient 'Dropbox Key' --batch --yes {$localArchiveName} ; curl -X POST https://content.dropboxapi.com/2/files/upload \
--header \"Authorization: Bearer AvhrHr29xIAAAAAAAAAABy_NL_Hryd-uJWu6xCW8XerE7UqpaXNzuXydY2GBYwle\" \
--header 'Dropbox-API-Arg: {\"path\": \"/{$archiveNameOnDropBox}\",\"mode\": \"add\",\"autorename\": true,\"mute\": false}' \
--header \"Content-Type: application/octet-stream\" \
--data-binary @{$localArchiveName}.gpg";


exec($command, $output, $errors);

