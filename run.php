<?php
require __DIR__ . '/vendor/autoload.php';

use Amp\Loop;
use Amp\Parallel\Worker;
use Amp\Promise;

$shippingOptions = [
    new \App\ShippingOption(100),
    new \App\ShippingOption(222),
    new \App\ShippingOption(333),
    new \App\ShippingOption(555),
    new \App\ShippingOption(444),
];

$start = \microtime(true);
$runner = new \App\Runner();
$promises = [];
foreach ($shippingOptions as $shippingOption) {
    $promises[$shippingOption->getId()] = Worker\enqueueCallable([$runner, 'make'], $shippingOption);
}

$responses = Promise\wait(Promise\all($promises));
echo \round(\microtime(true) - $start, 2) . "\n";

print_r(\get_class(Loop::get()));
//print_r($responses);
