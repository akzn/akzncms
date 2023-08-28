<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <h3 class="mb-4"><?=$title?></h3>
            
            <!-- Sample articles loop -->
            <?php if (!empty($blogs)) : ?>
                <?php foreach ($blogs as $key => $value) : ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title"><?= $value['title'] ?></h2>
                            <div class="card-text mb-4">
                                <?= truncate_text($value['content'], 40); ?>
                            </div>
                            <a href="<?=base_url('article/').$value['slug_blog']?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No article available.</p>
            <?php endif; ?>
            <!-- Repeat the above card for each article -->
            
            <!-- Pagination -->
            <div class="pagination-yuki">
                <?=$pagination?>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sidebar</h5>
                    <!-- Add your sidebar content here -->
                    <form action="<?=base_url('articles/search')?>" method="post">
                        <div class="form-group">
                            <input type="text" name="query" class="form-control" placeholder="Search">
                        </div>
                        <div class="form-group">
                            <select class="form-control">
                                <option>Select Category</option>
                                <?php foreach ($categories as $key => $value) : ?>
                                    <option><?=$value['category_name']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
