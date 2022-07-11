<?php
include("b.php");
if(isset($REQ["update"]) && $REQ["update"] == "true"):
    header( "Location: /update.php?version=".$ipp->version()->content->version);
    die();
endif;
echo head();

if($_ENV["VERSION"] < $ipp->version()->content->version):
    ?>
    <div class="alert alert-warning" role="alert"><?=$lang["PARTNER"]["DASHBOARD"]["OUTDATED_VERSION"]?><a href='?update=true'><?=$lang["PARTNER"]["DASHBOARD"]["UPDATE_HERE"]?></a></div>
    <?php foreach($ipp->ListVersions() as $key=>$value):
    if($_ENV["VERSION"] < $key):
        echo "<div class='alert alert-warning' role='alert'><h3>$key - $value</h3><p>";
        $pageDocument = @file_get_contents("https://raw.githubusercontent.com/IPPWorldwide/MerchantPortal/".$key."/CHANGES.md");
        if ($pageDocument !== false):
            echo nl2br($pageDocument);
        endif;
        echo "</p></div>";
    endif;
endforeach;
endif;

echo foot();

