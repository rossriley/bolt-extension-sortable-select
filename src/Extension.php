<?php

namespace Bolt\Extensions\Ross\SortableSelect;

use Bolt\Application;
use Bolt\Asset\File\Javascript;
use Bolt\Asset\File\Stylesheet;
use Bolt\Extension\SimpleExtension;

class Extension extends SimpleExtension
{


    protected function registerAssets()
    {
        return [
            new Stylesheet('assets/select2.sortable.css'),
            new Javascript('assets/select2.sortable.min.js')
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
            'twig'
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
