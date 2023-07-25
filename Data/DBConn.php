<?php

namespace Data;

class DBConn {

    public $dbConnect;

    public function __construct() { }

    public function connect()
    {
        try {
            $dbConnect = mysql_connect("127.0.0.1", "root","password");
            mysql_select_db("vip_system");
            return $dbConnect;
        } catch(Exception $e)  {
            $dbConnect = die();
            return $dbConnect;
        }
    }

    public function resultDataSet($qry) 
    {
        $arry = array();
        $res = mysql_query($qry,$this->connect());
        while($row = mysql_fetch_assoc($res)) {
            $arry[] = $row;
        }
        return $arry;
    }


}
?>