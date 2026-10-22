<?php
// Simple micro-test runner for PHP CLI
function it(string $description, callable $testCase): void {
    try {
        $testCase();
        echo " [PASS] $description\n";
    } catch (\Throwable $e) {
        echo " [FAIL] $description\n";
        echo "        " . $e->getMessage() . " in " . $e->getFile() . ":" . $e->getLine() . "\n";
        exit(1);
    }
}

function assertEquals($expected, $actual, string $message = ''): void {
    if ($expected !== $actual) {
        $msg = $message ?: "Expected " . var_export($expected, true) . " but got " . var_export($actual, true);
        throw new \Exception($msg);
    }
}

function assertTrue($condition, string $message = ''): void {
    if (!$condition) {
        throw new \Exception($message ?: "Failed asserting that condition is true");
    }
}
