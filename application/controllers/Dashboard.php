<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        $airdrops = $this->getAirdrops();

        $user_id = $this->session->userdata('user_id');

        $filteredAirdrops = array_filter($airdrops, function ($airdrop) use ($user_id) {
            return $airdrop['user_id'] == $user_id;
        });

        $ongoingCount = 0;
        $claimedCount = 0;
        $cancelledCount = 0;

        foreach ($filteredAirdrops as $airdrop) {
            if ($airdrop['status'] == 'Ongoing') {
                $ongoingCount++;
            } elseif ($airdrop['status'] == 'Claimed') {
                $claimedCount++;
            } elseif ($airdrop['status'] == 'Cancelled') {
                $cancelledCount++;
            }
        }

        $data['ongoingCount'] = $ongoingCount;
        $data['claimedCount'] = $claimedCount;
        $data['cancelledCount'] = $cancelledCount;
        $data['isi'] = 'Dashboard/index';

        $this->load->view('layout/wrapper', $data);
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
}
