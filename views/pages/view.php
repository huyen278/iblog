<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?php echo ($data['data']['data']['title']); ?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted by <?php echo ($data['data']['data']['author']); ?></div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="/category/<?php echo $data['data']['data']['cateslug']; ?>"><?php echo htmlspecialchars($data['data']['data']['category']); ?></a>
                </header>
                <code> <?php echo ($data['data']['data']['brief']); ?> </code>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded thumb" src="/assets/public_img/<?php echo $data['data']['data']['img']; ?>" alt="thumb" /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <?php echo "haha\r\n" . $data['data']['data']['content']; ?>
                </section>
            </article>
            <!--Post comment-->
            <form action="/post/comment" method="POST">
                <div class="form-group">
                    <textarea class="form-control" id="comment" name="comment" rows="3" placeholder="Place your comment" required></textarea>
                </div>
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                <input type="hidden" name="slug" value="<?php echo $data['data']['slug']; ?>" />
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Comment</button>
            </form>
            <div class="container">
                <?php
                foreach ($data['data']['comment'] as $key => $value) {
                    echo '<hr class="mt-2 mb-5">';
                    echo '<div class="row">';
                    echo '<p>' . $value['comment'] . '</p>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>