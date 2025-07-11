# laravel-qpdf-php-wrapper
A Laravel service provider for the paradoxd300/qpdf-php-wrapper package.

## Package Installation
```
composer require paradoxd300/laravel-qpdf-php-wrapper
```

## Laravel
Add the service provider to the providers array in config/app.php
```
ParadoxD300\laravel-qpdf-php-wrapper\ServiceProvider::class,
```
Add to your facades:
```
'Qpdf' => ParadoxD300\laravel-qpdf-php-wrapper\Facades\Qpdf.php,
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
Qpdf::rotate($pathToFile, ParadoxD300\QpdfPhpWrapper\ENUMS\Rotation::RIGHT, '2-4');

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
