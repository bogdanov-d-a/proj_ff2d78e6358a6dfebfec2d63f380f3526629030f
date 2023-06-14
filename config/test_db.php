<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host=localhost;dbname=db_98ed41241026163a753fb84d07b1468896f877f9_test';

return $db;
