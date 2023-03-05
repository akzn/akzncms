<div id="languages">
    <!-- <h1><img src="<?= base_url('assets/imgs/categories.jpg') ?>" class="header-img" style="margin-top:-2px;"> Shop Categories</h1> 
    <hr> -->
    <?php if (validation_errors()) { ?>
        <div class="alert alert-danger"><?= validation_errors() ?></div>
        <hr>
        <?php
    }
    if ($this->session->flashdata('result_add')) {
        ?>
        <div class="alert alert-success"><?= $this->session->flashdata('result_add') ?></div>
        <hr>
        <?php
    }
    if ($this->session->flashdata('result_delete')) {
        ?>
        <div class="alert alert-success"><?= $this->session->flashdata('result_delete') ?></div>
        <hr>
        <?php
    }
    ?>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#add_edit_articles" class="btn btn-primary btn-xs pull-right" style="margin-bottom:10px;"><b>+</b> Add Product categorie</a>
    <div class="clearfix"></div>
    
        <div class="table-responsive">
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Spec Name</th>
                        <th>Sub for</th>
                        <th>For Category <br>
                            <select id="select-category">
                                <option>ALL</option>
                                <?php foreach ($product_categories as $key): ?>
                                    <option value="<?=$key->id?>" <?=($_GET['cat']==$key->id) ? 'selected' : ''?>><?=$key->name?></option>
                                <?php endforeach ?>
                            </select>
                        </th>
                        <th>
                            Type <br>
                            <select id="select-type">
                                <option>ALL</option>
                                <option value="excavator" <?=($_GET['type']=='excavator') ? 'selected' : ''?>>Excavator Type</option>
                                <option value="sparepart-type" <?=($_GET['type']=='sparepart-type') ? 'selected' : ''?>>Sparepart Type</option>
                            </select>
                        </th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
        <?php
        if (!empty($category_specification)) {
        ?>
                <?php
                $i = 1;
                $start = $this->uri->segment(3);
                foreach ($category_specification as $key) {
                    
                    ?>
                    <tr>
                        <td><?= ++$start ?></td>
                        <td><?= $key->spec_name ?></td>
                        <td>
                            <?= $key->sub_for ?>
                        </td>
                        <td>
                            <?= $key->name ?>
                        </td>
                        <td>
                            <?= $key->spec_type ?>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('admin/category-spesification/?delete=' . $key->specification_id) ?>" class="btn btn-danger btn-xs confirm-delete"><span class="glyphicon glyphicon-remove"></span> Del</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            
        <?php
        
    } else {
        ?>
        <div class="clearfix"></div><hr>
        <div class="alert alert-info">No data found!</div>
        
    <?php } ?>
        </table>
    </div>
    <?php echo $links_pagination; ?>
    
</div>


<!-- add edit home categorie -->
    <div class="modal fade" id="add_edit_articles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="form-group">
                            <label>Spec Name</label>
                            <input type="text" name="spec_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Product Category</label>
                            <select id="select-category" name="cat">
                                <option>ALL</option>
                                <?php foreach ($product_categories as $key): ?>
                                    <option value="<?=$key->id?>" <?=($_GET['cat']==$key->id) ? 'selected' : ''?>><?=$key->name?></option>
                                <?php endforeach ?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label>Spec Type</label>
                            <select id="select-type" name="type">
                                <option>ALL</option>
                                <option value="excavator" <?=($_GET['type']=='excavator') ? 'selected' : ''?>>Excavator Type</option>
                                <option value="sparepart-type" <?=($_GET['type']=='sparepart-type') ? 'selected' : ''?>>Sparepart Type</option>
                            </select>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<script type="text/javascript">
    $(function(){
        $('#select-category').on('change',function(){
            id=$(this).val();
            // window.location.href = window.location.href.replace( /[\?#].*|$/, "?cat="+id );
            var url = new URL(window.location.href);
            if (id=='ALL') {
                url.searchParams.delete('cat');
            }else{
                url.searchParams.set('cat',id);
            }
            window.location.href = url.href;
        })
        $('#select-type').on('change',function(){
            id=$(this).val();
            var url = new URL(window.location.href);
            if (id=='ALL') {
                url.searchParams.delete('type');
            }else{
                url.searchParams.set('type',id);
            }
            window.location.href = url.href;
        })
    })    
</script>