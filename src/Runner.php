<?php
declare(strict_types=1);

namespace App;

readonly class Runner
{
    public function __construct(private Repository $repository, private int $delay = 1)
    {
    }

    public function make(ShippingOption $shippingOption): ResultShippingOption
    {
        \sleep($this->delay);
        $this->repository->set('shippingOption'.$shippingOption->getId(), 'success');
        return new ResultShippingOption($shippingOption);
    }

    public function getRepository(): Repository
    {
        return $this->repository;
    }
}
