<?php declare(strict_types = 1);
namespace Templado\Example;

use Templado\Engine\FileName;
use Templado\Engine\Templado;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/transformation/SampleTransformation.php';

$page = Templado::loadHtmlFile(
    new FileName(__DIR__ . '/html/viewmodel.xhtml')
);

$page->applyTransformation(new SampleTransformation());

echo $page->asString();

