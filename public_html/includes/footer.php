<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<footer>
    <div class="container">
        <?php
        require ('./clases/PasswordHash.class.php');
        require ('./bd/Local.php');
        $hash_cost_log2 = 8;
        $hash_portable = FALSE;
        $pass = 'admin';
        $pass2 = 'user';
        $hasher = new PasswordHash($hash_cost_log2, $hash_portable);
        $hash = $hasher->HashPassword($pass);
        $hash2 = $hasher->HashPassword($pass2);
        print '<p>Admin: ' . $hash . "</p>";
        print '<p>User: ' . $hash2 . "</p>";
        echo Setting::HOSTNAME;
//        if ($hasher->CheckPassword($pass, $hash)) {
//            $what = 'Authentication succeeded';
//        } else {
//            $what = 'Authentication failed';
//        }
        unset($hasher);
        unset($hasher2);
        echo phpinfo(32);
        //     echo "$what\n";
        ?>
        <p>Designed and built with all the love in the world by <a href="http://twitter.com/mdo" target="_blank">@mdo</a> and <a href="http://twitter.com/fat" target="_blank">@fat</a>.</p>
        <p>Code licensed under <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
        <p><a href="http://glyphicons.com">Glyphicons Free</a> licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
        <ul >
            <li><a href="http://blog.getbootstrap.com">&middot;Blog</a></li>
            <li><a href="https://github.com/twitter/bootstrap/issues?state=open">&middot;Issues</a></li>
            <li><a href="https://github.com/twitter/bootstrap/blob/master/CHANGELOG.md">&middot;Changelog</a></li>
        </ul>
    </div>
</footer>
</body>

<script>
    var _gaq = [['_setAccount', 'UA-XXXXX-X'], ['_trackPageview']];
    (function(d, t) {
        var g = d.createElement(t), s = d.getElementsByTagName(t)[0];
        g.src = ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g, s)
    }(document, 'script'));
</script>

</html>