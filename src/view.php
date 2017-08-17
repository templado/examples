<?php declare(strict_types = 1);
namespace Templado\Example;

use Templado\Engine\FileName;
use Templado\Engine\Templado;
use Templado\Engine\TempladoException;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/viewmodel/viewmodel.php';

try {
    $page = Templado::loadHtmlFile(
        new FileName(__DIR__ . '/html/viewmodel.xhtml')
    );
    $page->applyViewModel(new ViewModel());

    echo $page->asString() . "\n";

} catch (TempladoException $e) {
    foreach($e->getErrorList() as $error) {
        echo (string)$error;
    }
}
