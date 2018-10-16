<?php
class DB{
    var $_pdo;
    /**
     * Constructor
     */
    function __construct($dns, $user, $password){
        $this->_pdo = new PDO($dns, $user, $password);
    }
    /**
     * Return PHP PDO instance
     */
    function getPDO(){
        return $this->_pdo;
    }
    
    /**
     * PDO Execute query
     */
    function exec($query){
        return $this->_pdo->exec($query);
    }
    
    /**
     * PDO Prepare query
     */
    function prepare($query){
        return $this->_pdo->prepare($query);
    }
    
    /**
     * PDO Execute query
     */
    function query($query){
        return $this->_pdo->query($query);
    }
    /**
     * PDO Load data directly from a query
     */
    function getData($query){
        $response = $this->query($query);
        $output = array();
        while($data = $response->fetch()){
            $item = array();
            foreach($data as $key => $value){
                $item[$key] = $value;
            }
            $output[count($output)] = $item;
        }
        return $output;
    }
}
$DB = new DB('mysql:host=localhost;dbname=phpProject', 'ryan', '');