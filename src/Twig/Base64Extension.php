<?php

declare(strict_types=1);

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class Base64Extension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('base64_encode', [$this, 'encode']),
            new TwigFilter('base64_decode', [$this, 'decode']),
        ];
    }

    public function encode(string $string): string
    {
        return base64_encode($string);
    }

    public function decode(string $string): string
    {
        return base64_decode($string);
    }
}
