<?php
session_start();
if (isset($_SESSION["user"])) { ?>
    <a class="button is-primary is-small" href="logout">
        <!-- data-target="modal-signup" -->
        <strong>Log out</strong>
    </a>
    <a class="button is-light is-small" href="profile">
        <!-- data-target="modal-login" -->
        <?php echo $_SESSION["user"]["login"]; ?>
    </a>
<?php } else { ?>
    <a class="button is-primary is-small" href="register">
        <!-- data-target="modal-signup" -->
        <strong>Sign up</strong>
    </a>
    <a class="button is-light is-small" href="login">
        <!-- data-target="modal-login" -->
        Login
    </a>
<?php } ?>