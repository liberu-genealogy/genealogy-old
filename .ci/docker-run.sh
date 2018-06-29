#!/bin/bash
cd $(dirname $0)

display_usage() {
    echo -e "\nUsage:\n$0 [image] [name] [port] [omit_features]\n"
}

# check whether user had supplied -h or --help . If yes display usage
if [[ ( $# == "--help") ||  $# == "-h" ]]
then
    display_usage
    exit 0
fi

# check number of arguments
if [ $# -ne 4 ]
then
    display_usage
    exit 1
fi

IMAGE=$1
NAME=$2
PORT=$3
OMIT_FEATURES=$4
MYSQL_EXTRA=

if [ "$IMAGE" == "mysql:8.0" ]; then
  MYSQL_EXTRA='--default-authentication-plugin=mysql_native_password'
fi

sudo mkdir -p run/$NAME
sudo chmod 777 run/$NAME

docker run -d \
	-v $(pwd)/run/$NAME:/var/run/mysqld:rw \
	-v $(pwd)/server:/etc/mysql/conf.d:ro \
	-p $PORT:3306 \
	--name $NAME \
	-e MYSQL_ROOT_PASSWORD='test' \
	$IMAGE \
  --log-bin-trust-function-creators=1 \
  --local-infile=1 \
  --secure-file-priv=/var/tmp \
  $MYSQL_EXTRA

	fi
	echo "Ran Init Script"
	exit 0
done

# init script did not run
>&2 echo "Unable to Run Init Script"
exit 1
