<?php
declare(strict_types=1);

namespace App;

class Repository
{
    public function __construct(private array $data = [])
    {
    }

    public function set(string $key, mixed $value): void
    {
        $this->data[$key] = $value;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
