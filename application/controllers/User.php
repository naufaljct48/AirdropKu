<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session'); // Load session library
    }

    public function settings()
    {
        $data['isi'] = 'user/settings';
        $this->load->view('layout/wrapper', $data);
    }

    public function update_settings()
    {
        $email = $this->input->post('email');
        $current_password = $this->input->post('currentPassword');
        $new_password = $this->input->post('newPassword');

        $accounts_file = APPPATH . 'data/accounts.json';
        $accounts_data = json_decode(file_get_contents($accounts_file), true);

        $user_id = $this->session->userdata('user_id');
        $response = array('success' => false);

        foreach ($accounts_data as $index => $account) {
            if ($account['id'] == $user_id && password_verify($current_password, $account['password'])) {
                if (!empty($email)) {
                    $accounts_data[$index]['email'] = $email;
                }
                if (!empty($new_password)) {
                    $accounts_data[$index]['password'] = password_hash($new_password, PASSWORD_DEFAULT);
                }

                file_put_contents($accounts_file, json_encode($accounts_data));
                $response['success'] = true;
                break;
            } else {
                $response['message'] = 'Current password is incorrect.';
            }
        }

        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
