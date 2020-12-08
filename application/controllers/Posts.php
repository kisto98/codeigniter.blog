<?php
	class Posts extends CI_Controller{
        
        public function index($offset=0){

            $pagination['base_url'] = base_url() . 'posts/index/';
			$pagination['total_rows'] = $this->db->count_all('posts');
			$pagination['per_page'] = 3;
			$pagination['uri_segment'] = 3;
			$pagination['attributes'] = array('class' => 'pagination-link');

			// Init Pagination
			$this->pagination->initialize($pagination);


			$data['title'] = "To-do";

            $data['posts'] = $this->post_model->get_posts(FALSE, $pagination['per_page'], $offset);
            
			$this->load->view('templates/header');
			$this->load->view('posts/index', $data);
			$this->load->view('templates/footer');
        }
        
        public function view($slug=NULL){
            $data['post']=$this->post_model->get_posts($slug);
            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = $data['post']['title'];
            $this->load->view('templates/header');
			$this->load->view('posts/view', $data);
			$this->load->view('templates/footer');

        }

        public function allposts($offset=0){
            $pagination['base_url'] = base_url() . 'posts/allposts/';
			$pagination['total_rows'] = $this->db->count_all('posts');
			$pagination['per_page'] = 3;
			$pagination['uri_segment'] = 3;
			$pagination['attributes'] = array('class' => 'pagination-link');

			// Init Pagination
			$this->pagination->initialize($pagination);


			$data['title'] = "All posts";

            $data['posts'] = $this->post_model->get_posts(FALSE, $pagination['per_page'], $offset);
            
			$this->load->view('templates/header');
			$this->load->view('posts/allposts', $data);
			$this->load->view('templates/footer');
        }

        public function create(){
            $data['title'] = 'Create post';

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run()===false){
                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer'); 
            }
            else{

                $config['upload_path'] = './uploads';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
				} else {
					$data = array('upload_data' => $this->upload->data());
					$file_name = $_FILES['userfile']['name'];
				}

				$this->post_model->create_post($file_name);



				redirect('posts');
			}
        }
        

        public function delete($id){
            $this->post_model->delete_post($id);
            redirect('posts');
        }

        public function edit($slug){
            $data['post']=$this->post_model->get_posts($slug);
            if(empty($data['post'])){
                show_404();
            }

            $data['title'] = 'Edit post';
            $this->load->view('templates/header');
			$this->load->view('posts/edit', $data);
			$this->load->view('templates/footer');
        }

        public function update(){
            $this->post_model->update_post();
            redirect('posts');
        }
	}