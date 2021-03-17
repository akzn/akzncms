<div class="container container-content gallery">

	 <div class="row"><!-- row -->                            
            
            	<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                <nav aria-label="breadcrumb">
                	<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ol>
                </nav>
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->

      <h2 class="text-center mt-0">Gallery</h2>
      <hr class="divider my-4">
       <!-- Page Content -->

<style type="text/css">
    section#gallery .card-columns.itwm2 {
        column-count: 2;
    }
    section#gallery .card-columns.itwm2 .card.width2 {
        width:135%;
        margin-bottom: 1.75rem;
        float:left;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        width: auto;
        height: 629px;
    }

    section#gallery .card-columns.itwm2 .card.width2.u3 .item-body{
        width: auto;
        height: 300px;
    }

    section#gallery .card-columns.itwm2 .card.width1 {
        width:65%;
        float:right;
    margin-bottom: 1.75rem;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        min-width: 300px;
    min-height: 300px;
    }

    section#gallery .card-columns .card {
      border:unset;
      border-radius: unset;
        cursor: pointer;
    }

    section#gallery .card-columns .card .item-body {
        border:unset;
        border-radius: unset;
        cursor: pointer;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        box-shadow: inset 0px 13px 87px 20px #00000085;
        filter:contrast(150%) sepia(24%);
      background-position: center;background-size: cover;
        
        box-shadow:inset 0px 0px 70px rgb(0 0 0 / 76%);
        -webkit-transition: opacity 0.5s ease-in-out;
        -moz-transition: opacity 0.5s ease-in-out;
        transition: opacity 0.5s ease-in-out;
    }
    section#gallery .card-columns .kpy-gallery-grid .item-body:hover {
         opacity: 0.75;
    }
    section#gallery .play-btn-a {
            top:42%!important;
            left:39%!important;
    }
    section#gallery .play-btn {
        /*background: #000000b5;*/
    padding: 12px 20px 10px 23px;
    border-radius: 10px;
    position: absolute;
    top: 45%;
    left: 45%;
    z-index: 10;
  }
  section#gallery .play-btn i {
    font-size: 3.50vw;
    color:#fff;
     text-shadow: 0 0 13px #ffffff, 0 0 16px #000000
    /*-webkit-animation: glow 1s ease-in-out infinite alternate;
  -moz-animation: glow 1s ease-in-out infinite alternate;
  animation: glow 1s ease-in-out infinite alternate;*/
  }
  @-webkit-keyframes glow {
  from {
    /*text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #ffd400, 0 0 40px #ffd400, 0 0 50px #ffd400, 0 0 60px #ffd400, 0 0 70px #ffd400;*/
    text-shadow: 0 0 10px #ffd400, 0 0 20px #ffd400, 0 0 30px #ffd400, 0 0 40px #ffd400;
  }
  to {
    text-shadow: 0 0 20px #ffd400, 0 0 30px #ffd400, 0 0 40px #ffd400;
  }
}

@media (min-width: 16em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        column-gap: 0.3rem!important;
    }
    .card-columns .card{
        margin-bottom: 0.3rem;
    }

    section#gallery .card-columns.itwm2 .card.width1, section#gallery .card-columns.itwm2 .card.width2 {
        margin-bottom: 0.3rem;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        min-width: 80px;
        min-height: 80px;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        width: auto;
        height: 166px;
    }

    section#gallery .card-columns.itwm2 .card.width2.u3 .item-body{
        width: auto;
        height: 80px;
    }
    section#gallery .play-btn-a {
        top:42%!important;
        left:39%!important;
    }
    section#gallery .play-btn {
        top: 40%;
        left: 40%;
    }
}

@media (min-width: 20em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        column-gap: 0.5rem!important;
    }
    .card-columns .card{
        margin-bottom: 0.4rem;
    }

    section#gallery .card-columns.itwm2 .card.width1, section#gallery .card-columns.itwm2 .card.width2 {
        margin-bottom: 0.4rem;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        min-width: 90px;
        min-height: 90px;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        /*width: 213px;;*/
        height: 186px;
    }

    section#gallery .card-columns.itwm2 .card.width2.u3 .item-body{
        width: auto;
        height: 90px;
    }
    section#gallery .play-btn-a {
        top:42%!important;
        left:39%!important;
    }
    section#gallery .play-btn {
        top: 40%;
        left: 40%;
    }
}

@media (min-width: 34em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
    }


}

@media (min-width: 48em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        column-gap: 1.1rem!important;
    }

     .card-columns .card{
        margin-bottom: 1.1rem;
    }

    section#gallery .card-columns.itwm2 .card.width1, section#gallery .card-columns.itwm2 .card.width2 {
        margin-bottom: 1.1rem;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        min-width: 200px;
        min-height: 200px;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        width: auto;
        height: 416px;
    }

    section#gallery .card-columns.itwm2 .card.width2.u3 .item-body{
        width: auto;
        height: 200px;
    }
    section#gallery .play-btn-a {
        top:42%!important;
        left:39%!important;
    }
    section#gallery .play-btn {
        top: 45%;
        left: 45%;
    }

}

@media (min-width: 62em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        column-gap: 1rem!important;
   }

   .card-columns .card{
        margin-bottom: 0.5rem;
    }

    section#gallery .card-columns.itwm2 .card.width1, section#gallery .card-columns.itwm2 .card.width2 {
        margin-bottom: 1rem;
    }

    section#gallery .card-columns .kpy-gallery-grid .item-body{
        min-width: 300px;
        min-height: 300px;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        width: auto;
        height: 617px;
    }

    section#gallery .card-columns.itwm2 .card.width2.u3 .item-body{
        width: auto;
        height: 300px;
    }

}

@media (min-width: 75em) {
    .card-columns {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        column-gap: 2rem!important;
    }

    .card-columns .card{
        margin-bottom: 1rem;
    }

    section#gallery .card-columns.itwm2 .card.width1, section#gallery .card-columns.itwm2 .card.width2 {
        margin-bottom: 1.2rem;
    }

    section#gallery .card-columns.itwm2 .card.width2 .item-body{
        width: auto;
        height: 620px;
    }
}

@media(max-width: 1024px) {
  section#gallery .container {
    width: 100%;
    padding-right: 2px;
    padding-left: 3px;
    margin-right: auto;
    margin-left: auto;
        }
   }

</style>

<section class="pb-5 pt-5" id="gallery">
    <div class="container" id="gallery-list">
        <?php /* 
            <?php $img_chunk = array_chunk($gallery,3); ?>
            <?php foreach ($img_chunk as $key => $chunk): ?>
                <?php $have_video = array_search('video', array_column($chunk, 'type')); ?>
                <?php if ($have_video === false): ?>
                    <div class="card-columns">
                        <!-- normal img list-->

                            <?php foreach ($chunk as $key => $data): ?>
                                    <div class="card  kpy-gallery-grid ">
                                        <div class="item-body bootstrap-fancy-img"  
                                            data-fancy-src="<?= base_url('img/gallery/' . $data->image) ?>" 
                                            style="background-image: url('<?= base_url('img/gallery/' . $data->image) ?>');"
                                        >
                                      </div>
                                    </div>            
                               
                            <?php endforeach ?>
                        </div>
                <?php else: ?>
                     <div class="card-columns itwm2">
                        <!-- video img list-->

                            <?php foreach ($chunk as $key => $data): ?>
                                <?php if ($data->type == 'image'): ?>
                                    <div class="card width1  kpy-gallery-grid">
                                        <div class="item-body bootstrap-fancy-img" 
                                            data-fancy-src="<?= base_url($dir . $filename) ?>" 
                                            style="background-image: url('<?= base_url('img/gallery/' . $data->image) ?>');"
                                        >
                                                  
                                        </div>
                                    </div>
                                <?php elseif ($key==0): ?>
                                    <div class="card width2  kpy-gallery-grid <?=$flag_item_height?>">
                                        <div 
                                            class="item-body  bootstrap-fancy-video" 
                                            data-fancy-src="<?=base_url()?>video/sample-1.mp4"
                                            style="background-image: url('<?= base_url('img/gallery/' . $data->image) ?>');"
                                        >
                                        </div>
                                        <div class="play-btn"><i class="fa fa-play"></i></div>
                                    </div>
                                <?php else: ?>
                                    <div class="card width1  kpy-gallery-grid">
                                        <div 
                                            class="item-body  bootstrap-fancy-video" 
                                            data-fancy-src="<?=base_url()?>video/sample-1.mp4"
                                            style="background-image: url('<?= base_url('img/gallery/' . $data->image) ?>');"
                                        >
                                        </div>
                                        <div class="play-btn"><i class="fa fa-play"></i></div>
                                    </div>
                                <?php endif ?>
                                    
                               
                            <?php endforeach ?>
                        </div>
                <?php endif ?>
            
            <?php endforeach ?>
        */?>
    </div>
</section>

<section class="text-center" style="padding: unset">
    <div id="loader-image" class="fa fa-spin d-none"></div>
</section>

<div id="scroll-to"></div>


    </div>
<script type="text/javascript">
  $(document).ready(function(){

    var start = 0;
    var limit = 9;
    var reachedMax = false;

    var loadingState = false;

    getPostData();

    $(window).scroll(function() {
       var hT = $('#scroll-to').offset().top,
           hH = $('#scroll-to').outerHeight(),
           wH = $(window).height(),
           wS = $(this).scrollTop();
       if ((wS > (hT+hH-wH)) && (loadingState==false)){
           console.log('Load Post');
           $("#loader-image").removeClass('d-none').addClass('spinner');
           loadingState = true;
           getPostData();
       }
    });

    function getPostData(){
      $.ajax({
        url : '<?=base_url()?>gallery/fetch_posts',
        method: 'POST',
        dataType: 'text',
        cache:false,
        data : {getData:1,start:start,limit:limit},
        beforeSend : function(){
            $("#loader-image").removeClass('d-none').addClass('spinner');
        },
        success:function(response){
            $("#loader-image").removeClass('spinner');
          if(response=="" || response.result == 'no-data') {
            console.log('no-data');
            $("#loadBtn").html("<button type='button' class='btn btn-success btn-outline'>That is All</button>");
          }else{
            start += limit;
            drawImageList(response);
          }
        },
        error : function(err,a,b){
            loadingState = false;
            console.log('Load Post errors');
            $("#loader-image").removeClass('spinner');
        }
      });
    }

    function drawImageList(data) {
        data = $.parseJSON(data);
        Array.prototype.chunk = function(n) {
            if (!this.length) {
                return [];
            }
            return [this.slice(0, n)].concat(this.slice(n).chunk(n));
        };
        
        try {
            let column ='';
            array_chunk = data.chunk(3); // chunk to 3 data per row

            $.each(array_chunk, function(index, item) { 
                
                have_video = getKeyByPostType(item, 'video'); // check if data type is video

                if (have_video == -1){ // if dont have video, 
                    column = `<div class="card-columns">`;
                    $.each(item,function(i,item_2){
                       let ele = `
                            <div class="card  kpy-gallery-grid ">
                                <div class="item-body bootstrap-fancy-img"  
                                    data-fancy-src="<?= base_url('img/gallery/')?>`+item_2.image+`" 
                                    style="background-image: url('<?= base_url('img/gallery/')?>`+item_2.image+`');"
                                >
                              </div>
                            </div>
                        `
                        column += ele;

                    })
                    column += '</div>'
                    $('#gallery-list').append(column)
                    loadingState = false;
                } else { // if have video 

                    itemcheck = (item[0].type=='image') ? '' : 'itwm2';

                    column = `<div class="card-columns `+ itemcheck +`">`;

                    $.each(item,function(i,item_2){
                        if (item_2.type == 'image'){

                            ele = `
                                <div class="card width1  kpy-gallery-grid">
                                        <div class="item-body bootstrap-fancy-img" 
                                            data-fancy-src="<?= base_url('img/gallery/')?>`+item_2.image+`" 
                                            style="background-image: url('<?= base_url('img/gallery/')?>`+item_2.image+`');"
                                        >
                                                  
                                        </div>
                                    </div>
                            `

                        } else if(i==0){
                            ele = `
                                <div class="card width2  kpy-gallery-grid <?=$flag_item_height?>  bootstrap-fancy-video" 
                                    data-fancy-src="`+item_2.video_url+`" >
                                        <div 
                                            class="item-body" 
                                            style="background-image: url('<?= base_url('img/gallery/')?>`+item_2.image+`');"
                                        >
                                        </div>
                                        <div class="play-btn"><i class="fa fa-play"></i></div>
                                    </div>
                            `
                        } else {
                            ele = `
                                <div class="card width1  kpy-gallery-grid bootstrap-fancy-video"
                                    data-fancy-src="`+item_2.video_url+`" 
                                >
                                        <div 
                                            class="item-body" 
                                            style="background-image: url('<?= base_url('img/gallery/')?>`+item_2.image+`');"
                                        >
                                        </div>
                                        <div class="play-btn play-btn-a"><i class="fa fa-play"></i></div>
                                    </div>
                            `
                        }

                        column += ele;
                    })


                    column += '</div>';
                    $('#gallery-list').append(column)
                    loadingState = false;
                }
            });
        } catch(e){
            console.log(e);
            loadingState = true;
        } finally {
            
        }
        

        
    }

    var getKeyByPostType = function(obj, type) {
        var returnKey = -1;
        $.each(obj, function(key, info) {
            if (info.type == type) {
               returnKey = key;
                return false; 
            };   
        });
        
        return returnKey;       
               
    }


  });
</script>

