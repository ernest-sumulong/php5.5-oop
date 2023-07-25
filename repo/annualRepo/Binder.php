<?php

namespace repo\annualRepo;

class Binder {

    public $bindings = [];

    public function __construct($interface, $implementation)
    {
        $this->bindings[$interface] = $implementation;
    }

    public function resolve($interface)
    {
        if(isset($this->bindings[$interface])) {
            return new $this->bindings[$interface];
        } else {
            throw new Exception("No binding found for $interface");
        }
    }
}
?>