#!/bin/bash

echo \#\!\/bin\/bash >> init.sh

echo export APP_ENV=$APP_ENV_DEV >> init.sh
echo export APP_KEY=$APP_KEY >> init.sh
echo export REPOSITORY_ECR_URL=$REPOSITORY_ECR_URL >> init.sh

echo export MYSQL_PASSWORD_DEV=$MYSQL_PASSWORD_DEV >> init.sh
echo export MYSQL_USER_DEV=$MYSQL_USER_DEV >> init.sh
echo export MYSQL_DATABASE_DEV=$MYSQL_DATABASE_DEV >> init.sh
echo export MYSQL_PORT_DEV=$MYSQL_PORT_DEV >> init.sh
echo export MYSQL_HOST_DEV=$MYSQL_HOST_DEV >> init.sh
echo export MYSQL_CONNECTION_DEV=$MYSQL_CONNECTION_DEV >> init.sh

echo export PORT_MAPPING_DEV=$PORT_MAPPING_DEV >> init.sh
echo export PORT_MAPPING_PHPMYADMIN_DEV=$PORT_MAPPING_PHPMYADMIN_DEV >> init.sh
echo export PHPMYADMIN_URL_DEV=$PHPMYADMIN_URL_DEV >> init.sh
echo export CONTAINER_APP_DEV=$CONTAINER_APP_DEV >> init.sh

echo export AWS_BUCKET_DEV=$AWS_BUCKET_DEV >> init.sh
echo export AWS_DEFAULT_REGION=$AWS_DEFAULT_REGION >> init.sh
echo export AWS_SECRET_ACCESS_KEY=$AWS_SECRET_ACCESS_KEY >> init.sh
echo export AWS_ACCESS_KEY_ID=$AWS_ACCESS_KEY_ID >> init.sh

echo export PROD_MAIL_ENCRYPTION=$PROD_MAIL_ENCRYPTION >> init.sh
echo export PROD_MAIL_PASSWORD=$PROD_MAIL_PASSWORD >> init.sh
echo export PROD_MAIL_USERNAME=$PROD_MAIL_USERNAME >> init.sh
echo export PROD_MAIL_PORT=$PROD_MAIL_PORT >> init.sh
echo export PROD_MAIL_HOST=$PROD_MAIL_HOST >> init.sh
echo export PROD_MAIL_DRIVER=$PROD_MAIL_DRIVER >> init.sh

echo export TAG_ANA=$CI_PIPELINE_IID >> init.sh

echo "aws ecr get-login-password --region ap-southeast-1 | docker login --username AWS --password-stdin $ECR_URL" >> init.sh
echo docker-compose down >> init.sh
echo docker system prune -af >> init.sh
echo docker pull $REPOSITORY_ECR_URL:$CI_PIPELINE_IID >> init.sh
echo docker-compose up -d >> init.sh
