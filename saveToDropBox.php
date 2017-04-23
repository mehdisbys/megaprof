<?php

$archiveNameOnDropBox = 'archive' . time() . 'tar.gz';

$localArchiveName = "db_backup.sql.gz";

$command = "curl -X POST https://content.dropboxapi.com/2/files/upload \
--header \"Authorization: Bearer AvhrHr29xIAAAAAAAAAABy_NL_Hryd-uJWu6xCW8XerE7UqpaXNzuXydY2GBYwle\" \
--header 'Dropbox-API-Arg: {\"path\": \"/{$archiveNameOnDropBox}\",\"mode\": \"add\",\"autorename\": true,\"mute\": false}' \
--header \"Content-Type: application/octet-stream\" \
--data-binary @{$localArchiveName}";


exec($command, $output, $errors);

