<div class="container">
    <h2>Recent</h2>
    <div class="row">
        <?php
        if (isset($data["data"])) {
            foreach ($data["data"]["recent"] as $key => $value) {
                echo '<div class="col-sm-3">';
                echo '<div class="card">';
                echo '<img class="card-img-top" src="' . $value["img"] . '" alt="Card image cap">';
                echo '<div class="card-body">';
                echo '<a href="./Error">';
                echo '<h5 class="card-title">' . $value["title"] . '</h5>';
                echo '</a>';
                echo '<p class="card-text">' . $value["brief"] . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
    <h2>Most view</h2>
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <img class="card-img-top" src="./assets/icon/logo.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        </div>
    </div>
</div>