<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load necessary libraries and helpers
    }

    public function index()
    {
        $this->load->view('register');
    }

    public function create_account()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = 'user';
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $accounts_file = APPPATH . 'data/accounts.json';
        $accounts_data = json_decode(file_get_contents($accounts_file), true);

        if (!$accounts_data) {
            $accounts_data = [];
        }

        $new_account = array(
            'id' => uniqid(),
            'email' => $email,
            'password' => $hashed_password,
            'role' => $role,
            'registration_date' => date('Y-m-d H:i:s'),
            'last_login' => ''
        );

        $accounts_data[] = $new_account;

        file_put_contents($accounts_file, json_encode($accounts_data));

        $response = array(
            'success' => true,
            'message' => 'Account registered successfully'
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
