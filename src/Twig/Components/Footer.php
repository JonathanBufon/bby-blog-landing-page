<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
class Footer
{
    public int $year;
    
    public function __construct()
    {
        $this->year = (int) date('Y');
    }
}
