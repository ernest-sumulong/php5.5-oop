<?php 

namespace repo\annualRepo;
use \Data\AnnualReportDAO;
require '../autoload.php';


class AnnualRepoImpl extends AnnualAssembler implements IAnnualRepo {

    public function __construct(){ }
    public function build(array $d){}
    public function setScaffolding() 
    { 
        //$this->assembles();
        // echo "This is test of class binding";
        $dao = new AnnualReportDAO();
        foreach($dao->getBranch() as $ds) {
            echo $ds;
        }

    } 

}
?>