<?php

namespace Bolt\Extensions\Ross\SortableSelect;

if (isset($app)) {
    $app['extensions']->register(new Extension($app));
}
