<div style="overflow-y: scroll;" class="receptdiv" id="rec<?= $xrec ?>"><!--dit is waar wij divs genereren bij het clicken op recepten-->
    <b><a id="titelreceptdiv"><?=$row['naam']?></a></b>
    <?php

    for($x=0;$x<5;$x++){
        echo '<div onclick="ster'.$x.$xrec.'();" id="'.$x.$xrec.'ster" class="ratezelf">
                    <img onclick="ster'.$x.'();" width="30px" height="30px"		
	src="http://icons.iconarchive.com/icons/icons8/christmas-flat-color/256/star-icon.png"></div>';
        echo '<script>function ster'.$x.$xrec.'(){';
        for($y=0;$y<$x+1;$y++){
            echo '
		document.getElementById("'.$y.$xrec.'ster").style.opacity = "1";';
        }
        for($y=$x+1;$y<6;$y++){
            echo '
		document.getElementById("'.$y.$xrec.'ster").style.opacity = "0.3";';
        }
        echo "}</script>";
    }?>
    <?php if($admin) : ?>
        <a class="deleterecept" onclick='javascript:confirmationDelete($(this));return false;' href='verwijderrecept.php?id=<?=$xrec?>'>Verwijder recept</a>

    <?php endif; ?>
    <div class="bereiding">
        <a><?=$row['bereiding']?></a>
    </div>

</div>