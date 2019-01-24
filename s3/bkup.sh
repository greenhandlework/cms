#!/bin/bash
DATABASE_NAME='greenhandlework'
SCHEMA_NAME='greenhandlework'
HOST_URL='test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com'
PASSWORD='A1S2D3F4'
cd  /var/www/html/cms/s3
BACKUP_LOCATION=$SCHEMA_NAME-bkup-$(TZ=IST-5:30 date +%Y%m%d-%H%M-%Z)
ECHO_HEADER=">>>"
SHOW_ECHO="Y"
if [ "$SHOW_ECHO" = "Y" ]; then echo "-------------------------------------------------------------------------------------"; fi;
#: <<'END'
mkdir -p -- "$BACKUP_LOCATION"
if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER CREATED Backup folder: $BACKUP_LOCATION"; fi
myvariable=$(echo "select table_name from information_schema.tables where table_schema = '$SCHEMA_NAME'"| mysql -h $HOST_URL -u $DATABASE_NAME -p$PASSWORD -
N -B) 2> /dev/null;
for T in $myvariable;
do
   if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER -- Exporting Table: $T"; fi
   mysqldump -h $HOST_URL --skip-comments --compact -u $DATABASE_NAME -p$PASSWORD $SCHEMA_NAME $T > $BACKUP_LOCATION/$T.sql || true 2> /dev/null;
   zip -ur $BACKUP_LOCATION.tar.gz $BACKUP_LOCATION/$T.sql;
   rm $BACKUP_LOCATION/$T.sql;
done
if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER CREATED ZIP file: $BACKUP_LOCATION.tar.gz"; fi
#rm -rf "$BACKUP_LOCATION";
if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER DELETED backup folder: $BACKUP_LOCATION"; fi
if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER UPLOADING TO S3 backup file $BACKUP_LOCATION.tar.gz"; fi
/usr/bin/php -q /var/www/html/cms/s3/s3.php /var/www/html/cms/s3/$BACKUP_LOCATION.tar.gz
if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER UPLOADING TO S3 DONE."; fi
#rm $BACKUP_LOCATION.tar.gz;
if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER DELETED ZIP file."; fi
if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER Process COMPLETE."; fi
if [ "$SHOW_ECHO" = "Y" ]; then echo "-------------------------------------------------------------------------------------"; fi
