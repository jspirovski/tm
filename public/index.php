<?php
require_once '../include/init.php';

var_dump($session);

//if ($session->is_logged_in()) { redirect_to('dashboard.php'); }
require_once '../include/content.php';
$blog = DBContent::GetBlog();

// form has been submitted
//var_dump($_SERVER['REQUEST_METHOD']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['email']);
    $password = trim($_POST['password']);

    var_dump($username);
    var_dump($password);



    // check db to see if username/password exist
    $found_user = User::authenticate($username, $password);
    if ($found_user) {
        $session->login($found_user);
        redirect_to('dashboard.php');
    } else {
        // username/password combo was not found in database
        $message = 'Username/password combination incorrect';
    }
} else { // form was not submitted
    $username = '';
    $password = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>Track Mention</title>
    
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="wrapper">
    <div class="logo-menu-container">
        <div class="logo">Track Mention</div>
        <div class="menu">
            <ul>
                <li><a href="#" class="active">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">Blog</a></li>
                <li class="nobg"><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>

    <div class="clear"></div>
    <div class="page">
        <div class="main-banner"><img src="images/banner.jpg" alt="banner" /></div>
        <div class="clear"></div>
        <div class="left-column">
            <div class="dark-panel">
                <div class="dark-panel-top"></div>

                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="dark-panel-center">
                        <ul>
                            <li>
                                <h1>Consecte oura</h1>
                            </li>
                            <li>
                                <p>Mauris molestie iaculis tellus ino.</p>
                            </li>
                            <li class="username">
                                <label for="email" class="sr-only" hidden>Email address</label>
                                <input id="email" name="email" type="text" class="login-input" placeholder="Email address" required autofocus>
                            </li>
                            <li class="password">
                                <label for="password" class="sr-only" hidden>Password</label>
                                <input id="password" name="password" type="password" class="login-input" placeholder="Password" required>
                            </li>
                            <li class="button">
                                <input type="submit" class="button">
                            </li>
                        </ul>
                    </div>

                </form>


                <div class="dark-panel-bottom"></div>
            </div>
            <div class="light-panel">
                <div class="light-panel-top"></div>
                <div class="light-panel-center">
                    <h1>Quisque egetari</h1>
                    <ul>
                        <li><a href="#">+ Etiam nec neque nisiorn fauci</a></li>
                        <li><a href="#">+ Proin suscipit justo euismod ino</a></li>
                        <li><a href="#">+ Integer nec mi non elit gra</a></li>
                        <li><a href="#">+ Nunc a massa nulla, quis elem</a></li>
                        <li><a href="#">+ Cras iaculis felis ut quam</a></li>
                        <li><a href="#">+ Suspendisse sollicitudin enim</a></li>
                        <li class="no-border"><a href="#">+ Proin tempor magna vel sap</a></li>
                    </ul>
                </div>
                <div class="light-panel-bottom"></div>
            </div>
            <div class="dark-panel">
                <div class="dark-panel-top"></div>
                <div class="dark-panel-center">
                    <ul>
                        <li>
                            <h1>Aenean euctus</h1>
                        </li>
                        <li class="date">06-23-2012</li>
                        <li class="news">Ut quis nibh nibh, eu interdum
                            tiam nec orci ut dui tincidunt hend.</li>
                        <li class="date">06-17-2012</li>
                        <li class="news">Nam curus nunet velit molis elem<br />
                            erat ut enimfrin pretium.</li>
                        <li class="date">06-08-2012</li>
                        <li class="news-no-border">Donec estin convallis slolicit cun<br />
                            duis est trupis ligula.</li>
                    </ul>
                </div>
                <div class="dark-panel-bottom"></div>
            </div>
        </div>
        <div class="right-column">
            <div class="right-column-content">
                <div class="right-column-content-heading">
                    <h1>Mauris volutpat nulla sit amet ante</h1>
                    <h2>Pellentesque nec massa at massa condimentum rutrum quis sit amet ante. </h2>
                </div>
                <div class="right-column-content-img-left"> <img src="images/img-1.png" alt="banner" /> </div>
                <div class="right-column-content-content">
                    <p>Cras non ante eu ligula bibendum elementum vel vitae
                        lectus. Cras eu risus eu <a href="#">enim semper</a> vulputate. Integer a lorem lorem, nec convallis elit. </p>
                    <p>Nam metus justo, consequat at lacinia sit amet, adipiscing at dui. Quisque eu velit at velit accumsan suscipit sit amet ac velit. Pellentesque tempus, dolor ac tincidunt ma.</p>
                    <div class="button"><a href="#" >More Info</a></div>
                </div>
            </div>
            <div class="right-column-content">
                <div class="right-column-content-heading">
                    <h1>Sed hendrerit elit in dignissim molestie</h1>
                    <h2>Aenean vitae eros odio, eu ultricies turpis. Sed pretium nibh id diam bla. </h2>
                </div>
                <div class="right-column-content-content">
                    <p>Nam cursus nunc et velit egestas mollis. Nullam elementum hendrerit molestie. Aliquam in velit ut libero viverra eleifend lacinia sagittis tellus. Etiam eleifend nisl liquam accumsan erat ut enim fringilla pretium.</p>
                    <div class="button"><a href="#" >More Info</a></div>
                </div>
                <div class="right-column-content-img-right"> <img src="images/img-2.png" alt="banner" /> </div>
                <div class="clear right-cloumn-content-border"></div>
                <div class="right-column-content-content">
                    <p>Etiam posuere, magna volutpat auctor ultricies, est quam convallis nunc, a vehicula felis turpis vitae tellus. Donec eros arcu, sollicitudin non ultricies ut, ultrices ut lorem. Duis est turpis, porta nec porta eget, sit amet ligula. </p>
                    <div class="button"><a href="#" >More Info</a></div>
                </div>
                <div class="right-column-content-img-right right-column-content-img-right-margin-bottom-none"> <img src="images/img-3.png" alt="banner" /> </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-wrapper">
    <div class="footer-top"></div>
    <div class="footer-center">
        <div class="footer-content-left">
            <h1>In tempor aliquam purus eu sagittis</h1>
            <h2>Sed ultrices tristique magna non accumsan massa vel libero posuere sagitt nisi</h2>
            <p>Aenean sit amet leo elit, nec ornare felis. Fusce laoreet sapien id ipsum pharetra varius. Integer a turpis tortor. Aliquam ac dignissim nibh. Mauris at posuere felis. Proin egestas, dolor ut imperdiet porta, velit lorem luctus massa, a pharetra felis lorem a nulla. </p>
            <p>Vivamus vel augue et nibh accumsan tempus nec sed metus. Nam porta massa non sapien congue lobortis. Nam pulvinar suscipit tellus id vestibulum. </p>
        </div>
        <div class="footer-content-right">
            <h1>Nullam eleme</h1>
            <h2>Nam fermentum ornare dui</h2>
            <p>Proin egestas, dolor ut imperdiet porta, velit lorem luctus massa, a pharetra felis lorem a nulla  ivam.</p>
            <h3>Email: info@untitled.com</h3>
            <h3>Phone: (800) 555-0000</h3>
        </div>
    </div>
    <div class="footer-bottom"></div>
</div>
<div class="clear"></div>
<div class="copyrights">Copyright (c) Untitled. Design by wwww.alltemplateneeds.com . Photos by photorack.net
    <div class="copyrights-bottom"></div>
</div>
</body>
</html>

