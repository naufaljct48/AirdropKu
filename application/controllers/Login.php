<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load any models or libraries here if needed
        $this->load->library('session'); // Load session library
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function authenticate()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $accounts_file = APPPATH . 'data/accounts.json';
        $accounts_data = json_decode(file_get_contents($accounts_file), true);

        $authenticated = false;
        $user_id = null;
        $user_role = null;
        foreach ($accounts_data as $index => $account) {
            if ($account['email'] === $email && password_verify($password, $account['password'])) {
                $authenticated = true;
                $user_id = $account['id'];
                $email = $account['email'];
                $user_role = $account['role'];
                // Update last_login
                $accounts_data[$index]['last_login'] = date('Y-m-d H:i:s');
                break;
            }
        }

        if ($authenticated) {
            // Save updated accounts data back to the JSON file
            file_put_contents($accounts_file, json_encode($accounts_data));

            // Set session data
            $session_data = array(
                'user_id' => $user_id,
                'email' => $email,
                'user_role' => $user_role,
                'logged_in' => true
            );
            $this->session->set_userdata($session_data);

            $response['success'] = true;
        } else {
            $response['success'] = false;
        }

        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
