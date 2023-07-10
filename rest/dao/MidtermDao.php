<?php
require_once "BaseDao.php";

class MidtermDao extends BaseDao {

    public function __construct(){
        parent::__construct();
    }

    /** TODO
    * Implement DAO method used to add content to database
    */
    public function input_data($data){
       $data=file_get_contents("IP2LOCATION.json");
       $products=json_decode($jdata, JSON_OBJECT_AS_ARRAY);
       $stmt = $this->conn->prepare("INSERT INTO midtermfinal(from, to, code, country, region, city)
       VALUES(?,?,?,?,?,?)
       ");
       $stmt->bind_param("ssdi", $from, $to, $code, $country, $region, $city);
       
       $rows=0;
       foreach($products as $data) {
        $from = $data["from"];
        $to = $data["to"];
        $code = $data["code"];
        $country = $data["country"];
        $region = $data["region"];
        $city = $data["city"];

        $stmt->execute();
        $rows++;

       }
    }

    /** TODO
    * Implement DAO method to return summary as requested within route /midterm/summary
    */
    public function summary(){
        $stmt = $this->conn->prepare("SELECT COUNT(DISTINCT(country)), COUNT(DISTINCT(region)), COUNT(DISTINCT(city))
        FROM midtermfinal;
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    /** TODO
    * Implement DAO method to return report as requested within route /midterm/report_per_country
    */
    public function report_per_country(){
        $stmt = $this->conn->prepare("SELECT country, COUNT(city))
        FROM midtermfinal
        GROUP BY country;
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /** TODO
    * Implement DAO method to return location as requested within route /midterm/search
    */
    public function search($from, $to){
        $query = "SELECT country, region, city FROM midtermfinal WHERE from = :from AND to=:to ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':from', $from, PDO::PARAM_STR);
        $stmt->bindParam(':to', $to, PDO::PARAM_STR);

        $stmt->execute();
            
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
