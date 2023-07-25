<?php

namespace repo\annualRepo;

interface IAnnualRepo {
    public function __construct();
    public function build(array $d);
    public function setScaffolding();
}
?>