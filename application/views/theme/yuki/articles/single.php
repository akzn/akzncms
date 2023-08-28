<div class="container container-content"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
        
            <div class="row">
                <div class="col-md-12">

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url('articles')?>">Articles</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $blog['title'];?></li>
                    </ol>
                </nav> 

                </div>
            </div>

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
                <div class="col-12">
                    <figure class="news-featured-image">	
                        <img src="<?php echo base_url('assets/upload/image/'.$blog['image']);?>" alt="Featured image 4" class="img-fluid <?=($blog['slug_category'] == 'banner') ? 'd-none':''?>" />
                    </figure>
                </div>
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        	<div class="col-lg-12 col-md-12">
                                
                                <div class="news-title-meta mb-4">
                                    <h2 class="page-title mb-1"><?php echo $blog['title'];?></h2>
                                    <div class="news-meta">
                                        <span class="news-meta-date"><?php echo date('l, d/m/Y', strtotime($blog['date_post'])); ?></span>
                                        <span class="news-meta-category ml-3"><a href="<?php echo $blog['category_name'];?>" title="<?php echo $blog['category_name'];?>"><?php echo $blog['category_name'];?></a></span>
                                        <span class="news-meta-comments ml-3"><a href="#" title="3 comments"><?php echo $count;?> comments</a></span>
                                    </div>
                                </div>
                                
                                <div class="news-body">
                                    <!-- <p><?php echo $blog['title'];?></p>                                     -->
                                    <?php echo $blog['content'];?>
                                </div>                            
                            
                            </div>
                        
                        </div><!-- row end -->  
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                
                            </div>
                        </div> 
                        
                                    
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                	
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widget -->
                    
                                <h2 class="title-widget">Kategori Artikel</h2>
                                <?php foreach ($categories as $category){?>
                                <ul>
                                	<li><a href="<?php echo base_url('articles/category/'.$category['slug_category']);?>" title="menu item"><?php echo $category['category_name'];?></a></li>
                                </ul>
                                <?php } ?>                
							</li>
                            
                        	<li class="widget-container widget_up_events mt-5"><!-- widget -->
                    
                                <h2 class="title-widget">Artikel Terkait</h2>
                                
                                <ul class="list-unstyled">
                                
                                <?php
                                $category_id = $blog['category_id'];
                                $blogTerkait = $this->mBlogs->blogTerkait($category_id);
                                $i=0;
                                foreach ($blogTerkait as $blogTerkait){
                                    if ($i == 1 && $blogTerkait['blog_id']++ < 10) { 
                                ?>
                                    <li class="up-event-wrap">
                                
                                        <h5 class="title-median"><a href="<?php echo base_url('blog/detil/'.$blogTerkait['slug_blog']);?>" title="<?php echo $blogTerkait['title'];?>"><?php echo $blogTerkait['title'];?></a></h5>
                                        
                                        <div class="up-event-meta clearfix">
                                        <span class="news-meta-date"><?php echo date('l, d/m/Y', strtotime($blogTerkait['date_post'])); ?></span>
                                        </div>
                                        
                                        <div class="news-body">
                                            <p>
                                                <?php
                                                    $out = strlen($blogTerkait['content']) > 150 ? substr($blogTerkait['content'],0,150).'... <a href="'. base_url('blog/detil/'.$blogTerkait['slug_blog']).'" class="moretag"> more</a> ' : $blogTerkait['content'];
                                                    echo $out;
                                                ?>  
                                            </p>                                    
                                        </div>
                                    
                                    </li>                            
                                <?php }else{ $i++; }} ?>
                                
                                </ul>
                            
                            </li>                            
                            
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- sidebar wrapper end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- content wrapper end -->    