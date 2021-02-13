<style type="text/css">
  .gal-item{
    overflow: hidden;
    padding: 2px;
  }
  .gal-column{
    padding-top: unset;
    padding-bottom: unset;
  }
  /*.gal-column.gal-item:last-child{
    padding-bottom: unset;
  }
  .gal-column.gal-item:first-child{
    padding-top: unset;
  }*/
.gal-item .box{
  height: 100%;
  overflow: hidden;
  background-position: center;
  background-size: cover;
}
.box img{
  height: 100%;
  width: auto;
  object-fit:cover;
}
.h-50{
  margin-left: unset;
}
.gal-item .r1-c1{
  min-height: 500px;
  
}
.gal-item .r2-c1{
  min-height: 370px;
  
}
.gal-item .r3-c1-i1{
  min-height: 600px;
  
}
.gal-item .r3-c1-i2{
  min-height: 370px;
  
}

</style>

<div class="container-fluid section-header" style="">
    <!-- Top content -->
    <div class="top-content">
      <div class="row" style="height: 40vh;display: flex;flex-direction: center;align-items: center;">
        <div class="col-md-12 text-center animate__animated animate__zoomIn">
            <h1 class="page-title">
              Our Projects
            </h1>
        </div>
      </div>
    </div>
  </div>

<div class="container my-5" style="padding: 90px 90px;" data-aos="zoom-in">
  <div class="text-center text-center-text" style="font-family: Muli">

    Ziemotion is a professional animation service and content creation company. We create products with great quality from fresh idea to reality. Our team is composed of creative individuals who has years of experience producing many animation product like TVCs, short movies, IP (Intellectual Property), toys, game assets and many more.

    <!-- <h2 class="text center h2 pt-5">Our Works</h2> -->
  </div>


</div>

<section style="padding-top: 10px" class="projects">
<div class="container-fluid" style="max-width: 1366px" id="project-container">
  

   

  <br/>
</div>

<div class="text-center" style="padding: 10px" id="loader">
    <div id="loader-spinner" class="fa fa-spinner fa-spin fa-2x d-none"></div>
</div>

</section>


<div id="scroll-to"></div>

<script type="text/javascript">
  $(document).ready(function(){

    var start = 0;
    var limit = 5;
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
           $("#loader-spinner").removeClass('d-none').addClass('fa-spin');
           loadingState = true;
           getPostData();
       }
    });

    function getPostData(){
      $.ajax({
        url : '<?=base_url()?>projects/fetch_posts',
        method: 'POST',
        dataType: 'json',
        cache:false,
        data : {getData:1,start:start,limit:limit},
        beforeSend : function(){
            $("#loader-spinner").removeClass('d-none').addClass('fa-spin');
        },
        success:async function(response){
            $("#loader-spinner").addClass('d-none').removeClass('fa-spin');
          if(response=="" || response.result == 'no-data' || response.length<5) {
            console.log('no-data');
            // $("#loader").html("<button type='button' class='btn btn-success btn-outline'>That is All</button>");
          }else{
            start += limit;
            await drawImageList(response).then(function(){
              botstrapFancyA('.project-item-content');
            });
          }
        },
        error : function(err,a,b){
            loadingState = false;
            console.log('Load Post errors');
            $("#loader-spinner").addClass('d-none').removeClass('fa-spin');
        }
      });
    }

    async function drawImageList(data) {
        // data = $.parseJSON(data);
        // Array.prototype.chunk = function(n) {
        //     if (!this.length) {
        //         return [];
        //     }
        //     return [this.slice(0, n)].concat(this.slice(n).chunk(n));
        // };
        
        // console.log(data)
        try {
            let column ='';
            
            if (start % 2 == 0) {
              column += drawRow1(data);
            } else {
              column += drawRow2(data);
            }
            

            $('#project-container').append(column)
            loadingState = false;
        } catch(e){
            console.log(e);
            loadingState = true;
        } finally {
            
        }
        
    }

    var drawRow1 = function(data){
      console.log(data[0].gallery_id)
      eles = `
        <div class="row" id="project-list">
                <div class="col-md-8 col-sm-12 co-xs-12 gal-column gal-item">
                 <div class="row ">
                    <div class="col-md-12 col-sm-12 co-xs-12 gal-item">
                        <div class="box r3-c1-i1" data-aos="zoom-in" style="background-image: url('<?=base_url()?>img/gallery/`+data[0].image+`')">
                          <div class="project-item-content" data-fancy-type="`+data[0].type+`" data-fancy-src="`+data[0].src_url+`" data-id="`+data[0].gallery_id+`">
                            <div class="project-item-caption">
                              <h1 class="h2">`+data[0].gallery_name+`</h1>
                              <hr class="red left">
                              <span>`+data[0].gallery_description_short+`</span>
                            </div>
                          </div>
                       <!-- <img src="http://fakeimg.pl/1024x370/" class="img-ht img-fluid"> -->
                        </div>
                    </div>
                </div>
              
                <div class="row ">
                  <div class="col-md-6 col-sm-6 co-xs-12 gal-item">
                    <div class="box r3-c1-i2" data-aos="zoom-in" style="background-image: url('<?=base_url()?>img/gallery/`+data[1].image+`')">
                          <div class="project-item-content" data-fancy-type="`+data[1].type+`" data-fancy-src="`+data[1].src_url+`" data-id="`+data[1].gallery_id+`">
                            <div class="project-item-caption">
                              <h1 class="h2">`+data[1].gallery_name+`</h1>
                              <hr class="red left">
                              <span>`+data[0].gallery_description_short+`</span>
                            </div>
                          </div>
                       <!-- <img src="http://fakeimg.pl/1024x370/" class="img-ht img-fluid"> -->
                        </div>
                  </div>

                  <div class="col-md-6 col-sm-6 co-xs-12 gal-item">
                   <div class="box c1-i1" data-aos="zoom-in" style="background-image: url('<?=base_url()?>img/gallery/`+data[2].image+`')">
                          <div class="project-item-content" data-fancy-type="`+data[2].type+`" data-fancy-src="`+data[2].src_url+`" data-id="`+data[2].gallery_id+`">
                            <div class="project-item-caption">
                              <h1 class="h2">`+data[2].gallery_name+`</h1>
                              <hr class="red left">
                              <span>`+data[0].gallery_description_short+`</span>
                            </div>
                          </div>
                       <!-- <img src="http://fakeimg.pl/1024x370/" class="img-ht img-fluid"> -->
                        </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-6 co-xs-12 gal-item gal-column">
                <div class="col-md-12 col-sm-6 co-xs-12 gal-item h-50">
                  <div class="box r3-c1-i2" data-aos="zoom-in" style="background-image: url('<?=base_url()?>img/gallery/`+data[3].image+`')">
                          <div class="project-item-content" data-fancy-type="`+data[3].type+`" data-fancy-src="`+data[3].src_url+`" data-id="`+data[3].gallery_id+`">
                            <div class="project-item-caption">
                              <h1 class="h2">`+data[3].gallery_name+`</h1>
                              <hr class="red left">
                              <span>`+data[0].gallery_description_short+`</span>
                            </div>
                          </div>
                       <!-- <img src="http://fakeimg.pl/1024x370/" class="img-ht img-fluid"> -->
                        </div>
                </div>

                <div class="col-md-12 col-sm-6 co-xs-12 gal-item h-50">
                  <div class="box " data-aos="zoom-in" style="background-image: url('<?=base_url()?>img/gallery/`+data[4].image+`')">
                          <div class="project-item-content" data-fancy-type="`+data[4].type+`" data-fancy-src="`+data[4].src_url+`" data-id="`+data[4].gallery_id+`">
                            <div class="project-item-caption">
                              <h1 class="h2">`+data[4].gallery_name+`</h1>
                              <hr class="red left">
                              <span>`+data[0].gallery_description_short+`</span>
                            </div>
                          </div>
                       <!-- <img src="http://fakeimg.pl/1024x370/" class="img-ht img-fluid"> -->
                        </div>
                </div>
              </div>
            </div>
      `;

      return eles;
    } 

    var drawRow2 = function(data){
      eles = `
        <div class="row" id="project-list">
      <div class="col-md-4 col-sm-6 co-xs-12 gal-item gal-column">
                <div class="col-md-12 col-sm-6 co-xs-12 gal-item h-50">
                  <div class="box r3-c1-i2" data-aos="zoom-in" style="background-image: url('<?=base_url()?>img/gallery/`+data[0].image+`')">
                          <div class="project-item-content" data-fancy-type="`+data[0].type+`" data-fancy-src="`+data[0].src_url+`" data-id="`+data[0].gallery_id+`">
                            <div class="project-item-caption">
                              <h1 class="h2">`+data[0].gallery_name+`</h1>
                              <hr class="red left">
                              <span>`+data[0].gallery_description_short+`</span>
                            </div>
                          </div>
                       <!-- <img src="http://fakeimg.pl/1024x370/" class="img-ht img-fluid"> -->
                        </div>
                </div>

                <div class="col-md-12 col-sm-6 co-xs-12 gal-item h-50">
                  <div class="box " data-aos="zoom-in" style="background-image: url('<?=base_url()?>img/gallery/`+data[1].image+`')">
                          <div class="project-item-content" data-fancy-type="`+data[1].type+`" data-fancy-src="`+data[1].src_url+`" data-id="`+data[1].gallery_id+`">
                            <div class="project-item-caption">
                              <h1 class="h2">`+data[1].gallery_name+`</h1>
                              <hr class="red left">
                              <span>`+data[0].gallery_description_short+`</span>
                            </div>
                          </div>
                       <!-- <img src="http://fakeimg.pl/1024x370/" class="img-ht img-fluid"> -->
                        </div>
                </div>
              </div>
      <div class="col-md-8 col-sm-12 co-xs-12 gal-column gal-item">
                 <div class="row ">
                    <div class="col-md-12 col-sm-12 co-xs-12 gal-item">
                        <div class="box r3-c1-i1" data-aos="zoom-in" style="background-image: url('<?=base_url()?>img/gallery/`+data[2].image+`')">
                          <div class="project-item-content" data-fancy-type="`+data[2].type+`" data-fancy-src="`+data[2].src_url+`" data-id="`+data[2].gallery_id+`">
                            <div class="project-item-caption">
                              <h1 class="h2">`+data[2].gallery_name+`</h1>
                              <hr class="red left">
                              <span>`+data[0].gallery_description_short+`</span>
                            </div>
                          </div>
                       <!-- <img src="http://fakeimg.pl/1024x370/" class="img-ht img-fluid"> -->
                        </div>
                    </div>
                </div>
              
                <div class="row ">
                  <div class="col-md-6 col-sm-6 co-xs-12 gal-item">
                    <div class="box r3-c1-i2" data-aos="zoom-in" style="background-image: url('<?=base_url()?>img/gallery/`+data[3].image+`')">
                          <div class="project-item-content" data-fancy-type="`+data[3].type+`" data-fancy-src="`+data[3].src_url+`" data-id="`+data[3].gallery_id+`">
                            <div class="project-item-caption">
                              <h1 class="h2">`+data[3].gallery_name+`</h1>
                              <hr class="red left">
                              <span>`+data[0].gallery_description_short+`</span>
                            </div>
                          </div>
                       <!-- <img src="http://fakeimg.pl/1024x370/" class="img-ht img-fluid"> -->
                        </div>
                  </div>

                  <div class="col-md-6 col-sm-6 co-xs-12 gal-item">
                   <div class="box c1-i1" data-aos="zoom-in" style="background-image: url('<?=base_url()?>img/gallery/`+data[4].image+`')">
                          <div class="project-item-content" data-fancy-type="`+data[4].type+`" data-fancy-src="`+data[4].src_url+`" data-id="`+data[4].gallery_id+`">
                            <div class="project-item-caption">
                              <h1 class="h2">`+data[4].gallery_name+`</h1>
                              <hr class="red left">
                              <span>`+data[0].gallery_description_short+`</span>
                            </div>
                          </div>
                       <!-- <img src="http://fakeimg.pl/1024x370/" class="img-ht img-fluid"> -->
                        </div>
                  </div>
                </div>
              </div>

              
    </div>
      `;

      return eles;
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
