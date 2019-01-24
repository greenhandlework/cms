!/bin/bash
DATABASE_NAME='gereenhandle_dev';
SCHEMA_NAME='greenhandlework';
#HOST_URL=' test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com';
#PASSWORD='A1S2D3F4';

cd var/www/html/cms/final_backup

BACKUP_LOCATION=$SCHEMA_NAME-bkup-$(TZ=IST-5:30 date +%Y%m%d-%H%M-%Z)

#mkdir -p -- "$BACKUP_LOCATION"


myvariable=$(echo "select table_name from information_schema.tables where table_schema = 'greenhandle_dev'"| mysql -h test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com -u greenhandlework -pA1S2D3F4 -N -B) 2> /dev/null;
for T in $myvariable;
do
  mysql -h test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com -u greenhandlework -pA1S2D3F4  $T > $BACKUP_LOCATION/$T.sql || true 2> /dev/null;
  # zip -ur $BACKUP_LOCATION.tar.gz $BACKUP_LOCATION/$T.sql;
  # rm $BACKUP_LOCATION/$T.sql;
done

#rm -rf "$BACKUP_LOCATION";


#/usr/bin/php -q /var/www/html/cms/s3/s3.php /var/www/html/cms/final_backup/$BACKUP_LOCATION.tar.gz


#rm $BACKUP_LOCATION.tar.gz;

