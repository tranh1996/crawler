<?php 

namespace Tests\Unit\Http\Controllers;
class Temperature
{
    private $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function average()
    {
        $total = 0;
        for ($i = 0; $i < 2; $i++) {
            $total += $this->service->readTemp();
        }
        return $total/2;
    }
}