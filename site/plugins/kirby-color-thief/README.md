# Kirby Color Thief

A simple plugin for extracting dominant colors from images in Kirby 3.

## Requirements

See [Color Thief PHP requirements](https://github.com/ksubileau/color-thief-php#requirements).

## Installation

### Composer

```shell
composer require olafapl/kirby-color-thief
```

## Usage

The extracted colors are stored in the image metadata (in "#rrggbb" format) and can be accesed with:

```php
<?= $myImageFile->colors()->yaml() ?>  // Returns an array of colors
```
