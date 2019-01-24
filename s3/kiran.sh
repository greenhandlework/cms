#!/bin/bash
#DATABASE_NAME='gereenhandle_dev';
#SCHEMA_NAME='greenhandlework';
#HOST_URL='test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com';
#PASSWORD='A1S2D3F4';

#cd  /var/www/html/cms/s3
#BACKUP_LOCATION=$SCHEMA_NAME-bkup-$(TZ=IST-5:30 date +%Y%m%d-%H%M-%Z)
#ECHO_HEADER=">>>"
#SHOW_ECHO="Y"
#if [ "$SHOW_ECHO" = "Y" ]; then echo "-------------------------------------------------------------------------------------"; fi;
#: <<'END'
#mkdir -p -- "$BACKUP_LOCATION"
#if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER CREATED Backup folder: $BACKUP_LOCATION"; fi

#myvariable=$(echo "select table_name from information_schema.tables where table_schema =greenhandlework"| mysql -h test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com -u gereenhandle_dev -pA1S2D3F4 -
#N -B) 2> /dev/null;

#myvariable=$(echo "select * FROM bid" | mysql -h test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com -u greenhandlework -pA1S2D3F4 -D greenhandle_dev - N -B) 2> /dev/null;

#mysql -h instance1-address.com -u username -ppassword -e "show databases"

#users=$(`echo 'SELECT * FROM bid;' | mysql -u ${greenhandlework} -h ${test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com} -p ${A1S2D3F4} -D ${greenhandle_dev} -e`) 2> /dev/null;

#for d in "${myvariable[@]}"; do
#        echo ${d}
#done

STATEMENT="select * FROM bid";

isAnythingToProcess=$(mysql -u greenhandlework -pA1S2D3F4 -h test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com -D greenhandle_dev -e "select * FROM bid");


#isAnythingToProcess=$(mysql -u ${greenhandlework} -p${A1S2D3F4} -h ${test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com} ${greenhandle_dev} -e "${STATEMENT}") &> /dev/null

echo ${isAnythingToProcess}


#i=0
#for value in $(mysql -h {test.cozmpv9bgzaq.ap-south-1.rds.amazonaws.com} -u{greenhandlework} -p${A1S2D3F4} -D${greenhandle_dev} -rN --execute 
#"SELECT * FROM bid:' ")
#do
#    //FeeRegular[$i]=${value}
#    echo ${value}"
	#=${FeeRegular[$i]}"
 #  // let "i+=1"
#done

#count=$(mysql -u mysql -pMysql123 -h xxx.xxx.xxx.xxx MYDBNAME -sse "select count(column) from TABLE where column=1234;")
#--silent, -s
#if [ $count -gt 0 ]
#then
 #    echo " greater that 0 "
#else
#     echo " lower than 0 "
#fi

##!/bin/bash
#USERNAME=someUser
#HOSTS="host1 host2 host3"
#SCRIPT="pwd; ls"
#for HOSTNAME in ${HOSTS} ; do
#    ssh -l ${USERNAME} ${HOSTNAME} "${SCRIPT}"
#done



#echo ${myvariable[*]:0}     

#echo $myvariable

for T in ${isAnythingToProcess}
do
echo T
 #  if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER -- Exporting Table: $T"; fi
  # mysqldump -h $HOST_URL --skip-comments --compact -u $DATABASE_NAME -p$PASSWORD $SCHEMA_NAME $T > $BACKUP_LOCATION/$T.sql || true 2> /dev/null;
  # zip -ur $BACKUP_LOCATION.tar.gz $BACKUP_LOCATION/$T.sql;
  # rm $BACKUP_LOCATION/$T.sql;
done

#if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER CREATED ZIP file: $BACKUP_LOCATION.tar.gz"; fi
#rm -rf "$BACKUP_LOCATION";
#if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER DELETED backup folder: $BACKUP_LOCATION"; fi
#if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER UPLOADING TO S3 backup file $BACKUP_LOCATION.tar.gz"; fi

#/usr/bin/php -q /var/www/html/cms/s3/s3.php /var/www/html/cms/s3/$BACKUP_LOCATION.tar.gz

#if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER UPLOADING TO S3 DONE."; fi
#rm $BACKUP_LOCATION.tar.gz;
#if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER DELETED ZIP file."; fi
#if [ "$SHOW_ECHO" = "Y" ]; then echo "$ECHO_HEADER Process COMPLETE."; fi
#if [ "$SHOW_ECHO" = "Y" ]; then echo "-------------------------------------------------------------------------------------"; fi
