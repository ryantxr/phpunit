--TEST--
phpunit FatalTest ../_files/FatalTest.php
--SKIPIF--
<?php
if (strpos(__DIR__, 'travis/build')) {
    echo "Skip this on travis until someone has time to fix it";
}
?>
--FILE--
<?php

$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = '--process-isolation';
$_SERVER['argv'][3] = 'FatalTest';
$_SERVER['argv'][4] = dirname(dirname(__FILE__)) . '/_files/FatalTest.php';

require_once dirname(dirname(dirname(__FILE__))) . '/PHPUnit/Autoload.php';
PHPUnit_TextUI_Command::main();
?>
--EXPECTF--
PHPUnit %s by Sebastian Bergmann.

E

Time: %i %s, Memory: %sMb

There was 1 error:

1) FatalTest::testFatalError
PHPUnit_Framework_Exception: %s error: Call to undefined function non_existing_function() in %s


Caused by
ErrorException: unserialize(): Error at offset %i of %i bytes


FAILURES!
Tests: 1, Assertions: 0, Errors: 1.

