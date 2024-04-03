<?php
require_once('utils/common.php');
session_start();
noMagicQuotes();

if (!empty($_REQUEST['username']) && !empty($_REQUEST['mdp'])) {
    $db = initDatabase();
    $sql = "SELECT * FROM Admin "
        ."WHERE username='".$_POST['username']."' AND mdp='".$_POST['mdp']."'";

    if (!empty($db->query($sql)->fetchAll(PDO::FETCH_OBJ))) {
        $_SESSION['admin'] = $db->query($sql)->fetchAll(PDO::FETCH_OBJ)[0];
        // redirection (syntaxe incorrecte, il faut normalement une URL complète)
        //echo "reussir";
        header('Location: gestion');
        exit();
    }else{
        echo '<div id="errorMessage"><p>"error sur le username ou password"</p></div>';
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
    <title>login</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="js/login.js"></script>
    <link href="css/loginCSS/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" href="css/loginCSS/styleLogin.css" type="text/css" media="all">
</head>
<body>
<h1>Anomic Elements</h1>
<div class="w3layoutscontaineragileits">
    <h2>ADMIN LOGIN</h2>

    <form action="" method="POST" onsubmit="return chkinput(this)">

        <input name="username" type="username" placeholder="USERNAME" value="<?php if (isset($_REQUEST['username'])) { echo $_REQUEST['username']; } ?>" /> <br />
        <input name="mdp" type="password" placeholder="PASSWORD" value="" /> <br />

        <div class="aitssendbuttonw3ls">
            <input type="submit" value="S'authentifier"/>
            <div class="clear"></div>
        </div>
    </form>
</div>
<!-- for register popup -->
<div id="small-dialog1" class="mfp-hide">
    <div class="contact-form1">
        <div class="contact-w3-agileits">

            <form action="#" method="post">
                <div class="form-sub-w3ls">
                    <input placeholder="User Name" type="text" required>
                    <div class="icon-agile">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3ls">
                    <input placeholder="Email" class="mail" type="email" required>
                    <div class="icon-agile">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3ls">
                    <input placeholder="Password" type="password" required>
                    <div class="icon-agile">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="form-sub-w3ls">
                    <input placeholder="Confirm Password" type="password" required>
                    <div class="icon-agile">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="login-check">
                    <label class="checkbox"><input type="checkbox" name="checkbox" checked="">I Accept Terms & Conditions</label>
                </div>
                <div class="submit-w3l">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

<!-- pop-up-box-js-file -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--//pop-up-box-js-file -->
<script>

</script>

<!--
<h1>Admin login</h1>
<form action="" method="POST" onsubmit="return chkinput(this)">

        Login : <input name="username" type="text" value="<?php if (isset($_REQUEST['username'])) { echo $_REQUEST['username']; } ?>" /> <br />
        Mot de passe : <input name="mdp" type="password" value="" /> <br />
        <button type="submit" name="ok" value="1">S'authentifier</button>


</form>

-->
</body>
</html>
