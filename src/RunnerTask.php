<?php
declare(strict_types=1);

namespace App;

use Amp\Cancellation;
use Amp\Parallel\Worker\Task;
use Amp\Sync\Channel;

readonly class RunnerTask implements Task
{
    public function __construct(
        private Runner $runner,
        private ShippingOption $shippingOption,
    ) {
    }

    public function run(Channel $channel, Cancellation $cancellation): ResultShippingOption
    {
        return $this->runner->make($this->shippingOption);
    }
}
