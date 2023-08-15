<?php

require_once 'vendor/autoload.php';

use ColorThief\ColorThief;


function rgbToHex($channels)
{
    return array_reduce($channels, function ($acc, $channel) {
        $channelHex = dechex($channel);
        if (strlen($channelHex) == 1) {
            $channelHex = '0' . $channelHex;
        }
        return $acc . $channelHex;
    }, '#');
}

function storeDominantColors($file)
{
    if ($file->type() == 'image') {

        // Extract dominant colors with Color Thief.
        // Color Thief does not always return the correct amount of colors (https://github.com/ksubileau/color-thief-php/issues/5),
        // so a sloppy workaround is applied.
        $dominantColorsRgb = array_slice(ColorThief::getPalette($file->root(), 3), 0, 2);

        // Store the extracted colors in the image metadata.
        $file->update([
            'colors' => array_map('rgbToHex', $dominantColorsRgb)
        ]);
    }
}

Kirby::plugin('olafapl/color-thief', [
    'hooks' => [
        'file.create:after' => function ($file) {
            storeDominantColors($file);
        },
        'file.replace:after' => function ($newFile, $_) {
            storeDominantColors($newFile);
        }
    ]
]);
