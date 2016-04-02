<?php

namespace Bolt\Extensions\Ross\SortableSelect;

use Bolt\Application;
use Bolt\Asset\File\JavaScript;
use Bolt\Asset\File\Stylesheet;
use Bolt\Extension\SimpleExtension;

class Extension extends SimpleExtension
{


    protected function registerAssets()
    {
        return [
            (new Stylesheet('select2.sortable.css'))->setZone('backend'),
            (new JavaScript('select2.sortable.min.js'))->setZone('backend'),
        ];
    }

    protected function registerTwigFunctions()
    {
        return [
            'unique' => 'unique',
        ];
    }

    protected function registerTwigPaths()
    {
        return [
            'twig' => ['position' => 'prepend', 'namespace' => 'bolt']
        ];
    }
    
    public function unique($arr1, $arr2)
    {
        $merged = array_unique(array_merge($arr1, $arr2), SORT_REGULAR);
        $compiled = [];
        
        foreach ($merged as $val) {
            $compiled[$val[0]] = $val;
        }
        
        return $compiled;
    }


}
