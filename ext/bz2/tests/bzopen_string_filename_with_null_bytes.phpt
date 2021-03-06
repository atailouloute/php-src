--TEST--
bzopen(): throw TypeError if filename contains null bytes
--SKIPIF--
<?php if (!extension_loaded("bz2")) print "skip"; ?>
--FILE--
<?php

try {
    bzopen("file\0", "w");
} catch (\TypeError $e) {
    echo $e->getMessage() . \PHP_EOL;
}

try {
    bzopen("file\0", "r");
} catch (\TypeError $e) {
    echo $e->getMessage() . \PHP_EOL;
}

?>
--EXPECT--
Filename must not contain null bytes
Filename must not contain null bytes
