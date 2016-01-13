<?php

namespace Bolt\Extensions\Ross\SortableSelect;

use Bolt\Application;
use Bolt\BaseExtension;

class Extension extends BaseExtension
{
    public function __construct(Application $app)
    {
        parent::__construct($app);
        if ($this->app['config']->getWhichEnd() == 'backend') {
            $this->app['htmlsnippets'] = true;
            $this->app['twig.loader.filesystem']->prependPath(__DIR__.'/twig');
        }
    }

    public function initialize()
    {
        if ($this->app['config']->getWhichEnd() == 'backend') {
            $this->addCss('assets/select2.sortable.css', 1);
            $this->addJavascript('assets/select2.sortable.min.js', 1);
        }
        
        $this->addTwigFunction('unique', 'unique');

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

    public function getName()
    {
        return 'sortable_select';
    }
}
