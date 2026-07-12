<?php

namespace App\Events\DTO\Shared;

readonly class PricingDTO
{
    use MakesFromArray;

    public bool $billable;
    public string $pricingModel;
    public string $category;
    public string $type;

    public function __construct(array $data)
    {
        $this->billable = $data['billable'];
        $this->pricingModel = $data['pricing_model'];
        $this->category = $data['category'];
        $this->type = $data['type'];
    }
}
