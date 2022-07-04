<?php
    class Users extends Controller {
         public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function info() {
            $user = $this->userModel->getUserById($_SESSION['user_id']);

            $data = [
                'title' => 'Account info',
                'user' => $user,
            ];

            $this->view('users/info', $data);
        }
        public function register() {
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize Post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                   ];

                // validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                } else {
                    // check email
                    if($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'This email is used';
                    }
                }

                // validate Name
                if(empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }

                // validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter name';
                } elseif (strlen($data['password']) <6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // validate confirm Password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                }else {
                    if($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Password do not match';
                    }
                }

                // Make sure errors are empty
                if (empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                    // validate
                    
                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    $this->userModel->register($data);
                    flash('login_message', 'Your are register and you can now login');
                    redirect('users/login');

                } else {
                    // Load view with errors
                    $this->view('/users/register', $data);
                }
              
            } else {
               $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
               ];

               // Load view
                $this->view('users/register', $data);
            }

            
        }

        public function login () {
            
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form
                // Sanitize Post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                   ];

                 // validate Email
                 if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }
                 // validate Password
                 if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter a password';
                }
                

                 // Check user/email
                 if($this->userModel->findUserByEmail($data['email'])) {
                    // User found
                } else {
                    $data['email_err'] = 'No user found';
                }
                 // Make sure errors are empty
                 if (empty($data['email_err']) && empty($data['password_err']) ) {
                    // validate
                    // check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser) {
                        // create Session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Password incorrect';
                        $this->view('users/login', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('/users/login', $data);
                }
                

            } else {
                // init data
            
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Load view
                $this->view('users/login', $data);
            }
        }
        public function edit() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Process form

                // Sanitize Post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // init data
                $data = [
                    'email' => $_SESSION['user_email'],
                    'password' => trim($_POST['password']),
                    'new_password' => trim($_POST['new_password']),
                    'confirm_new_password' => trim($_POST['confirm_new_password']),
                    'password_err' => '',
                    'new_password_err' => '',
                    'confirm_new_password_err' => '',

                   ];

                // validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter your old password';
                } else {
                    // check password
                    if($this->userModel->checkPassword(($data['email']), $data['password'])) {
                        $data['password_err'] = 'This password is incorrect';
                    }
                }

                // validate New Password
                if(empty($data['new_password'])) {
                    $data['new_password_err'] = 'Please enter a password';
                } elseif (strlen($data['new_password']) <6) {
                    $data['new_password_err'] = 'Password must be at least 6 characters';
                }

                // validate confirm New Password
                if(empty($data['confirm_new_password'])) {
                    $data['confirm_new_password_err'] = 'Please confirm  new password';
                }else {
                    if($data['new_password'] != $data['confirm_new_password']) {
                        $data['confirm_new_password_err'] = 'Password do not match';
                    }
                }

                // Make sure errors are empty
                if (empty($data['password_err']) && empty($data['new_password_err']) && empty($data['confirm_new_password_err'])) {
                    // validate
                    
                    // Hash Password
                    $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);

                    // Update User
                    if($this->userModel->update($data)) {
                        flash('login_message', 'Your password is updated, please login again');
                         $this->logout();
                    } else  {
                        die('something gone wrong');
                    }

                } else {
                    // Load view with errors
                    $this->view('/users/edit', $data);
                }
              
            } else {
                // init data
                
                $data = [
                    'email' => $_SESSION['user_email'],
                    'password' => '',
                    'new_password' => '',
                    'confirm_new_password' => '',
                    'password_err' => '',
                    'new_password_err' => '',
                    'confirm_new_password_err' => '',
                ];

                // Load view
                $this->view('users/edit', $data);
            }
        }

        public function createUserSession($user) {
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_password'] = $user->password;
            redirect('posts');
        } 


        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_password']);
            session_destroy();
            flash('login_message', 'Your are now logged out.');
            redirect('users/login');

        }

        
    }