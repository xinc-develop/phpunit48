--TEST--
#578: Double printing of trace line for exceptions from notices and warnings
--SKIPIF--
<?php if (version_compare(phpversion(), '8.0', '>=')) {
    echo 'skip on php greater than 8.0';
}
--FILE--
<?php
$_SERVER['argv'][1] = '--no-configuration';
$_SERVER['argv'][2] = 'Issue578Test';
$_SERVER['argv'][3] = dirname(__FILE__) . '/578/Issue578Test.php';

require __DIR__ . '/../../bootstrap.php';
PHPUnit_TextUI_Command::main();
?>
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

EEE

Time: %s, Memory: %s

There were 3 errors:

1) Issue578Test::testNoticesDoublePrintStackTrace
Invalid error type specified

%sIssue578Test.php:%i

2) Issue578Test::testWarningsDoublePrintStackTrace
Invalid error type specified

%sIssue578Test.php:%i

3) Issue578Test::testUnexpectedExceptionsPrintsCorrectly
Exception: Double printed exception

%sIssue578Test.php:%i

FAILURES!
Tests: 3, Assertions: 0, Errors: 3.
