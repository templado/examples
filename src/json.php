<?php declare(strict_types = 1);
namespace Templado\Example;

use Templado\Engine\FileName;
use Templado\Engine\Templado;
use Templado\Engine\TempladoException;
use Templado\Mappers\JsonMapper;

require __DIR__ . '/../vendor/autoload.php';

try {
    $page = Templado::loadHtmlFile(
        new FileName(__DIR__ . '/html/viewmodel.xhtml')
    );

    $input = file_get_contents(__DIR__ . '/viewmodel/viewmodel.json');
    $mapper = new JsonMapper();
    $obj = $mapper->fromString($input);

    $page->applyViewModel($obj);

    echo $page->asString() . "\n";

} catch (TempladoException $e) {
    foreach($e->getErrorList() as $error) {
        echo (string)$error;
    }
}
