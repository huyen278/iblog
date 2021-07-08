<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <!-- List group -->
                <div class="list-group" id="myList" role="tablist">
                    <a class="list-group-item list-group-item-action active" data-toggle="list" href="#home" role="tab">Home</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#create" role="tab">Create new</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#posts" role="tab">Posts</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#gallery" role="tab">Gallery</a>
                    <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab">Profile</a>
                </div>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab -->
                <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">Overview</h1>
                    </div>
                    <p>
                        Ở đây là trang chủ dashboard :)) bình thường sẽ là chart, total post, total view, blah blah,...
                    </p>
                </div>

                <!-- Create tab -->
                <div class="tab-pane" id="create" role="tabpanel">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">Create new</h1>
                    </div>
                    <ul>
                        <li>U can wite blog by html with supported by boostrap</li>
                        <li>Allow tag <code>div,h,p,a,ul,li,br,img and some format text</code></li>
                        <li>Upload image to gallery to use <code>name image</code> for thumbnail</li>
                        <li><code>src of img tag</code> You can use "/assets/public_img/&lt;name_image.png/jpg/jpeg/gif&gt;" </li>
                    </ul>
                    <form action="/dashboard/create" method="POST">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Title" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="cat">Select category</label>
                            <select class="form-control" id="cat" name="cat">
                                <option>coding</option>
                                <option>security</option>
                                <option>traveling</option>
                                <option>story</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brief">Brief</label>
                            <input class="form-control" id="brief" name="brief" placeholder="Brief" value="">
                        </div>

                        <div class="form-group">
                            <label for="thumb">Thumbnail</label>
                            <input type="text" class="form-control" id="thumb" name="thumb" rows="3" placeholder="<name. png / jpg / jpeg / gif>">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="10" placeholder="Content" required></textarea>
                        </div>
                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Create</button>
                    </form>
                </div>

                <!-- Posts tab -->
                <div class="tab-pane" id="posts" role="tabpanel">
                    <div class="container">
                        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">List Posts</h1>
                        <hr class="mt-2 mb-5">
                        <?php
                        foreach ($data['data']['listPost'] as $key => $value) {
                            echo '<div class="row">';
                            echo '<a href="/post/edit/' . $value['slug'] . '" class="d-block mb-4 h-100">';
                            echo '<h2>' . htmlspecialchars($value['title']) . '</h2>';
                            echo '</a>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Gallery tab -->
                <div class="tab-pane" id="gallery" role="tabpanel">
                    <form action="/dashboard/upload" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload" required>
                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                        <input type="submit" value="Upload Image" name="submit">
                    </form>
                    <div class="container">

                        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Photos Gallery</h1>
                        <hr class="mt-2 mb-5">
                        <div class="row text-center text-lg-left">
                            <?php
                            foreach ($data['data']['listImg'] as $key => $value) {
                                echo '<div class="col-lg-3 col-md-4 col-6">';
                                echo '<a href="/assets/public_img/' . $value['name'] . '" class="d-block mb-4 h-100">';
                                echo '<img class="img-fluid img-thumbnail" src="/assets/public_img/' . $value['name'] . '" alt="' . $value['name'] . '">';
                                echo '<p>' . $value['name'] . '</p>';
                                echo '</a>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Profile tab -->
                <div class="tab-pane" id="profile" role="tabpanel">
                    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Edit Profile</h1>
                    <form class="form-signin" action="/dashboard/profile" method="POST">
                        <label for="username" class="sr-only">Username</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        <label for="repassword" class="sr-only">Re-Password</label>
                        <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Re-Password" required>
                        <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Update</button>
                    </form>
                </div>
        </main>
    </div>
</div>