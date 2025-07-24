# laravel-qpdf-php-wrapper
A Laravel service provider for the turbopass/qpdf-php-wrapper package.

## Package Installation
```bash
composer require turbopass/laravel-qpdf-php-wrapper
```

## Laravel
Add the service provider in config/app.php or bootstrap/app.php (depending on your Laravel version)
```php
TurboPass\LaravelQpdfPhpWrapper\ServiceProvider::class,
```

Add to your facades in config/app.php:
```php
'Qpdf' => TurboPass\LaravelQpdfPhpWrapper\Facades\Qpdf::class,
```

Then publish the config file:
```bash
php artisan vendor:publish --provider="TurboPass\LaravelQpdfPhpWrapper\ServiceProvider" --tag="qpdf-config"
```

Where the `qpdf` binary may not be in your application's PATH variables (such as local dev on MacOS), add the following to your `.env` file:
```php
QPDF_EXECUTABLE_PATH=/opt/homebrew/bin/qpdf
```

## Usage
```php
// Get qpdf version
Qpdf::getQpdfVersion();

// Check if file is pdf
Qpdf::fileIsPdf($pathToFile);

// Get number of pages in a pdf
Qpdf::getNumberOfPages($pathToFile);

// Rotate range of files in a pdf
Qpdf::rotate($pathToFile, TurboPass\QpdfPhpWrapper\ENUMS\Rotation::RIGHT, '2-4');

// Trim pdf to page range
Qpdf::trimToRange($pathToFile, '4-z'); // "z" indicates end of file

// Copy range from pdf into a new pdf
Qpdf::copyPages($pathToFile, $pathToOutput, '1,3,5');

// Remove pages from a pdf
Qpdf::removePages($pathToFile, '2,4');

// Overlay a pdf on a range of pages
Qpdf::applyStamp($pathToFile, $fileToOverlay);

// Combine ranges from multiple files into a single pdf
$files = [
  [$pathOne, '1'],
  [$pathTwo, '4-7'],
  [$pathThree, '9-z'],
  // ...
];
Qpdf::combineRangesFromFiles($files, $pathToOutput);
```
