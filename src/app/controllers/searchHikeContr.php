<?php $title = "Search Hikes"; ?>
<?php require "app/views/parts/head.php"; ?>
<?php include 'app/views/header.php'; ?>
<?php include 'app/views/parts/styleCard.php'; ?>
<section class="section hike-list">
    <div class="columns is-centered flex">
        <?php
        $db = new MyPDO();
        $difficulty = $_POST["difficulty"];
        $tagId = $_POST["tag"];
        $search = "%" . $_POST["search"]. "%";
        $searchHikes = $db->prepare('SELECT users.firstname, users.lastname, users.nickname, hikes.id, hikes.name, hikes.difficulty, hikes.creation_date, hikes.distance, hikes.duration, hikes.elevation, hikes.description, hikes.url FROM users 
        INNER JOIN hikes ON users.id = hikes.user_id
        INNER JOIN hikes_tags ON hikes.id = hikes_tags.id_hike
        WHERE hikes.difficulty=:difficulty AND hikes_tags.id_tag=:tagId AND
        (hikes.name LIKE :search OR hikes.description LIKE :search)
        ORDER BY hikes.id DESC');
        $searchHikes->bindParam(':difficulty', $difficulty, PDO::PARAM_STR);
        $searchHikes->bindParam(':tagId', $tagId);
        $searchHikes->bindParam(':search', $search);
        $searchHikes->execute();
        while ($hike = $searchHikes->fetch()) {
            include 'app/views/parts/cardHike.php';
        };
        ?>
    </div>
</section>
<?php include "footer.php"; ?>