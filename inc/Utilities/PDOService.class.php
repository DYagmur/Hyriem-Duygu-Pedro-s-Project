<?php

class PDOService {

private $_host = DB_HOST;
private $_user = DB_USER;
private $_pass = DB_PASS;
private $_dbname = DB_NAME;

private $_dbh;
private $_error;

private $_className;
private $_pstmt;

public function __construct(string $className) {
    $this->_className = $className;

    $dsn = 'mysql:host=' . $this->_host . ';dbname=' . $this->_dbname;
    $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
        $this->_dbh = new PDO($dsn, $this->_user, $this->_pass, $options);
    } catch (PDOException $pe) {
        $this->_error = $pe->getMessage();
        // You can handle the error here or throw an exception
        throw new Exception("Database connection error: " . $this->_error);
    }
}

public function query(string $query) {
    if (!$this->_dbh) {
        // Handle the case where the database connection is not established
        throw new Exception("No database connection.");
    }

    $this->_pstmt = $this->_dbh->prepare($query);
}

    //This function binds parameters
    public function bind($param, $value, $type=null)    {

        if (is_null($type)) {  
            switch (true) {
                //If the value is an integer
                case is_int($value):  
                $type = PDO::PARAM_INT;  
                break;  
                //If the value is a boolean
                case is_bool($value):  
                $type = PDO::PARAM_BOOL;  
                break;  
                //If the value is null
                case is_null($value):  
                $type = PDO::PARAM_NULL;  
                break;  
                //If nothing else the value must be a string
                default:  
                $type = PDO::PARAM_STR;  
                }  
            }
            
        //Finally lets bind the paremter
        $this->_pstmt->bindValue($param, $value, $type);  

    }

    //This function will excute the statement when its ready.
    public function execute()   {
        return $this->_pstmt->execute();
    }

    //This function will return the result of the executed query
    public function resultSet() {
        
        //Return Classes!g-
        return $this->_pstmt->fetchAll(PDO::FETCH_CLASS, $this->_className);
    }

    //This function will return a single result of the executed Query
    public function singleResult()  {

        //Set the fetch mode
        $this->_pstmt->setFetchMode(PDO::FETCH_CLASS, $this->_className);
        //Return the result
        return $this->_pstmt->fetch(PDO::FETCH_CLASS);
    }

    //This function returns the rowCount
    public function rowCount()  {
        return $this->_pstmt->rowCount();
    }

    //This function will return the last inserted Id
    public function lastInsertedId()  {
        return $this->_dbh->lastInsertId();
    }

}