<?php
include("../b.php");
if(isset($REQ["section"])) {
    $menu = [];
    foreach($REQ["menus"] as $value)
        $menu[$value["url"]] = $value["value"];
    $current_menu = json_decode($IPP_CONFIG["MENU"]);
    $current_menu->{strtoupper($REQ["section"])} = $menu;
    include(BASEDIR . "controller/IPPConfig.php");
    $config = new IPPConfig();
    $new_config = $config->UpdateConfig("MENU",json_encode($current_menu));
    $config = $config->WriteConfig();
    die();
}

$MENU = json_decode($IPP_CONFIG["MENU"]);

echo head();
?>
<h2>Menu Partners</h2>
<div class="row">
    <div class="col-6">
        <div class="canvas dropzone" data-menu="partner">
            <ul>
                <?php
                foreach($MENU->PARTNER as $key=>$value) {
                    echo "<li class='add-element' data-url='".$key."'><span class='menuitem'>".$value."</span>  <span class='removeItem'>(Remove)</span></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="col-6">
        <div class="navbar">
            <ul>
            <?php
            foreach($menu->std_menu["PARTNER"] as $key=>$value) {
                echo "<li class='add-element' data-url='".$key."'><span class='menuitem'>".$value."</span></li>";
            }
            ?>
            </ul>
        </div>
    </div>
</div>

<h2>Menu Companies</h2>
<div class="row">
    <div class="col-6">
        <div class="canvas dropzone" data-menu="company">
            <ul>
                <?php
                foreach($MENU->COMPANY as $key=>$value) {
                    echo "<li class='add-element' data-url='".$key."'><span class='menuitem'>".$value."</span>  <span class='removeItem'>(Remove)</span></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="col-6">
        <div class="navbar">
            <ul>
                <?php
                foreach($menu->std_menu["COMPANY"] as $key=>$value) {
                    echo "<li class='add-element' data-url='".$key."'><span class='menuitem'>".$value."</span></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<?php

echo foot();