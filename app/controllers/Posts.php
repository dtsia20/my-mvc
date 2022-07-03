<?php
    class Posts extends Controller {

        public function __construct() {
            if(!isLoggedin()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }

        public function index() {
            $posts = $this->postModel->getPosts();

            $data = [
                'title' => 'Posts',
                'posts' => $posts,
            ];

            $this->view('posts/index', $data);
        }

        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' =>  trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' =>'',
                    'body_err' =>'',
                ];

                // validate title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter a title';
                }
                // validate body
                if(empty($data['body'])) {
                    $data['body_err'] = 'Please enter some text';
                }

                if(empty($data['title_err']) && empty($data['body_err'])) {
                    // Validate
                    if($this->postModel->addPost($data)) {
                        flash('post-message', 'The post is added');
                        redirect('posts');
                    } else {
                        die('Something gone wrong!');
                    }

                } else {
                    // load view with errors
                    $this->view('posts/add', $data);
                }

            } else {
                $data = [
                    'title' => '',
                    'body' => '',
                ];

                $this->view('posts/add', $data);
            }
        }


        public function edit($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize post
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' =>  trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' =>'',
                    'body_err' =>'',
                ];

                // validate title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter a title';
                }
                // validate body
                if(empty($data['body'])) {
                    $data['body_err'] = 'Please enter some text';
                }

                if(empty($data['title_err']) && empty($data['body_err'])) {
                    // Validate
                    if($this->postModel->updatePost($data)) {
                        flash('post-message', 'The post was updated');
                        redirect('posts');
                    } else {
                        die('Something gone wrong!');
                    }

                } else {
                    // load view with errors
                    $this->view('posts/edit', $data);
                }

            } else {
                $post = $this->postModel->getPostById($id);
                // check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                $data = [
                    'id' => $post->id,
                    'title'=> $post->title,
                    'body' => $post->body

                ];

                $this->view('posts/edit', $data);
                
            }
        }

        public function show($id) {
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user,

            ];

            $this->view('posts/show', $data);
        }

        public function delete($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('posts');
                }

                if($this->postModel->deletePost($id)) {
                    flash('post-message', 'the post was deleted');
                    redirect('posts');
                } else {
                    die ('something went wrong');
                }
            } else {
                redirect('posts');
            }
        }    

    }