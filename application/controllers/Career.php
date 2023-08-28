<?php
/*

@Class Name : Career
this controller are extension for article controller 
for career/job vacancy purpose
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends MY_Controller {
	
	// Blog By Category
	public function index() {
        $slugBlog = 'career';

		$site  		= $this->mConfig->list_config();
		$categories = $this->mCategories->listCategories();
		$lastBlogs 	= $this->mBlogs->listLastBlogsPub();
		$detailCategory = $this->mCategories->detailCategorySlug($slugBlog);
		$blogs 		= $this->mBlogs->getAllBlogsByCategory($slugBlog);

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'career/index/';
		$config['total_rows'] 		= $this->mBlogs->totalBlogsByCategory($slugBlog);
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 1;
		$config['first_url'] 		= base_url().'career/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$blogs 		= $this->mBlogs->listBlogsPub($slugBlog, $config['per_page'], $page);
		// End Pagination			
		
		$data = array(	
            'title'		=> 'Career '.' - '.$site['nameweb'],
            'site'		=> $site,
            'blogs'		=> $blogs,
            'categories'=> $categories,
            'detailCategory'=> $detailCategory,
            'lastBlogs' => $lastBlogs,
            'pagination' 	=> $this->pagination->create_links(),
        );

        $this->template->load($this->wrapper,$this->theme_dir.'career/archieve',$data);

	}  

    // Read Blog
	public function detail($slugBlog) {

		$site  		= $this->mConfig->list_config();
		$blog 		= $this->mBlogs->readBlog($slugBlog);
		$categories = $this->mCategories->listCategories();
		$comments   = $this->mBlogs->listCommentsByBlog($slugBlog);
        $blogId 	= $blog['blog_id'];
        $count  	= $this->mBlogs->countCommentByBlog($blogId);                                            		
		
		$data = array(	'title'		=> $blog['title'].' - '.$site['nameweb'],
						'site'		=> $site,
						'blog'		=> $blog,
						'categories'=> $categories,
						'count'		=> $count,
						'comments'	=> $comments,
		);
		// $this->load->view('front2/layout/wrapper',$data);
		$this->template->load($this->wrapper,$this->theme_dir.'career/single',$data);

	}

}