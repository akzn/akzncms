
/*!
 * jQuery v1.7.10
 * http://github.com/akzn/bootstrap-fancy-img
 * 
 * how to use : 
 * give bootstrap-fancy-img class to img element
 * include bootstrap-fancy-img js file and css after jquery 
 
 * Changelog  
 
 * v0.4 
 * support dynamic elements 

 * v0.3 
 * add embed youtube 

 * v0.2
 * add video support
 */

$(function () {
    $('body').append('<div id="bootstrap-fancy" class="bootstrap-fancy modal"><span class="close">&times;</span><img class="modal-content" id="img01"><div id="caption"></div></div>');

    $('body').on('click','.bootstrap-fancy-img',function(){
        img=this;
        var modal = document.getElementById("bootstrap-fancy");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        // console.log($(this).data('src'));
        modal.style.display = "block";
        // modalImg.src = this.src;
        modalImg.src = $(this).data('fancy-src');
        // captionText.innerHTML = this.alt;
        captionText.innerHTML = $(this).data('alt');;

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
          modal.style.display = "none";
        }
    })


    /*video*/
    $('body').append('<div id="bootstrap-fancy-video-modal" class="bootstrap-fancy modal"><span class="close close-bootstrap-fancy">&times;</span><video class="modal-content" style="max-height:70vh; background-color:#000" controls id="bootstrap-fancy-video"><source></source></video><div id="caption"></div></div>');

    $('body').on('click','.bootstrap-fancy-video',function(){

        var modal = document.getElementById("bootstrap-fancy-video-modal");
        jvideo = $("#bootstrap-fancy-video");
        var video = document.getElementById('bootstrap-fancy-video');

        // var source = document.createElement('source');
        var source = video.getElementsByTagName('source')[0];

        srcUrl = $(this).data('fancy-src');

        source.setAttribute('src', srcUrl);
        
        // video.appendChild(source);

        video.load();

       
        // console.log($(this).data('src'));
        modal.style.display = "block";

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close-bootstrap-fancy")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
            video.pause();
          modal.style.display = "none";
        }

        jvideo.on('focusout', function(){
            video.pause();
          modal.style.display = "none";
        })
    })


    /*embed youtube*/
    $('body').append(`
        <div id="bootstrap-fancy-youtube-modal" class="bootstrap-fancy modal">
            <span class="close close-bootstrap-fancy">&times;</span>
            <div class="modal-content embed-responsive embed-responsive-16by9" style="width:50%">
                <iframe id="bootstrap-fancy-youtube" class="embed-responsive-item" src="" allowfullscreen></iframe>
            </div>
        </div>`);

    $('body').on('click','.bootstrap-fancy-youtube',function(){

        var modal = document.getElementById("bootstrap-fancy-youtube-modal");
        jmodal = $('#bootstrap-fancy-youtube-modal');
        jvideo = $("#bootstrap-fancy-youtube");
        // var video = document.getElementById('bootstrap-fancy-video');

        // // var source = document.createElement('source');
        // var source = video.getElementsByTagName('source')[0];

        srcUrl = $(this).data('fancy-src');
        // youtubeparam = '?modestbranding=1';
        youtubeparam = "?rel=0&modestbranding=1&showinfo=0&iv_load_policy=3&theme=light";

        srcUrl = srcUrl+youtubeparam;
        // srcUrl = 'https://www.youtube.com/embed/QH2-TGUlwu4?modestbranding=1';
        console.log(srcUrl)
        jvideo.attr('src', srcUrl);
        
        // // video.appendChild(source);

        // video.load();

       
        // console.log($(this).data('src'));
        modal.style.display = "block";

        // Get the <span> element that closes the modal
        var span = jmodal.find(".close-bootstrap-fancy");

        // When the user clicks on <span> (x), close the modal 
        span.on('click',function(){
            modal.style.display = "none";
            jvideo.attr('src', '');
        })

        jvideo.on('focusout', function(){
          modal.style.display = "none";
        })
    })


    botstrapFancyA = (selector)=>{
        classDone = 'fancied';
        ele = $(selector).not('.fancied');
         console.log(ele);
        // src = ele.data('fancy-src');

        ele.each(function(index,e){
            console.log($(this));
            type = $(this).data('fancy-type');
            switch(type) {
                case 'image':
                    $(this).addClass('bootstrap-fancy-img');
                    break;
                case 'video':
                    $(this).addClass('bootstrap-fancy-video');
                    break;
                case 'youtube':
                    $(this).addClass('bootstrap-fancy-youtube');
                    break;
                default:
                // code block
            }
        })


        // $(selector).not('.fancied').addClass('fancied');
        console.log($(selector).not('.fancied'));
    }

})
