<?php

/*
 * This file is part of the Tabular  package
 *
 * (c) Daniel Leech <daniel@dantleech.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PhpBench\Tabular\Dom;

class Document extends \DOMDocument
{
    private $xpath;

    public function __construct()
    {
        parent::__construct('1.0');
        $this->registerNodeClass('DOMElement', 'PhpBench\Tabular\Dom\Element');
    }

    public function createRoot($name)
    {
        return $this->appendChild(new Element($name));
    }

    public function xpath()
    {
        if ($this->xpath) {
            return $this->xpath;
        }

        $this->xpath = new \DOMXpath($this);

        return $this->xpath;
    }
}
