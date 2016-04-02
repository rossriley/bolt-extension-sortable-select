<?php

namespace Bolt\Extensions\Ross\SortableSelect;

use Bolt\Application;
use Bolt\Extension\SimpleExtension;

class Extension extends SimpleExtension
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
        if ($this->app['config']->getWhichEnd() == 'backend') {
            $this->app['htmlsnippets'] = true;
            $this->app['twig.loader.filesystem']->prependPath(__DIR__.'/twig');
        }
    }

    protected function registerAssets()
    {
        return [
            new Stylesheet('assets/select2.sortable.css'),
            new Javacript('assets/select2.sortable.min.js')
    ];
}

    protected function registerTwigFunctions()
    {
        return [
            'unique' => 'unique',
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
