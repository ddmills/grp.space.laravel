<?php

namespace App;

class JSGlobals
{
    protected $attributes = [];

    public function __construct()
    {
    }

    public function __get($property)
    {
        return $this->get($property);
    }

    public function get($property)
    {
        return $this->attributes[$property];
    }

    public function __set($property, $value)
    {
        $this->set($property, $value);
    }

    public function set($property, $value) {
        $this->attributes[$property] = $value;
    }

    public function all()
    {
        return $this->attributes;
    }
}
