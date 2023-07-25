<?php
namespace annualReport;
use \repo\annualRepo\Binder;
use \repo\annualRepo\AnnualRepoImpl;
use \repo\annualRepo\IAnnualRepo;
require '../autoload.php';

class AnnualReport {

    public $binder;
    public $interface;

    public function __construct(){
        $this->binder = new Binder(IAnnualRepo::class, AnnualRepoImpl::class);
        $this->interface = $this->binder->resolve(IAnnualRepo::class);
    }

    public function exportReport() 
    {
        $this->interface->setScaffolding();
    }
}
 $program = new AnnualReport();
 $program->exportReport();
?>