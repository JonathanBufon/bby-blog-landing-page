<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
class ProductCard
{
    public string $title;
    public string $description;
    public string $status; // 'available' or 'development'
    public ?string $url = null;
}
