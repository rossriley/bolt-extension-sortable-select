<?php

namespace Rossriley\Extensions\Bolt\SortableSelect;

if (isset($app)) {
    $app['extensions']->register(new Extension($app));
}
