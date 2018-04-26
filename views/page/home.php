<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 24.04.18
 * Time: 12:41
 */
?>
<!-- showing message -->

<?php if($msg != "") { ?>
    <div id = "message" class="<?php echo $msg_type;?>">
        <?php if($msg_img != "") { ?><img src="images/<?php echo $msg_img;?>" /><?php } ?>
        <div id="msg_txt"><?php echo $msg;?></div>
    </div>
<?php }?>


<?php if (count($users)>0){?>
    <div class="p_box">
        <?php
            echo "user id: ".$users[0]['id']."<br />email: ".$users[0]['email']."<br />status:";
            echo(($users[0]['active'])?"Active":"Not active");
        ?>
        <br />
        <a href="index.php?controller=user&action=logout">logout</a>
    </div>
<?php }?>