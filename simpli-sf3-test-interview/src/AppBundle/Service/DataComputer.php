<?php

namespace AppBundle\Service;

class DataComputer
{
    /**
     * @var array
     */
    protected $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Compute the data
     */
    public function compute(): array
    {
        return array_map(
            function (array $item) {
                return [
                    'items' => $item    ,
                    'sum' => $sum = array_sum($item),
                    'odd' => (bool) ($sum % 2),
                ];
            },
            $this->data
        );
    }
}
