<script src="<?= base_url('assets/ckeditor/ckeditor.js') ?>"></script>
<!-- <h1><img src="<?= base_url('assets/imgs/shop-cart-add-icon.png') ?>" class="header-img" style="margin-top:-3px;"> Publish product</h1> -->
<!-- <hr> -->
<?php
$timeNow = time();
if (validation_errors()) {
    ?>
    <hr>
    <div class="alert alert-danger"><?= validation_errors() ?></div>
    <hr>
    <?php
}
if ($this->session->flashdata('result_publish')) {
    ?>
    <hr>
    <div class="alert alert-success"><?= $this->session->flashdata('result_publish') ?></div>
    <hr>
    <?php
}
?>
<form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" value="<?= isset($_POST['folder']) ? $_POST['folder'] : $timeNow ?>" name="folder">


    <div class="locale-container locale-container-<?= $language->abbr ?>" style="display:block">
            <input type="hidden" name="translations[]" value="<?= $language->abbr ?>">
            <div class="form-group"> 
                <label>Title</label>
                <input type="text" name="title" value="<?= @$_POST['title'] ?>" class="form-control" required>
            </div>

            <div class="form-group hidden">
                <a href="javascript:void(0);" class="btn btn-default showSliderDescrption" data-descr="<?= $i ?>">Show Slider Description <span class="glyphicon glyphicon-circle-arrow-down"></span></a>
            </div>
            <div class="theSliderDescrption" id="theSliderDescrption-<?= $i ?>" <?= isset($_POST['in_slider']) && $_POST['in_slider'] == 1 ? 'style="display:block;"' : '' ?>>
                <div class="form-group">
                    <label for="basic_description<?= $i ?>">Slider Description</label>
                    <textarea name="basic_description" id="basic_description<?= $i ?>" rows="50" class="form-control"><?= $trans_load != null && isset($trans_load[$language->abbr]['basic_description']) ? $trans_load[$language->abbr]['basic_description'] : '' ?></textarea>
                    <script>
                        CKEDITOR.replace('basic_description<?= $i ?>');
                        CKEDITOR.config.entities = false;
                    </script>
                </div>
            </div>
            <div class="form-group">
                <label for="description<?= $i ?>">Description</label>
                <textarea name="description" id="description<?= $i ?>" rows="50" class="form-control"><?= @$_POST['description'] ?></textarea>
                <script>
                    CKEDITOR.replace('description<?= $i ?>');
                    CKEDITOR.config.entities = false;
                </script>
            </div>
            <div class="form-group for-shop">
                <label>Price</label>
                <input type="text" name="price" placeholder="without currency at the end" value="<?= @$_POST['price'] ?>" class="form-control" required>
            </div>
            <div class="form-group for-shop">
                <label>Old Price</label>
                <input type="text" name="old_price" placeholder="without currency at the end" value="<?= @$_POST['old_price'] ?>" class="form-control">
            </div>
        </div>

    <div class="form-group bordered-group">
        <?php 
        if (isset($_POST['image']) && $_POST['image'] != null) {
            $image = 'img/shop/' . $_POST['image'];
            if (!file_exists($image)) {
                $image = 'img/no-image.png';
            }
            ?>
            <p>Current image:</p>
            <div>
                <img src="<?= base_url($image) ?>" class="img-responsive img-thumbnail" style="max-width:300px; margin-bottom: 5px;">
            </div>
            <input type="hidden" name="old_image" value="<?= $_POST['image'] ?>">
            <?php if (isset($_GET['to_lang'])) { ?>
                <input type="hidden" name="image" value="<?= $_POST['image'] ?>">
                <?php
            }
        }
        ?>
        <label for="userfile">Cover Image</label>
        <input type="file" id="userfile" name="userfile">
    </div>
    <div class="form-group bordered-group">
        <div class="others-images-container">
            <?= $otherImgs ?>
        </div>
        <a href="javascript:void(0);" data-toggle="modal" data-target="#modalMoreImages" class="btn btn-default">Upload more images</a>
    </div>

    <div class="form-group bordered-group">
        <?php 
        if (isset($_POST['video']) && $_POST['video'] != null) {
            $video = 'video/shop/' . $_POST['video'];
            if (!file_exists($video)) {
                $video = 'img/no-image.png';
            }
            ?>
            <p>Current video:</p>
            <div>
                <video width="400" height="600" controls class="img-responsive img-thumbnail" style="max-width:300px; margin-bottom: 5px;">
                  <source src="<?= base_url($video) ?>" type="video/mp4">
                  <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                </video>
            </div>
            <input type="hidden" name="old_video" value="<?= $_POST['video'] ?>">
            <?php if (isset($_GET['to_lang'])) { ?>
                <input type="hidden" name="video" value="<?= $_POST['video'] ?>">
                <?php
            }
        }
        ?>
        <label for="userfile">Video</label>
        <input type="file" id="videofile" name="videofile">
    </div>

    <div class="form-group for-shop">
        <label>Shop Categories</label>
        <select class="selectpicker form-control show-tick show-menu-arrow" name="shop_categorie" id="select_shop_categorie">
            <?php foreach ($product_categories as $key_cat => $shop_categorie) { ?>
                <?php if ($_GET['cat']): ?>
                    <option <?= ($_GET['cat']==$key_cat)  ? 'selected' : '' ?> value="<?= $key_cat ?>">
                <?php else: ?>
                    <option <?= ((isset($_POST['shop_categorie']) && $_POST['shop_categorie'] == $key_cat))  ? 'selected' : '' ?> value="<?= $key_cat ?>">
                <?php endif ?>

                <!-- <option <?= ((isset($_POST['shop_categorie']) && $_POST['shop_categorie'] == $key_cat))  ? 'selected=""' : '' ?> value="<?= $key_cat ?>"> -->
                    <?php
                    foreach ($shop_categorie['info'] as $nameAbbr) {
                        if ($nameAbbr['abbr'] == $this->config->item('language_abbr')) {
                            echo $nameAbbr['name'];
                        }
                    }
                    ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div id="spec-div">
    <?php if ($category_specification): ?>
        <div class="form-group">
        <label>Spec Data</label>
        <table class="table table-bordered">
            <tr>
                <th>no</th>
                <th>spec name</th>
                <th>Type</th>
                <th>value</th>
            </tr>
            <?php foreach ($category_specification as $key => $value): ?>
                <tr>
                    <td><?=++$start?></td>
                    <td><?=$value->spec_name?></td>
                    <td><?=$value->spec_type?></td>
                    <td>
                        <textarea name="cat_spec_value[<?=$value->specification_id?>]"><?=$value->value?></textarea>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
    <?php endif ?>
    </div>
    
    <div class="form-group for-shop hidden">
        <label>Quantity</label><small> quantity with 0 value will not be displayed</small>
        <input type="text" placeholder="number" name="quantity" value="<?= @$_POST['quantity'] ?>" class="form-control" id="quantity" required>
    </div>
    <?php if ($showBrands == 1) { ?>
        <div class="form-group for-shop">
            <label>Brand</label>
            <select class="selectpicker" name="brand_id">
                <?php foreach ($brands as $brand) { ?>
                    <option <?= isset($_POST['brand_id']) && $_POST['brand_id'] == $brand['id'] ? 'selected' : '' ?> value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                <?php } ?>
            </select>
        </div>
    <?php } if ($virtualProducts == 1) { ?>
        <div class="form-group for-shop">
            <label>Virtual Products <a href="javascript:void(0);" data-toggle="modal" data-target="#virtualProductsHelp"><i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
            <textarea class="form-control" name="virtual_products"><?= @$_POST['virtual_products'] ?></textarea>
        </div>
    <?php } ?>
    <div class="form-group for-shop hidden">
        <label>In Slider</label>
        <select class="selectpicker" name="in_slider">
            <option value="1" <?= isset($_POST['in_slider']) && $_POST['in_slider'] == 1 ? 'selected' : '' ?>>Yes</option>
            <option value="0" <?= isset($_POST['in_slider']) && $_POST['in_slider'] == 0 || !isset($_POST['in_slider']) ? 'selected' : '' ?>>No</option>
        </select>
    </div>
    <div class="form-group for-shop hidden">
        <label>Position</label>
        <input type="text" placeholder="Position number" name="position" value="<?= @$_POST['position'] ?>" class="form-control">
    </div>
    <button type="submit" name="submit" class="btn btn-lg btn-default btn-publish">Publish</button>
    <?php if ($this->uri->segment(3) !== null) { ?>
        <a href="<?= base_url('admin/products') ?>" class="btn btn-lg btn-default">Cancel</a>
    <?php } ?>
</form>
<!-- Modal Upload More Images -->
<div class="modal fade" id="modalMoreImages" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Upload more images</h4>
            </div>
            <div class="modal-body">
                <form id="uploadImagesForm">
                    <input type="hidden" value="<?= isset($_POST['folder']) ? $_POST['folder'] : $timeNow ?>" name="folder">
                    <label for="others">Select images</label>
                    <input type="file" name="others[]" id="others" multiple />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default finish-upload">
                    <span class="finish-text">Finish</span>
                    <img src="<?= base_url('img/load.gif') ?>" class="loadUploadOthers" alt="">
                </button>
            </div>
        </div>
    </div>
</div>
<!-- virtualProductsHelp -->
<div class="modal fade" id="virtualProductsHelp" tabindex="-1" role="dialog" aria-labelledby="virtualProductsHelp">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">What are virtual products?</h4>
            </div>
            <div class="modal-body">
                Sometimes we want to sell products that are for electronic use such as books. In the box below, you can enter links to products that can be downloaded after you confirm the order as "Processed" through the "Orders" tab, an email will be sent to the customer entered with the entire text entered in the "virtual products" field.
                We have left only the possibility to add links in this field because sometimes it is necessary that the electronic stuff you provide for downloading will be uploaded to other servers. If you want, you can add your files to "file manager" and take the links to them to add to the "virtual products"
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('#select_shop_categorie').on('change',function(){
            id=$(this).val();
            var url = new URL(window.location.href);
            if (id=='ALL') {
                url.searchParams.delete('cat');
            }else{
                url.searchParams.set('cat',id);
            }
            // window.location.href = url.href;
            $('#spec-div').load(url.href + ' #spec-div');
        })
    })  
</script>