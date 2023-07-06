<?php

namespace app\components;

use hail812\adminlte\widgets\Menu as WidgetsMenu;

class Menu extends WidgetsMenu
{
    public function __construct($config = [])
    {
        parent::__construct($config);

        static::$iconDefault = 'dot-circle';

        $options = $this->options;
        $this->options = array_merge($options, [
            'class' => $options['class'] . ' ' . 'nav-flat'
        ]);
    }
}
