</div>
      </div>
  </div>
  <!--  end  Context Classes  -->
</div>
</div>
<!-- /. ROW  -->
</div>

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url() ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.js"></script>

<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->



<script>
$(document).ready(function () {
$('#dataTables-example').dataTable();
});
</script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo base_url() ?>assets/admin/assets/js/custom.js"></script>


</body>
</html>


<!-- Shop -->
<link href="<?= base_url('assets/shop/css/custom-admin.css') ?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/css/bootstrap-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.11/js/bootstrap-select.js" ></script>
<!-- <script src="<?= base_url('assets/shop/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/shop/js/bootbox.min.js') ?>"></script>
<script src="<?= base_url('assets/shop/js/zxcvbn.js') ?>"></script>
<script src="<?= base_url('assets/shop/js/zxcvbn_bootstrap3.js') ?>"></script> -->
<script src="<?= base_url('assets/shop/js/pGenerator.jquery.js') ?>"></script>

<script src="<?= base_url('assets/shop/js/bootbox.min.js') ?>"></script>

<script>
    var urls = {
        changePass: '<?= base_url('admin/changePass') ?>',
        editShopCategorie: '<?= base_url('admin/editshopcategorie') ?>',
        changeTextualPageStatus: '<?= base_url('admin/changePageStatus') ?>',
        removeSecondaryImage: '<?= base_url('admin/removeSecondaryImage') ?>',
        productstatusChange: '<?= base_url('admin/productstatusChange') ?>',
        productsOrderBy: '<?= base_url('admin/products?orderby=') ?>',
        productStatusChange: '<?= base_url('admin/productStatusChange') ?>',
        changeOrdersOrderStatus: '<?= base_url('admin/changeOrdersOrderStatus') ?>',
        ordersOrderBy: '<?= base_url('admin/orders?order_by=') ?>',
        uploadOthersImages: '<?= base_url('admin/uploadOthersImages') ?>',
        loadOthersImages: '<?= base_url('admin/loadOthersImages') ?>',
        editPositionCategorie: '<?= base_url('admin/changePosition') ?>'
    };
</script>
<script src="<?= base_url('assets/shop/js/mine_admin.js') ?>"></script>