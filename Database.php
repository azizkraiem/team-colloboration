<?php
  /*
   * PDO Database Class
   * Connect to database
   * Create prepared statements
   * Bind values
   * Return rows and results
   */
  class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct(){
      // Set DSN
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      // Create PDO instance
      try{
        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
      } catch(PDOException $e){
        $this->error = $e->getMessage();
        echo $this->error;
      }
    }

    // Prepare statement with query
    public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null){
      if(is_null($type)){
        switch(true){
          case is_int($value):
            $type = PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
            break;
          default:
            $type = PDO::PARAM_STR;
        }
      }

      $this->stmt->bindValue($param, $value, $type);
    }

    //create table if not exsit
    public function createTableUserIfNotExsit(){
      try {
        $this->stmt->exec(
          'CREATE TABLE IF NOT EXISTS membres (
          id smallint(5) unsigned NOT NULL AUTO_INCREMENT,
          nom varchar(50) COLLATE latin1_general_ci NOT NULL,
          prenom varchar(50) COLLATE latin1_general_ci NOT NULL,
          mdp varchar(50) COLLATE latin1_general_ci NOT NULL, //mdp Case Insensitive + sha1
          email varchar(50) NOT NULL,
          date_inscription int(11) unsigned NOT NULL,
          time_connection int(11) unsigned NOT NULL, -- stocke le timestamp correspondant à la dernière connexion du personnage
          actif int(11) unsigned NOT NULL,
          PRIMARY KEY (`id`)
          ) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;');

      } catch (PDOException $e) {
        echo 'Erreur PDO : '.$e->getMessage();
      }
     
    }
    // Execute the prepared statement
    public function execute(){
      return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function resultSet(){
      $this->execute();
      return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function single(){
      $this->execute();
      return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount(){
      return $this->stmt->rowCount();
    }
  }