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
                    <form action="/dashboard" method="POST">
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
                            <textarea class="form-control" id="brief" name="brief" rows="3" placeholder="Brief"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="thumb">Thumbnail</label>
                            <input type="text" class="form-control" id="thumb" name="thumb" rows="3" placeholder="<name. png / jpg / jpeg / gif>">
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="10" placeholder="Content" required></textarea>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Create</button>
                    </form>
                </div>

                <!-- Posts tab -->
                <div class="tab-pane" id="posts" role="tabpanel">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">List your posts</h1>
                    </div>

                </div>

                <!-- Gallery tab -->
                <div class="tab-pane" id="gallery" role="tabpanel">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                        <h1 class="h2">Gallery photo</h1>
                    </div>
                    <form action="/dashboard/upload" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                    </form>
                </div>

                <!-- Profile tab -->
                <div class="tab-pane" id="profile" role="tabpanel">profile</div>
            </div>
        </main>
    </div>
</div>