    <style>
        #k-contact-map{
            position: relative;
            overflow: hidden;
            padding-bottom: 100%; /* 16:9 aspect ratio for responsive iframe */
            height: 0;
        }
        @media  (min-width: 768px){
            #k-contact-map{
            padding-bottom: 56.25%; /* 16:9 aspect ratio for responsive iframe */
        }
        }
    </style>
    
    	<div class="container container-content"><!-- container -->
        
        	<div class="row"><!-- row -->                            
            
            	<div class="k-breadcrumbs col-lg-12 clearfix"><!-- breadcrumbs -->
                <nav aria-label="breadcrumb">
                	<ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                    	<li class="breadcrumb-item"><a href="<?php echo base_url('about');?>">About</a></li>
                        <li class="breadcrumb-item active"><?=$this->lang->line('h-contact-us')['header-caption']?></li>
                    </ol>
                </nav>
                </div><!-- breadcrumbs end -->               
                
            </div><!-- row end -->
            <?php
            // Session 
            if($this->session->flashdata('sukses')) { 
                echo '<div class="alert alert-success">';
                echo $this->session->flashdata('sukses');
                echo '</div>';
            } 
            // Error
            echo validation_errors('<div class="alert alert-success">','</div>'); 
            ?>            
            <div class="row no-gutter"><!-- row -->
                
                <div class="col-lg-8 col-md-8 offset-md-2"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12">
                            
                                <h1 class="page-title text-center "><?=$this->lang->line('h-contact-us')['header-caption']?></h1>
                                <hr class="divider mb-4">
                                
                                <div class="news-body">
                                    
                                    <div class="row" style="">
                                    	<div class="col-lg-6 col-md-6 col-sm-12" data-aos="zoom-in">
                                        	<h6 class="remove-margin-bottom"><?=$this->lang->line('h-contact-us')['address']?></h6>
											<p class="small"><?php echo $site['address'];?></p>  
                                  
                                        </div>
                                        
                                    	<div class="col-lg-6 col-md-6 col-sm-12">
                                        	<h6 class="remove-margin-bottom"><?=$this->lang->line('h-contact-us')['phone']?></h6>
											<p class="small">Tel: <?php echo $site['phone_number'];?>   |   Fax: <?php echo $site['fax'];?></p>


                                            <h6 class="remove-margin-bottom">Email</h6>
                                            <p class="small"><?php echo $site['email'];?></p> 

                                            <h6 class="remove-margin-bottom"><?=$this->lang->line('h-contact-us')['social']?></h6>
                                            <ul class="list-inline social-buttons mt-3">
                                                <?php if ($site['twitter']!=''): ?>
                                                  <li class="list-inline-item text-center" >
                                                      <a href="<?=$site['twitter']?>" target="_blank">
                                                        <i class="fab fa-twitter"></i>
                                                      </a>
                                                    </li>
                                                <?php endif ?>
                                                
                                                <?php if ($site['facebook']!=''): ?>
                                                   <li class="list-inline-item  text-center">
                                                      <a href="<?=$site['facebook']?>" target="_blank">
                                                        <i class="fab fa-facebook-f"></i>
                                                      </a>
                                                    </li>
                                                <?php endif ?>

                                                 <?php if ($site['instagram']!=''): ?>
                                                   <li class="list-inline-item  text-center">
                                                      <a href="<?=$site['instagram']?>" target="_blank">
                                                        <i class="fab fa-instagram"></i>
                                                      </a>
                                                    </li>
                                                <?php endif ?>

                                              </ul>

                                        </div>
                                    </div>
                                    
                                    

                                    <div id="k-contact-map" class="clearfi  mt-5" style=""><!-- map -->
                                        <iframe style="width:100%;height:450px" frameborder="0" style="border:0"
                                        src="<?php echo $site['google_maps'];?>" allowfullscreen></iframe>                
                                    </div>
                                <hr>

                                </div>
                            
                            </div>
                        
                        </div><!-- row end -->               
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    

 