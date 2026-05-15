<?php
try {
    echo "Value: " . PDO::ATTR_ERR_MODE . "\n";
} catch (Error $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
