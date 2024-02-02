<?php

namespace Msmahon\LaravelQpdfPhpWrapper\Facades;

use Illuminate\Support\Facades\Facade as BaseFacade;

/**
 * @method static int getQpdfVersion(string $path)
 * @method static bool fileIsPdf(string $path)
 * @method static int getNumberOfPages(string $path)
 * @method static bool rotate(string $path, \Msmahon\QpdfPhpWrapper\Enums\Rotation $direction, string $range)
 * @method static bool trimToRange(string $path, string|int $range)
 * @method static bool combineRangesFromFiles(array $pages, string $output)
 * @method static bool copyPages(string $path, string $outputPath, string $range)
 * @method static bool removePages(string $path, string|int $range)
 * @method static array pageSizes(string $path)
 * @method static void applyStamp(string $path, string $stampPath, string $range = null)
 *
 * @see Msmahon\QpdfPhpWrapper\Pdf
 */
class Qpdf extends BaseFacade
{
    protected static function getFacadeAccessor()
    {
        return 'Qpdf';
    }
}
