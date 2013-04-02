<!-- slider-holder -->
<div class="slider-holder">
    <div class="container">

        <!-- shell -->
        <div class="shell">
            <ul id="sb-slider" class="sb-slider">
                <li>
                    <a href="../img/slider/1.jpg" target="_blank"><img src="img/slider/1.jpg" alt="image1"/></a>
                    <div class="sb-description">
                        <h3>Creative Lifesaver</h3>
                    </div>
                </li>
                <li>
                    <a href="../img/slider/2.jpg" target="_blank"><img src="img/slider/2.jpg" alt="image2"/></a>
                    <div class="sb-description">
                        <h3>Honest Entertainer</h3>
                    </div>
                </li>
                <li>
                    <a href="http://www.flickr.com/photos/strupler/2968114825" target="_blank"><img src="img/slider/3.jpg" alt="image1"/></a>
                    <div class="sb-description">
                        <h3>Brave Astronaut</h3>
                    </div>
                </li>
                <li>
                    <a href="http://www.flickr.com/photos/strupler/2968122059" target="_blank"><img src="img/slider/4.jpg" alt="image1"/></a>
                    <div class="sb-description">
                        <h3>Affectionate Decision Maker</h3>
                    </div>
                </li>
                <li>
                    <a href="http://www.flickr.com/photos/strupler/2969119944" target="_blank"><img src="img/slider/5.jpg" alt="image1"/></a>
                    <div class="sb-description">
                        <h3>Faithful Investor</h3>
                    </div>
                </li>
                <li>
                    <a href="http://www.flickr.com/photos/strupler/2968126177" target="_blank"><img src="img/slider/6.jpg" alt="image1"/></a>
                    <div class="sb-description">
                        <h3>Groundbreaking Artist</h3>
                    </div>
                </li>
                <li>
                    <a href="http://www.flickr.com/photos/strupler/2968945158" target="_blank"><img src="img/slider/7.jpg" alt="image1"/></a>
                    <div class="sb-description">
                        <h3>Selfless Philantropist</h3>
                    </div>
                </li>
            </ul>
            <div id="shadow" class="shadow"></div>
            <a href="#" class="slider-btn">Explore Our Showcase</a>
        </div>	
    </div>	
</div>

<!-- Example row of columns -->
<div class="container">
    <div class="row">
        <div class="span4">
            <h2>Heading</h2>
            <a href="javascript:window.lang.change('en');">En Espa&ntilde;ol</a> | <a href="javascript:window.lang.change('es');">Switch to English</a>
            <?php
            if (isset($_SESSION['login']))
                echo $_SESSION['login'];
            include_once './bd/queries.sql.php';
            $test = "usuario";
            $db_connect = new queries();
            //$test=$db_connect->muestraPass($test);
            $db_connect->muestraPass($test);
            
//            require ('./clases/PasswordHash.class.php');
//            $hash_cost_log2 = 8;
//            $hash_portable = FALSE;
//            $pass = 'admin';
//            $pass2 = 'user';
//            $hasher = new PasswordHash($hash_cost_log2, $hash_portable);
//            $hash = $hasher->HashPassword($pass);
//            $hash2 = $hasher->HashPassword($pass2);
//            print '<p>Admin: ' . $hash . "</p>";
//            print '<p>User: ' . $hash2 . "</p>";
//            unset($hasher);
//            unset($hasher2);
//            echo phpinfo(32);
//            echo "$what\n";
            ?>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
            <h2>Heading</h2>
            <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
            <h2>Heading</h2>
            <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
    </div>
</div><!-- /container -->