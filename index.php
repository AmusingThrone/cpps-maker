<?php

require_once 'config.php';

if (!$installedSetting) {
	header("Location: /install.php", TRUE, 301);
}

$pageName = "Home";

?>

<?php include 'header.php'; ?>

<body>

    <header>
        <h1><a href="#"><?php echo $siteName; ?></a></h1>
        <nav>
            <li><a href="/">Home</a></li>
            <li><a href="/register/">Register</a></li>
            <li><a href="/play/">Play</a></li>
        </nav>
    </header>

    <section class="ice">
        <div class="background-image"></div>
        <h1><?php echo $siteName; ?></h1>
        <h3><?php echo $siteTitle; ?></h3>
        <a href="/play/" class="btn">Play Now!</a>
        <br />
    </section>

    <footer>
        <ul>
            <li><a href="<?php echo $siteAddress;?>"><i class="fa fa-rss-square"></i></a></li>
            <li><a href="<?php echo $socialTwitter;?>" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            <li><a href="https://github.com/amusingthrone/cpps-maker" target="_blank"><i class="fa fa-github-square"></i></a></li>
        </ul>
        <p>Powered by <a href="https://github.com/AmusingThrone/cpps-maker" target="_blank">CPPS-Maker</a>.</p>
        <small>CPPS-Maker and it's authors hold no responsibility over the content of this site.</small>
        <br>
        <p>&copy; 2017 <?php echo $siteName; ?>.</p>
        <p style="margin-top: -8px;"><?php echo $siteName; ?> is an educational instance. We do not hold copyright for any of the files.</p></p>
    </footer>

</body>

</html>