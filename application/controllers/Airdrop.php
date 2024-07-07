<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Airdrop extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load any models or libraries here if needed
    }

    public function index()
    {
        $data['airdrops'] = $this->getAirdrops();
        $data['isi'] = 'Airdrop/index';
        $this->load->view('layout/wrapper', $data);
    }

    public function Add()
    {
        $data['isi'] = 'Airdrop/Add';
        $this->load->view('layout/wrapper', $data);
    }

    public function save()
    {
        $user_id = $this->session->userdata('user_id');

        $airdropData = array(
            'id' => $this->generateAirdropId(),
            'user_id' => $user_id,
            'projectName' => $this->input->post('projectName'),
            'accountCount' => $this->input->post('accountCount'),
            'airdropDescription' => $this->input->post('airdropDescription'),
            'projectLink' => $this->input->post('projectLink'),
            'status' => 'Ongoing',
            'date_added' => date('Y-m-d H:i:s'),
            'date_edited' => '',
            'date_deleted' => ''
        );

        $airdrops = $this->getAirdrops();

        $airdrops[] = $airdropData;

        $this->saveAirdrops($airdrops);

        $response['success'] = true;

        header('Content-Type: application/json');
        echo json_encode($response);
    }


    private function getAirdrops()
    {
        $airdrops_file = APPPATH . 'data/airdrops.json';
        if (file_exists($airdrops_file)) {
            $airdrops_data = json_decode(file_get_contents($airdrops_file), true);
            return $airdrops_data;
        } else {
            return array();
        }
    }

    private function saveAirdrops($airdrops)
    {
        $airdropsFile = APPPATH . 'data/airdrops.json';
        file_put_contents($airdropsFile, json_encode($airdrops, JSON_PRETTY_PRINT));
    }

    private function generateAirdropId()
    {
        $airdrops = $this->getAirdrops();

        return count($airdrops) + 1;
    }
    public function List()
    {
        $data['isi'] = 'Airdrop/List';
        $this->load->view('layout/wrapper', $data);
    }

    public function getAirdropData()
    {
        $user_id = $this->session->userdata('user_id');
        $airdrops = $this->getAirdrops();

        $filteredAirdrops = array_filter($airdrops, function ($airdrop) use ($user_id) {
            return $airdrop['user_id'] == $user_id;
        });

        $search = $this->input->post('search')['value'];
        $orderColumnIndex = $this->input->post('order')[0]['column'];
        $orderColumn = $this->input->post('columns')[$orderColumnIndex]['data'];
        $orderDirection = $this->input->post('order')[0]['dir'];

        if (!empty($search)) {
            $filteredAirdrops = array_filter($filteredAirdrops, function ($airdrop) use ($search) {
                return stripos($airdrop['projectName'], $search) !== false ||
                    stripos($airdrop['accountCount'], $search) !== false ||
                    stripos($airdrop['airdropDescription'], $search) !== false ||
                    stripos($airdrop['projectLink'], $search) !== false;
            });
        }

        $start = $this->input->post('start');
        $filteredAirdrops = array_values($filteredAirdrops);
        foreach ($filteredAirdrops as $index => $airdrop) {
            $filteredAirdrops[$index]['number'] = $index + 1 + $start;
        }

        usort($filteredAirdrops, function ($a, $b) use ($orderColumn, $orderDirection) {
            if ($orderDirection === 'asc') {
                return strcmp($a[$orderColumn], $b[$orderColumn]);
            } else {
                return strcmp($b[$orderColumn], $a[$orderColumn]);
            }
        });

        $length = $this->input->post('length');
        $pagedAirdrops = array_slice($filteredAirdrops, $start, $length);

        $response = array(
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => count($airdrops),
            "recordsFiltered" => count($filteredAirdrops),
            "data" => $pagedAirdrops
        );

        error_log(json_encode($response));

        header('Content-Type: application/json');
        echo json_encode($response);
    }



    public function getAirdropById()
    {
        $airdropId = $this->input->post('id');
        $airdrops = $this->getAirdrops();

        foreach ($airdrops as $airdrop) {
            if ($airdrop['id'] == $airdropId) {
                header('Content-Type: application/json');
                echo json_encode($airdrop);
                return;
            }
        }

        $response['error'] = 'Airdrop not found';
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    public function updateStatus()
    {
        $airdropId = $this->input->post('id');
        $status = $this->input->post('status');

        $airdrops = $this->getAirdrops();
        foreach ($airdrops as &$airdrop) {
            if ($airdrop['id'] == $airdropId) {
                $airdrop['status'] = $status;
                $airdrop['date_edited'] = date('Y-m-d');
            }
        }
        $this->saveAirdrops($airdrops);

        $response['success'] = true;
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function editAirdrop()
    {
        $airdropId = $this->input->post('id');
        $airdropData = array(
            'projectName' => $this->input->post('projectName'),
            'accountCount' => $this->input->post('accountCount'),
            'airdropDescription' => $this->input->post('airdropDescription'),
            'projectLink' => $this->input->post('projectLink'),
            'date_edited' => date('Y-m-d')
        );

        $airdrops = $this->getAirdrops();
        foreach ($airdrops as &$airdrop) {
            if ($airdrop['id'] == $airdropId) {
                $airdrop = array_merge($airdrop, $airdropData);
            }
        }
        $this->saveAirdrops($airdrops);

        $response['success'] = true;
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
