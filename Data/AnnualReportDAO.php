<?php

namespace Data;

class AnnualReportDAO extends DBConn {

    public $db;
    public $sql;

    public function __construct(){ $this->db = new DBConn(); }

    public function getData()
    {
        return $this->resultDataSet($this->queries());
    }


    final public function queries()
    {
      $this->sql = "select fmstore.Description, fmmembership_h.member_at,fmmembership_h.year,fmmembership_h.month,fmstore.region,fmstore.areanum, fmstore.areaname,count(fmmembership_h.isMembershipPaid=1), count(fmmembership_h.isMembershipFree=1),
        count(fmmembership_h.isReactivatePaid > 0), count(fmmembership_h.isReactivateFree=1),fmstore.ID
        from vip_system.fmstore
        join vip_system.fmmembership_h on
        fmstore.ID = fmmembership_h.member_at
        where
        fmmembership_h.year between 2020 and 2022
        and fmstore.areanum > 0
        group by fmstore.Description,fmmembership_h.year,fmmembership_h.month,fmstore.areanum,fmstore.areaname,fmstore.region
        order by fmmembership_h.year,fmmembership_h.month,fmstore.region,fmstore.areanum, fmmembership_h.member_at;";
        return strval($this->sql);
     
    }


    public function getBranch() 
    {
        $arry = array ();
        foreach($this->getData() as $ds) {
            if($ds['month'] = 1 AND $ds['year'] == 2020 ) {
                $arry[] = $ds['Description'];
            }
        }
        return $arry;
    }


    public function getID() 
    {
        $arry = array ();
        foreach($this->getData() as $ds) {
            if($ds['month'] = 1 AND $ds['year'] == 2020 ) {
                $arry[] = $ds['ID'];
            }
        }
        return $arry;
    }
    

    public function dataGrid() {
         return $this->resultDataSet($this->getStmt(5));
    }

    final public function getStmt($id)
    {
      $this->sql = "select fmstore.Description, fmmembership_h.member_at,fmmembership_h.year,fmmembership_h.month,fmstore.region,fmstore.areanum, fmstore.areaname,count(fmmembership_h.isMembershipPaid=1), count(fmmembership_h.isMembershipFree=1),
        count(fmmembership_h.isReactivatePaid > 0), count(fmmembership_h.isReactivateFree=1),fmstore.ID
        from vip_system.fmstore
        join vip_system.fmmembership_h on
        fmstore.ID = fmmembership_h.member_at
        where
        fmmembership_h.year between 2020 and 2022
        and fmmembership_h.member_at = ".$id."
        and fmstore.areanum > 0
        group by fmstore.Description,fmmembership_h.year,fmmembership_h.month,fmstore.areanum,fmstore.areaname,fmstore.region
        order by fmmembership_h.year,fmmembership_h.month,fmstore.region,fmstore.areanum, fmmembership_h.member_at;";
        return strval($this->sql);
     
    }
}
?>