# Codeception is a multi-featured PHP based testing framework. This boilerplate project allows us to create automated tests for web services (both REST and SOAP).

## Prerequisites
- PHP 5.6+
- CURL enabled
- Composer
- Visual Studio Code / PHPStorm (optional IDE)

## Windows OS prerequisites setup - example
- install https://sourceforge.net/projects/wampserver/ (during the setup process, mark the checkboxes for a php version >7.0 and mysql 5)
- set Env Vars to path C:\wamp64\bin\mysql\mysql5.7.31\bin (the path might be slightly different on your machine - 'C:\wamp64\bin\' should be the same)
- set Env vars to path C:\wamp64\bin\php\php7.4.9
- install composer https://getcomposer.org/download/
- set Env var to path C:\ProgramData\ComposerSetup\bin

## Installation
```html
composer install
```

## Run Tests via CLI - Linux/MacOS (using Makefile)
```html
make test_prod
```

## Run Tests on Windows
```html
vendor/bin/codecept.bat run --html --env prod
```

### Run in Docker Container
```html
docker run -v ${PWD}:/project codeception/codeception run --html --env prod  
```

### HTML Report
```html
php vendor/bin/codecept run --html --env prod
```

### XML Report
```html
php vendor/bin/codecept run --xml --env prod
```

### Execute specific test suite only
```html
php vendor/bin/codecept run tests/PostEmployeeCest.php --html --env prod
```

### Execute specific test scenario - 'getEmployeesWithToken' is the test name
```html
php vendor/bin/codecept run tests:getEmployeesWithToken --html --env prod
```
