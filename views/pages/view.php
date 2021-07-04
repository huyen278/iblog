<?php var_dump($data['data']['data']); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?php echo htmlspecialchars($data['data']['data']['title']); ?></h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted by <?php echo htmlspecialchars($data['data']['data']['author']); ?></div>
                    <!-- Post categories-->
                    <a class="badge bg-secondary text-decoration-none link-light" href="/category/<?php echo $data['data']['data']['cateslug']; ?>"><?php echo htmlspecialchars($data['data']['data']['category']); ?></a>
                </header>
                <code> <?php echo htmlspecialchars($data['data']['data']['brief']); ?> </code>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded thumb" src="<?php echo $data['data']['data']['img']; ?>" alt="thumb" /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <?php echo "haha\r\n" . $data['data']['data']['content']; ?>
                </section>
            </article>
        </div>
    </div>
</div>