
<?php
    class Database {

        private $host = "localhost";
        private $db_name = "cpps";
        private $username = "root";
        private $password = ""; 
        public $conn;

        public function dbConnection()
        {

            $this->conn = null;
            try
            {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $exception)
            {
                echo "Cannot connect to MySQL: " . $exception->getMessage();
            }

            return $this->conn;
        }
    }

    $installedSetting = True;
    $siteName = "CPPS-Maker";
    $siteTitle = "A unique CPPS with a fun and growing community.";
    $siteAddress = "http://cpps.dev";
    $siteVersion = "";
    $adminEmail = "admin@localhost";
    $socialTwitter = "https://twitter.com";

?>

        