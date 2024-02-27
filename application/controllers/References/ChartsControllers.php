<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class ChartsControllers extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
    }
    public function chartsApex(){
        if(!isset($_SESSION['username'])){
            redirect();
        }
        $this->load->view('AdminPanel/charts-apexcharts');
    }

    public function chartsjs(){
        if(!isset($_SESSION['username'])){
            redirect();
        }
        $this->load->view('AdminPanel/charts-chartjs');
    }
    public function echarts(){
        if(!isset($_SESSION['username'])){
            redirect();
        }
        $this->load->view('AdminPanel/charts-echarts');
       
    }
    public function morisjs(){
        if(!isset($_SESSION['username'])){
            redirect();
        }
        $this->load->view('production/morisjs');
    }

    public function other_charts(){
        if(!isset($_SESSION['username'])){
            redirect();
        }
        $this->load->view('production/other_charts');
    }
}