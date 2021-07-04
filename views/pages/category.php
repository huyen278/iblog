<div class="container">
    <h2>Recent</h2>
    <div class="row">
        <?php
        if (isset($data["data"])) {
            foreach ($data["data"]["posts"] as $key => $value) {
                echo '<div class="col-sm-3">';
                echo '<div class="card">';
                echo '<img class="card-img-top" src="' . $value["img"] . '" alt="Card image cap">';
                echo '<div class="card-body">';
                echo '<a href="/post/show/' . $value['slug'] . '">';
                echo '<h5 class="card-title">' . htmlspecialchars($value["title"]) . '</h5>';
                echo '</a>';
                echo '<p class="card-text">' . htmlspecialchars($value["brief"]) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>