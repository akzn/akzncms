<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#product-modal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="product-modal" tabindex="-1" role="dialog" aria-labelledby="product-modal-label"
  aria-hidden="true">

  <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="    position: fixed;right: 32px;top: 12px;z-index: 1;">
      <svg aria-label="Close" class="_8-yf5 " fill="#ffffff" height="24" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M41.8 9.8L27.5 24l14.2 14.2c.6.6.6 1.5 0 2.1l-1.4 1.4c-.6.6-1.5.6-2.1 0L24 27.5 9.8 41.8c-.6.6-1.5.6-2.1 0l-1.4-1.4c-.6-.6-.6-1.5 0-2.1L20.5 24 6.2 9.8c-.6-.6-.6-1.5 0-2.1l1.4-1.4c.6-.6 1.5-.6 2.1 0L24 20.5 38.3 6.2c.6-.6 1.5-.6 2.1 0l1.4 1.4c.6.6.6 1.6 0 2.2z" fill-rule="evenodd"></path></svg>
  </button>

  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content" style="border-radius: 0;">
      <div class="modal-header d-none">
        <!-- <h5 class="modal-title" id="product-modal-label">Product title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="min-height: 300px">
        
        <div>


          <!-- Page Content -->
              <div class="ddd">

                <!-- Portfolio Item Heading -->

                <!-- Portfolio Item Row -->
                <div class="row">

                  <div class="col-md-7" style="background: " id="modal-product-img">
                    <!-- <img class="lazy img-fluid" src="<?=base_url()?>img/no-image-1.png" alt="" id="modal-product-img" style=""> -->
                  </div>

                  <div class="col-md-5">
                    <h3 class="my-3">Project Description</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
                    <h3 class="my-3">Project Details</h3>
                    <ul>
                      <li>Lorem Ipsum</li>
                      <li>Dolor Sit Amet</li>
                      <li>Consectetur</li>
                      <li>Adipiscing Elit</li>
                    </ul>
                  </div>

                </div>
                <!-- /.row -->

              </div>
              <!-- /.container -->






        </div>
        <div><p id="modal-error"></p></div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<style type="text/css">
  .spinner, #modal-error {
  position: fixed;
  z-index: 1031;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

  @media (min-width: 992px){
    .modal-lg, .modal-xl {
      max-width: 800px;
    }
  }

  @media (min-width: 1200px){
    .modal-xl {
      max-width: 1140px;
    }
  }
</style>

<script type="text/javascript">
  $(document).on("click", ".product-item-modal", function () {

      $('.spinner').removeClass('d-none');
      // $("#modal-product-img").attr('src','');
      // $("#product-modal-label").html('');
      $(".ddd").html('<div class="spinner "><i class="fa fa-spinner fa-spin"></i></div>');

       var productId = $(this).data('id');
       $.ajax({
          url: "product/product_data/"+productId, 
          dataType: "html",
          complete:function(){
            // $('.spinner').addClass('d-none');
          },
          success: function(result){
            // $("#modal-product-img").attr('src','img/shop/'+result.product.image);
            // $("#product-modal-label").html(result.product.categorie_name+' : '+result.product.title)
            $(".ddd").html(result);
            console.log(result);
          },
          error: function(xhr, ajaxOptions, thrownError){
            // console.log(xhr);
            // console.log(ajaxOptions);
            // console.log(thrownError);
            $('#modal-error').html(thrownError);
          }
        });
  });
</script>