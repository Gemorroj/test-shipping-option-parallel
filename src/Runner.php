<?php

namespace App;

class Runner
{
    private int $delay;
    public function __construct(int $delay = 1)
    {
        $this->delay = $delay;
    }

    public function make(ShippingOption $shippingOption): ResultShippingOption {
        \sleep($this->delay);
        return new ResultShippingOption($shippingOption);
    }
}
