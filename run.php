<?php
declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';

use Amp\Future;
use Amp\Parallel\Worker;
use function Amp\async;

$shippingOptions = [
    new \App\ShippingOption(100),
    new \App\ShippingOption(222),
    new \App\ShippingOption(333),
    new \App\ShippingOption(555),
    new \App\ShippingOption(444),
];

$start = \microtime(true);
$runner = new \App\Runner();
$executions = [];
foreach ($shippingOptions as $shippingOption) {
    $executions[$shippingOption->getId()] = Worker\submit(new \App\RunnerTask($runner, $shippingOption));
}

$responses = Future\await(array_map(
    static fn (Worker\Execution $e) => $e->getFuture(),
    $executions,
));

echo \round(\microtime(true) - $start, 2) . "\n";

\print_r($responses);
\print_r($runner->getRepository()); // problem - is empty
