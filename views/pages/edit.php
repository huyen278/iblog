<form action="/dashboard/edit" method="POST">
    <div class="form-group">
        <label for="title">Title</label>
        <input value="<?php echo $data['data']['data']['title']; ?>" type="text" id="title" name="title" class="form-control" placeholder="Title" required autofocus>
    </div>
    <div class="form-group">
        <label for="cat">Select category</label>
        <select class="form-control" id="cat" name="cat">
            <option <?php if ($data['data']['data']['id_cat'] == 1) {
                        echo 'selected';
                    } ?>>coding</option>
            <option <?php if ($data['data']['data']['id_cat'] == 2) {
                        echo 'selected';
                    }  ?>>security</option>
            <option <?php if ($data['data']['data']['id_cat'] == 3) {
                        echo 'selected';
                    }  ?>>traveling</option>
            <option <?php if ($data['data']['data']['id_cat'] == 4) {
                        echo 'selected';
                    }  ?>>story</option>
        </select>
    </div>
    <div class="form-group">
        <label for="brief">Brief</label>
        <textarea class="form-control" id="brief" name="brief" rows="3" placeholder="Brief"><?php echo $data['data']['data']['brief']; ?></textarea>
    </div>

    <div class="form-group">
        <label for="thumb">Thumbnail</label>
        <input value="<?php echo $data['data']['data']['img']; ?>" type="text" class="form-control" id="thumb" name="thumb" rows="3" placeholder="<name. png / jpg / jpeg / gif>">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" rows="10" placeholder="Content" required><?php echo $data['data']['data']['content']; ?></textarea>
    </div>
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>" />
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Update</button>
</form>