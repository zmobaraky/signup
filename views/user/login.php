<?php
/**
 * Created by PhpStorm.
 * User: zahra
 * Date: 24.04.18
 * Time: 22:26
 */

?>
<div id="header">
    <h3>Login / Sign up</h3>
</div>
<div id="wrap">
    <h3>Login / Signup Form</h3>
    <p>Please enter your name and email addres to create your account</p>
    <div id="msg">
    </div>
    <!-- start sign up form -->
    <form id="login" action="process.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="example@domain.com" />
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="" />

        <input type="button" class="submit_button" value="Login" />
    </form>
    <!-- end sign up form -->
</div>
