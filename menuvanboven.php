<div class="menuvanboven">


    <ul>
        <a href="index.php"><img  src="Finished.png" alt="logo"></a>
        <?php
        if(isset($_SESSION['username'])){
            echo " <a class=\"circle\" href=\"#\">+</a>";
        }?>
        <a class="zoeken" href="#">  <i class="fa fa-search fa-2x" aria-hidden="true"></i> Zoeken</a>
        <?php

        if (isset($_SESSION['username']))
        {
            $gebruiker = $_SESSION['username'];
            ?>


            <li><a id="welkom" style="cursor:pointer" value="play"><?php echo htmlspecialchars($gebruiker, ENT_QUOTES, 'UTF-8'); ?></a></li>
            <?php
        }
        else
        {
            ?>
            <li><a id="signupknop" style="cursor:pointer" value="play">Sign up</a></li>
            <li><a id="loginknop" style="cursor:pointer" value="play">Login</a></li>
            <?php
        }
        ?>
    </ul>

</div>