## Deployment

git clone https://github.com/Naktibalda/codeception-zf2-tests.git

cd codeception-zf2-tests

composer install

cd tests/functional/REST

git submodule update

cd ../../..

./vendor/bin/codecept run
