#!/bin/sh

# Replace credentials
sed -i -- "s/foo/${SHOWOFF_USER}/g" $TRAVIS_BUILD_DIR/showoff.json
sed -i -- "s/bar/${SHOWOFF_PASS}/g" $TRAVIS_BUILD_DIR/showoff.json

docker login -u $DOCKER_USER -p $DOCKER_PASS
REPO="helcorin/secdevops"

if [ "$TRAVIS_BRANCH" = "master" ]; then
    TAG="latest"
else
    TAG="rc-$TRAVIS_BUILD_NUMBER"
fi

docker build -t $REPO:$TAG .
docker push $REPO:$TAG

# Heroku Authentication
docker login -u _ -p $HEROKU_API_KEY registry.heroku.com

# Heroku Deployment
docker tag $REPO:$TAG registry.heroku.com/$HEROKU_APP/web
docker push registry.heroku.com/$HEROKU_APP/web
heroku container:release web --app $HEROKU_APP
