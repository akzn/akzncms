<?php
	/*
    
    @Class Name : Blog(Front2)
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends MY_Controller {
	
	// Main Page Blogs
	public function index() {

		$site  		= $this->mConfig->list_config();
		$categories = $this->mCategories->listCategories();
		$lastBlogs 	= $this->mBlogs->listLastBlogsPub();

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'articles/index/';
		$config['total_rows'] 		= count($this->mBlogs->totalBlogs());
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 10;
		$config['first_url'] 		= base_url().'articles/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(3)) ? ($this->uri->segment(3) - 1) * $config['per_page'] : 0;
		$blogs 		= $this->mBlogs->perPageBlogs($config['per_page'], $page);
		// End Pagination		
		
		$data = array(	
			'title'		=> 'Articles',
			'site'		=> $site,
			'blogs'		=> $blogs,
			'categories'=> $categories,
			'lastBlogs'	=> $lastBlogs,
			'pagination' 	=> $this->pagination->create_links(),												
		);
		$this->template->load($this->wrapper,$this->theme_dir.'articles/archieve',$data);

	}

	// Search Blog
	public function search(){

		$site 		= $this->mConfig->list_config();
		$categories = $this->mCategories->listCategories();
		$lastBlogs 	= $this->mBlogs->listLastBlogsPub();			

		if (isset($_POST['query'])) {
			$data['ringkasan'] = $this->input->post('query');
			$this->session->set_userdata('sess_ringkasan', $data['ringkasan']);
		}
		else {
			$data['ringkasan'] = $this->session->userdata('sess_ringkasan');
		}

		$this->load->model('mBlogs');
		$this->db->like('title', $data['ringkasan']);
        $this->db->from('blogs');

		// pagination limit
		$pagination['base_url'] = base_url().'articles/search/index/';
		$pagination['total_rows'] = $this->db->count_all_results();
		$pagination['per_page'] = "10";
		$pagination['uri_segment'] = 4;
		$pagination['num_links'] = 5;

		$this->pagination->initialize($pagination);

		$blogs= $this->mBlogs->cariBlog($pagination['per_page'],$this->uri->segment(4,0),$data['ringkasan']);

		$data = array(	
			'title'		=> 'Search Result - '. $data['ringkasan'],
			'site'		=> $site,
			'blogs'		=> $blogs,
			'categories'=> $categories,
			'lastBlogs'	=> $lastBlogs,
			'pagination' 	=> $this->pagination->create_links(),												
		);

		// $this->load->vars($data);
		// $this->load->view('front2/layout/wrapper');
		$this->template->load($this->wrapper,$this->theme_dir.'articles/archieve',$data);

	}	

	// Read Blog
	public function article($slugBlog) {

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
		$this->template->load($this->wrapper,$this->theme_dir.'articles/single',$data);

	}

  	// Reply Blog
	public function replyBlog(){

		if ($this->input->post('message')){
			$this->mBlogs->replyBlog();
		}

		$this->session->set_flashdata('sukses','Success');  	
		header('Location: ' . $_SERVER['HTTP_REFERER']);
  	}	

	// Blog By Category
	public function category($slugBlog) {

		$site  		= $this->mConfig->list_config();
		$categories = $this->mCategories->listCategories();
		$lastBlogs 	= $this->mBlogs->listLastBlogsPub();
		$detailCategory = $this->mCategories->detailCategorySlug($slugBlog);
		$blogs 		= $this->mBlogs->getAllBlogsByCategory($slugBlog);

		// Pagination
		$this->load->library('pagination');
		$config['base_url'] 		= base_url().'articles/category/index/';
		$config['total_rows'] 		= $this->mBlogs->totalBlogsByCategory($slugBlog);
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['per_page'] 		= 1;
		$config['first_url'] 		= base_url().'articles/category/';
		$this->pagination->initialize($config); 
		$page 		= ($this->uri->segment(4)) ? ($this->uri->segment(4) - 1) * $config['per_page'] : 0;
		$blogs 		= $this->mBlogs->getAllBlogsByCategory($slugBlog, $config['per_page'], $page);
		// End Pagination			
		
		$data = array(	'title'		=> 'Articles - '.$detailCategory['category_name'],
						'site'		=> $site,
						'blogs'		=> $blogs,
						'categories'=> $categories,
						'detailCategory'=> $detailCategory,
						'lastBlogs' => $lastBlogs,
						'pagin' 	=> $this->pagination->create_links(),																		
						);
		// $this->load->view('front2/layout/wrapper',$data);
		$this->template->load($this->wrapper,$this->theme_dir.'articles/archieve',$data);
	}  

}