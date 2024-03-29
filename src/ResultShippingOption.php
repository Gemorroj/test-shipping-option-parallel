<?php
declare(strict_types=1);

namespace App;

class ResultShippingOption
{
    public ShippingOption $shippingOption;

    public function __construct(ShippingOption $shippingOption)
    {
        $this->shippingOption = $shippingOption;
    }

    public function getShippingOption(): ShippingOption
    {
        return $this->shippingOption;
    }
}
