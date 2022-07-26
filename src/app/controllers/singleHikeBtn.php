<?php
session_start();
if ($_SESSION["user"]["id"] == $shike['user_id'] || $_SESSION["user"]["permission"] == "administrateur") {
    $_SESSION["editHike"]["name"] = $shike["name"];
    $_SESSION["editHike"]["difficulty"] = $shike["difficulty"];
    $_SESSION["editHike"]["distance"] = $shike["distance"];
    $duration = explode('h', $shike["duration"]);
    $_SESSION["editHike"]["durationH"] = $duration[0];
    $_SESSION["editHike"]["durationM"] = $duration[1];
    $_SESSION["editHike"]["elevation"] = $shike["elevation"];
    $_SESSION["editHike"]["description"] = $shike["description"];
    $_SESSION["editHike"]["userId"] = $shike["user_id"];
?>
<style>
    .flex {
display: flex;
flex-wrap: wrap;
    }
</style>
    <div class="has-text-centered columns flex">
        <form method="post" class="column has-text-right" action="addHike" style="width:fit-content;">
            <button class="button is-primary" type="submit" name="edit" value="<?= $shike['id']; ?>">Edit</button>
        </form>
        <form method="post" class="column has-text-left" action="delHike" style="width:fit-content;">
            <button class="button is-danger" type="submit" name="delete" value="<?= $shike['id']; ?>">Delete</button>
        </form>
    </div>
<?php }; ?>