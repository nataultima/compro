<?php

return [
    'disable' => env('CAPTCHA_DISABLE', false),
    'characters' => ['2', '3', '4', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'm', 'n', 'p', 'q', 'r', 't', 'u', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'M', 'N', 'P', 'Q', 'R', 'T', 'U', 'X', 'Y', 'Z'],
    'fontsDirectory' => dirname(__DIR__) . '/assets/fonts',
    'bgsDirectory' => dirname(__DIR__) . '/assets/backgrounds',
    'default' => [
        'length' => 5,
        'width' => 150,
        'height' => 40,
        'quality' => 90,
        'math' => false,
        'expire' => 60,
        'encrypt' => false,
        'bgImage' => false, // PENTING: set false
        'bgColor' => '#ecf2f7',
        'fontColors' => ['#2c3e50', '#c0392b', '#16a085', '#8e44ad', '#303f9f'],
        'lines' => 3,
        'contrast' => 0,
    ],
    'flat' => [
        'length' => 6,
        'fontColors' => ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'width' => 200,
        'height' => 50,
        'math' => false,
        'quality' => 90,
        'lines' => 6,
        'bgImage' => false, // PENTING: set false
        'bgColor' => '#ecf2f7',
        'contrast' => 0,
    ],
    'mini' => [
        'length' => 3,
        'width' => 60,
        'height' => 32,
        'bgImage' => false, // PENTING: set false
        'bgColor' => '#ecf2f7',
        'fontColors' => ['#2c3e50'],
    ],
    'inverse' => [
        'length' => 5,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'sensitive' => true,
        'angle' => 12,
        'sharpen' => 10,
        'blur' => 2,
        'invert' => false,
        'contrast' => -5,
        'bgImage' => false, // PENTING: set false
        'bgColor' => '#222222',
        'fontColors' => ['#ffffff'],
    ],
    'math' => [
        'length' => 9,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'math' => true,
        'bgImage' => false, // PENTING: set false
        'bgColor' => '#ecf2f7',
        'fontColors' => ['#2c3e50'],
    ],
];