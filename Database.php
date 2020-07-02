
 <?php
 class Database{
private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname='lr';
        public $pdo;
// Create connection
public function __construct()
{
            try {
                $conn = new PDO("mysql:host=".$this->servername.";dbname=".$this->dbname, $this->username, $this->password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $conn->exec("SET CHARACTER SET utf8");
                $this->pdo=$conn;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }}}
    
?>
