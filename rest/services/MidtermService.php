<?php
require_once __DIR__."/../dao/MidtermDao.php";

class MidtermService {
    protected $dao;

    public function __construct(){
        $this->dao = new MidtermDao();
    }

    /** TODO
    * Implement service method to add content to database
    */
    public function input_data($data){
        return $this->dao->input_data($data);
    }

    /** TODO
    * Implement service method for route /midterm/summary
    */
    public function summary(){
        return $this->dao->summary();
    }
    /** TODO
    * Implement service method for route /midterm/report_per_country
    */
    public function report_per_country(){
        return $this->dao->report_per_country();
    }

    /** TODO
    * Implement service method for route /midterm/search
    */
    public function search($from, $to){
        return $this->dao->summary($from, $to);
    }
}
?>
