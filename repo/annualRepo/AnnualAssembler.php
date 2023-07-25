<?php

namespace repo\annualRepo;

class AnnualAssembler {
  
  
    public $dao;

    public function __construct(){
      $this->dao = new AnnualReportDAO();
    }

    public function setHeader()
    {
        $this->installs("
        <table>
            <tr>
              <th colspan=11 rowspan=4 style='font-size:24px;'>World Of Fun</th>
            </tr>
        </table>
        <table>
            <tr>
              <td colspan=11>VIP - Annual Membership Report</td>
            </tr>
            <tr>
              <td colspan=11>Report Date:</td>
            </tr>
            <tr>
              <td colspan=11>Period Covered:</td>
            </tr>
        </table>
        ");
    }

    public function setLayout() 
    {
        $this->installs("
      
        <table border=1>
        <tr>
        <th colspan=4
        style='align:left;'
        >
        Date here
        </th>
        </tr>
        <tr>
        <th>Paid</th>
        <th>Free</th>
        <th>Total</th>
        <th>Reactivate</th>
        </tr>
        </table>
     
        ");
    }

    public function setTable()
    {
        $this->installs("
        <table border=1>
        <tr>
        <th>Branch</th>
        </tr>
        ");
        
        $this->installs("</table>");
    }

    public function installs($tags){ echo $tags; }


    public function fileConverter()
    {
        header("Content-Disposition: attachment;filename=AnnualMembershipReport.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
    }


    public function tblBinder() {
      $this->installs(
        "<table>
        <tr>
        <td>
        ".$this->setTable()."
        ".$this->fetchData()."
        </td>
        <td>
        ".$this->setLayout()."
        </td>
        </tr>
        </table>"
      );
    }

    public function assembles() 
    {
        $this->installs("
        ".$this->setHeader()."
        ".$this->tblBinder()."
        ");
        $this->fileConverter();
    }

    public function fetchData() {
      $this->installs("
      <table>
      <tr>
      ");
      foreach($this->dao->getBranch() as $br) {
        $this->installs("<td>
        ".$br."
        <td>");
      }
      $this->installs("
      </tr>
      </table>");
    }
}
?>