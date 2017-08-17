<?php declare(strict_types = 1);
namespace Templado\Example;

use Templado\Engine\FileName;
use Templado\Engine\SimpleSnippet;
use Templado\Engine\SnippetListCollection;
use Templado\Engine\Templado;

require __DIR__ . '/../vendor/autoload.php';

try {
    $page = Templado::loadHtmlFile(
        new FileName(__DIR__ . '/html/basic.xhtml')
    );

    $snippetListCollection = new SnippetListCollection();

    $sample   = new \DOMDocument();
    $fragment = $sample->createDocumentFragment();
    $fragment->appendXML('This is a first test: <span id="nested" />');

    $snippetListCollection->addSnippet(
        new SimpleSnippet('test', $fragment)
    );

    $snippetListCollection->addSnippet(
        new SimpleSnippet('nested', new \DOMText('Hello world'))
    );
    $page->applySnippets(
        $snippetListCollection
    );

    echo $page->asString();

} catch (TempladoException $e) {
    foreach($e->getErrorList() as $error) {
        echo (string)$error;
    }
}
