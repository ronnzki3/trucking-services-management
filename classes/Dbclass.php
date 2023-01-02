<?php 

class Dbclass{

    private $host='localhost';
    private $user='root';
    private $pass='';
    private $dbname='lxap';
    private $conn='';
    private $result=array();
    
    
    public function __construct(){
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );
    }


    public function select($table, $rows='*', $where = null){
        if($where==null){
            $q="SELECT $rows FROM $table";
        }else{
            $q="SELECT $rows FROM $table WHERE $where";
        }        
        $result = $this->conn->query($q); 
        return $result;
    }


    public function custom_select($query){
        $result = $this->conn->query($query); 
        return $result;
    }

    public function insert($table, $param = array()){
        $tableColumns = implode(',' , array_keys($param) );
        $tableValues = implode("','" , $param );
        $sql = " INSERT INTO $table ($tableColumns) VALUES ('$tableValues') ";
        $result = $this->conn->query($sql);
    }



    public function update($table, $param = array(), $id){
        $args=array();

        foreach($param as $key => $value){
            $args[]= "$key = '$value'";
        }
        $sql = "UPDATE $table SET ".implode(',' , $args). " WHERE $id";

        $result=$this->conn->query($sql);
    }



    public function delete($table,$id){

        $sql="DELETE FROm $table WHERE $id";

        $result = $this->conn->query($sql);
    }


    public function select_orderby($table, $rows='*', $orderby){
        $q="SELECT $rows FROM $table $orderby";    
        $result = $this->conn->query($q); 
        return $result;
    }


    public function __destruct(){
        $this->conn->close();
    }

}


?>