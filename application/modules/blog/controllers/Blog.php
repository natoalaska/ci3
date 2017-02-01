<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MY_Controller {
    
    function __construct() {
		parent::__construct();
		
		/* Load Models */
		$this->load->model('blog/category');
		$this->load->model('blog/post');
		$this->load->model('blog/comment');
	}
	
	/** (Main) View all posts **/
	public function index() {
		$data['module'] = 'blog';
		$data['view_file'] = 'main/posts';
		$data['categories'] = $this->category->select();
		
		$search = $this->input->post('search');
		$category = $this->input->get('category');
		
		if (isset($search)) {
			$data['search'] = $search;
			$data['posts'] = $this->post->search($this->input->post('search'));
		} else if (isset($category)) {
			$data['posts'] = $this->post->select_where(array('category_id' => $category));
		} else {
			$data['posts'] = $this->post->select();
		}
		
		echo Modules::run('templates/Templates/main', $data);
	}
	
	/** (Admin) View all posts **/
	function posts() {
		$data['module'] = 'blog';
		$data['view_file'] = 'admin/posts';
		$data['modal'] = true;
		$data['model'] = 'post';
		$data['posts'] = $this->post->select();
		$data['categories'] = $this->category->select();
		echo Modules::run('templates/Templates/admin', $data);
	}
	
	/** (Main) View a single post **/
	function post($id) {
		$data['module'] = 'blog';
		$data['view_file'] = 'main/post';
		$data['categories'] = $this->category->select();
		$data['comments'] = $this->comment->select_where(array('post_id' => $id,'status' => 'approved'));
		$data['posts'] = $this->post->get_by_id($id);
		$data['post_id'] = $id;
		$data['model'] = 'post';
		echo Modules::run('templates/Templates/main', $data);
	}
	
	/** (Admin) View all categories **/
	function categories($data = NULL) {
		$data['module'] = 'blog';
		$data['view_file'] = 'admin/categories';
		$data['modal'] = true;
		$data['model'] = 'category';
		$data['categories'] = $this->category->select();
		echo Modules::run('templates/Templates/admin', $data);
	}
	
	/** (Admin) View all comments **/
	function comments() {
		$data['module'] = 'blog';
		$data['view_file'] = 'admin/comments';
		$data['modal'] = true;
		$data['model'] = 'comment';
		$data['comments'] = $this->comment->select();
		echo Modules::run('templates/Templates/admin', $data);
	}
	
	/**
	 * Gets a list of all posts
	 */
// 	function getPosts() {
//         $results = $this->post->select();
//         return $results;
//     }
	
	/**
	 * Returns post title
	 */
// 	function getPostTitle($id) {
//         return $this->post->getPostTitle($id);
//     }
	
	/**
	 * Get all posts by Category ID
// 	 */
// 	function getPostsByCategory($id) {
// 		return $this->post->getAllByCategory($id);
// 	}
	
	/**
	 * Add a Post
	 */
// 	function addPost() {
// 		$add = $this->input->post('add_edit');
// 		if($add == "" || empty($add)) {
// 			$data['module'] = 'blog';
// 			$data['view_file'] = 'admin/add_edit_post';
// 			echo Modules::run('templates/Templates/admin', $data);
// 		} else {
// 			$data['author'] = $this->input->post('author');
// 			$data['title'] = $this->input->post('title');
// 			$data['category_id'] = $this->input->post('category_id');
// 			$data['status'] = $this->input->post('status');
// 			$data['tags'] = $this->input->post('tags');
// 			$data['content'] = $this->input->post('content');
// 			$data['date'] = now('America/Anchorage');
// 			$data['comment_count'] = 0;

// 			$data['image'] = $_FILES['image']['name'];
// 			$image_temp = $_FILES['image']['tmp_name'];
			
// 			move_uploaded_file($image_temp, FCPATH . "assets/images/" . $data['image']);
			
// 			$this->post->add($data);
// 			redirect('admin/blog/posts');
// 		}
// 	}
	
	/**
	 * Edit a Post
	 */
// 	function editPost($id) {
// 		$edit = $this->input->post('add_edit');
// 		if($edit == "" || empty($edit)) {
// 			$data['module'] = 'blog';
// 			$data['view_file'] = 'admin/add_edit_post';
// 			$data['post'] = $this->post->getById($id);
// 			echo Modules::run('templates/Templates/admin', $data);
// 		} else {
// 			$data['author'] = $this->input->post('author');
// 			$data['title'] = html_escape($this->input->post('title'));
// 			$data['category_id'] = $this->input->post('category_id');
// 			$data['status'] = $this->input->post('status');
// 			$data['tags'] = $this->input->post('tags');
// 			$data['content'] = html_escape($this->input->post('content'));
// 			$data['date'] = now('America/Anchorage');
// 			$data['comment_count'] = 0;
			
// 			$data['image'] = $_FILES['image']['name'];
// 			$image_temp = $_FILES['image']['tmp_name'];
			
// 			if(empty($data['image'])) {
// 				$data['image'] = $this->post->getImage($id);
// 			} else {
// 				move_uploaded_file($image_temp, FCPATH . "assets/images/" . $data['image']);
// 			}
			
// 			$this->post->update($id, $data);
// 			$this->session->set_flashdata('message', 'Post Was Updated');
// 			$this->session->set_flashdata('messageType', 'success');
// 			redirect('admin/blog/posts');
// 		}	
// 	}
	
	/**
	 * Delete a Post
	 */
// 	function deletePost($id) {
// 		$data['id'] = $id;
// 		$this->post->delete($data);
// 		$this->session->set_flashdata('message', 'Post Was Deleted');
// 		$this->session->set_flashdata('messageType', 'warning');
// 		redirect('admin/blog/posts');
// 	}
	
// 	function postCount() {
// 		return $this->post->count();
// 	}
    
	/********** CATEGORIES **********/
	
	
	/**
	 * Gets a list of all categories
	 */
// 	function getCategories() {
//         $results = $this->category->select();
//         return $results;
//     }
	
	/**
	 * Gets a list of a category by id
	 */
// 	function getCategory($id) {
// 		return $this->category->getCategory($id);
// 	}
	
	/**
	 * Add a category
	 */
// 	function addCategory() {
// 		$data['title'] = $this->input->post('title');
// 		if($data['title'] == "" || empty($data['title'])) {
// 			$this->session->set_flashdata('message', 'You must enter a Category');
// 			$this->session->set_flashdata('messageType', 'danger');
// 			redirect('admin/blog/categories');
// 		} else {
// 			$this->category->add($data);
// 			$this->session->set_flashdata('message', 'Category Added');
// 			$this->session->set_flashdata('messageType', 'success');
// 			redirect('admin/blog/categories');
// 		}
// 	}
	
	/**
	 * Edit category view
	 */
// 	function editCategory($id) {
// 		$data['category'] = $this->category->getById($id);
// 		$this->categories($data);
// 	}
	
	/**
	 * Update a category
	 */
// 	function updateCategory() {
// 		$id = $this->input->post('id');
// 		$data['title'] = $this->input->post('title');
// 		$this->category->update($id, $data);
// 		$this->session->set_flashdata('message', 'Category Was Updated');
// 		$this->session->set_flashdata('messageType', 'success');
// 		redirect('admin/blog/categories');
// 	}
	
	/**
	 * Delete a category
	 */
// 	function deleteCategory($id) {
// 		$data['id'] = $id;
// 		$this->category->delete($data);
// 		$this->session->set_flashdata('message', 'Category Was Deleted');
// 		$this->session->set_flashdata('messageType', 'warning');
// 		redirect('admin/blog/categories');
// 	}
	
// 	function categoryCount() {
// 		return $this->category->count();
// 	}
	
	/********** COMMENTS **********/
	
	
	
	/**
	 * Gets a list of all comments for a post
	 */
// 	function getAllCommentsByPost($id) {
// 		return $this->comment->getAllByPostId($id);
// 	}
	
	/**
	 * Insert comment
	 */
// 	function addComment($id) {
// 		$this->form_validation->set_rules('author','Author','required');
// 		$this->form_validation->set_rules('email','Email','required');
// 		$this->form_validation->set_rules('content','Content','required');
		
// 		if($this->form_validation->run() == false) {
// 			$this->session->set_flashdata('message', validation_errors());
// 			$this->session->set_flashdata('messageType', 'danger');
// 			redirect(site_url('blog/post/'.$id));
// 		} else {
// 			$data['author'] = $this->input->post('author');
// 			$data['post_id'] = $id;
// 			$data['status'] = 'awaiting approval';
// 			$data['email'] = $this->input->post('email');
// 			$data['content'] = $this->input->post('content');
// 			$data['date'] = now('America/Anchorage');

// 			$this->post->updateCount($id, 'add');

// 			$this->comment->add($data);
// 			redirect('blog/post/'.$id);
// 		}
// 	}
	
	/**
	 * Change status
	 */
// 	function status($status,$id) {
// 		$this->comment->changeStatus($status,$id);
// 		$this->session->set_flashdata('message', 'Comment Status was Updated');
// 		$this->session->set_flashdata('messageType', 'success');
// 		redirect('admin/blog/comments');
// 	}
	
	/**
	 * Delete comment
	 */
// 	function deleteComment($id,$post_id) {
// 		$data['id'] = $id;
// 		$this->comment->delete($data);
// 		$this->post->updateCount($post_id, 'remove');
// 		$this->session->set_flashdata('message', 'Comment Was Deleted');
// 		$this->session->set_flashdata('messageType', 'warning');
// 		redirect('admin/blog/comments');
// 	}
	
// 	function commentCount() {
// 		return $this->comment->count();
// 	}
	
	/********** MISC **********/
	
	/**
	 * Search posts by tags
	 */
// 	function getSearch($search) {
// 		return  $this->post->getSearch($search);
// 	}
	
// 	function count($table, $where=NULL) {
// 		return $this->{$table}->count_all($where);
// 	}
    
}

/* End of file auth.php */
/* Location: ./application/modules/blog/controllers/Blog.php */