<?php

$version = "0.1";
$homeurl = "http://" . $_SERVER['HTTP_HOST'] . preg_replace("/\/install\.php/i", "", $_SERVER['REQUEST_URI']);
if (preg_match('/localhost/i', $homeurl) || preg_match("/^192\.168/i", $homeurl) || preg_match("/^10\.2\./i", $homeurl) || preg_match("/^127\.0\.0/i", $homeurl)) {
    $testing = 1;
}

function save_config($user, $pass, $name, $tagline, $email, $social, $siteAddr, $host, $db_name) {
    file_put_contents('config.php', '
<?php
    class Database {

        private $host = "' . $host . '";
        private $db_name = "' . $db_name . '";
        private $username = "' . $user . '";
        private $password = "' . $pass . '"; 
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
    $siteName = "' . $name . '";
    $siteTitle = "' . $tagline . '";
    $siteAddress = "' . $siteAddr . '";
    $siteVersion = "' . $version . '";
    $adminEmail = "' . $email . '";
    $socialTwitter = "' . $social . '";

?>

        ');
}

function generate_password($length = 12) {

    srand((double) microtime() * 1000000);
    $possible = "0123456789" .
        "@!%^&" .
        "abcdefghijklmnopqrstuvwxyz" .
        "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $str = "";
    while (strlen($str) < $length) {
        $str .= substr($possible, rand(0, 50), 1);
    }
    return ($str);

}

?>
<!-- INSTALL BEGINS HERE -->

<!DOCTYPE html>
<html>

<head>
    <title>CPPS-Maker | Installation</title>
</head>

<style>
body {
    background-color: #1755b7;
}

.install {
    position: relative;
    justify-content: center;
    min-height: 100vh;
    color: black;
    text-align: center;
}
.install h1 {
    font: bold 60px 'Open Sans', sans-serif;
    margin-bottom: 15px;
    color: #c6cbd3;
}

.install p {
    font: 14px 'Open Sans', sans-serif;
    margin-bottom: 10px;
    color: #c6cbd3;
}
</style>
<body>
<div class="install">
<h1>CPPS-Maker Installation</h1>
<p>Thanks for downloading ICE-CPPS Maker. Welcome to the installation page.</p>
</div>
</body>
</html>

<?php

echo $homeurl . "\n" . generate_password(2);
save_config("root", "", "CPPS-Maker", "A unique CPPS with a fun and growing community.", "admin@localhost", "https://twitter.com", $homeurl, "localhost", "cpps")

?>
