<?php

use App\Adapters\MysqlAdapter;
use App\Adapters\PostgreSqlAdapter;
use App\Factories\MysqlUserFactory;
use App\Factories\PostgresqlUserFactory;
use App\Observers\LoggingObserver;
use App\Observers\NotificationObserver;

require_once __DIR__ . '/vendor/autoload.php';


$mysqlAdapter = new MysqlAdapter();
$mysqlAdapter->connect('localhost', 'root', 'ytngfhjkz', 'lab8');

$postgresqlAdapter = new PostgreSqlAdapter();
$postgresqlAdapter->connect('localhost', 'pashgunn', 'ytngfhjkz', 'lab8');

$loggingObserver = new LoggingObserver();
$notificationObserver = new NotificationObserver();

$mysqlFactory = new MysqlUserFactory($mysqlAdapter);

$mysqlUser = $mysqlFactory->createUser('mysql1', 'email', 'password');
$mysqlUser->addObserver($loggingObserver);
$mysqlUser->addObserver($notificationObserver);
$mysqlUser->notifyObserversOnCreate();

$isUpdated = $mysqlFactory->updateUserName('newName', 2);
if ($isUpdated) {
    $mysqlUser->notifyObserversOnUpdate();
}

$isDeleted = $mysqlFactory->deleteUserById(1);
if ($isDeleted) {
    $mysqlUser->notifyObserversOnDelete();
}

$postgresqlFactory = new PostgresqlUserFactory($postgresqlAdapter);
$postgreUser = $postgresqlFactory->createUser('postgre1', 'email', 'password');
$postgreUser->addObserver($loggingObserver);
$postgreUser->addObserver($notificationObserver);

$postgreUser->notifyObserversOnCreate();

$isUpdated = $postgresqlFactory->updateUserName('newPostgreName', 1);
if ($isUpdated) {
    $postgreUser->notifyObserversOnUpdate();
}

$isDeleted = $postgresqlFactory->deleteUserById(1);
if ($isDeleted) {
    $postgreUser->notifyObserversOnDelete();
}

$postgresqlAdapter->close();
$mysqlAdapter->close();