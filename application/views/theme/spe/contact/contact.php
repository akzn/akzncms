
    
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
                
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12">
                            
                                <h1 class="page-title pb-4"><?=$this->lang->line('h-contact-us')['header-caption']?></h1>
                                
                                <div class="news-body">
                                    
                                    <div class="row" style="margin-top:-40px;">
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
                                            <ul class="list-inline social-buttons mt-3" style ="    text-align: center;">
                                                <?php if ($site['twitter']!=''): ?>
                                                  <li class="list-inline-item" >
                                                      <a href="<?=$site['twitter']?>" target="_blank">
                                                        <i class="fab fa-twitter"></i>
                                                      </a>
                                                    </li>
                                                <?php endif ?>
                                                
                                                <?php if ($site['facebook']!=''): ?>
                                                   <li class="list-inline-item">
                                                      <a href="<?=$site['facebook']?>" target="_blank">
                                                        <i class="fab fa-facebook-f"></i>
                                                      </a>
                                                    </li>
                                                <?php endif ?>

                                                 <?php if ($site['instagram']!=''): ?>
                                                   <li class="list-inline-item">
                                                      <a href="<?=$site['instagram']?>" target="_blank">
                                                        <i class="fab fa-instagram"></i>
                                                      </a>
                                                    </li>
                                                <?php endif ?>

                                              </ul>

                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <h6 class="mt-5 mt-md-1"><?=$this->lang->line('h-contact-us')['message']?></h6>
                                    
                                    <form id="contactform" method="post" action="<?php echo base_url('kontak');?>">
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                <label for="contactName"><span class="required">*</span> Name</label>
                                                <input type="text" aria-required="true" size="30" value="" name="name" id="contactName" class="form-control requiredField" />
                                            </div>
                                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                                <label for="email"><span class="required">*</span> E-mail</label>
                                                <input type="text" aria-required="true" size="30" value="" name="email" id="email" class="form-control requiredField" />
                                            </div>
                                        </div><!-- ends row --> 
                                        
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group col-lg-12">
                                                <label for="contactSubject">Message Subject</label>
                                                <input type="text" aria-required="true" size="30" value="" name="subject" id="contactSubject" class="form-control" />
                                            </div>
                                        </div><!-- ends row -->
                                        
                                        <div class="row"><!-- starts row -->
                                            <div class="form-group clearfix col-lg-12">
                                                <label for="comments"><span class="required">*</span> Message</label>
                                                <textarea aria-required="true" rows="5" cols="45" name="messages" id="comments" class="form-control requiredField mezage"></textarea>
                                            </div>
                            
                                            <div class="form-group clearfix col-lg-12 text-right remove-margin-bottom">
                                                <input type="hidden" name="submitted" id="submitted" value="true" />
                                                <input type="submit" value="<?=$this->lang->line('btn_send_message')?>" id="submit" name="submit" class="btn btn-primary" />
                                            </div>
                                        </div><!-- ends row -->
                                    </form>
                                    
                                    <hr />

                                    <div id="k-contact-map" class="clearfi d-none d-md-block"><!-- map -->
                                        <iframe width="700" height="450" frameborder="0" style="border:0"
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
    

 