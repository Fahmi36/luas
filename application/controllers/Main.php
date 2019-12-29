<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {


	public function jsonResponse($msg)
	{
		$respon	= array(
			'success' =>true,
			'msg'=>$msg,
		);
		echo json_encode($respon);
	}
	public function failjsonResponse($msg)
	{
		$respon	= array(
			'success' =>false,
			'msg'=>$msg,
		);
		echo json_encode($respon);
	}
	public function index()
	{
		$data['link_page'] = 'page/home';
		$data['title'] = 'Halaman Dashboard';
		$data['datanya'] = $this->MainModel->getData();
		$this->load->view('utama', $data);
	}
	public function hitung_luas()
	{
		$data['link_page'] = 'page/Hitung';
		$data['title'] = 'Halaman Hitung';
		$this->load->view('utama', $data);
	}
	public function InsertData()
	{		
		try {
			$action = $this->MainModel->insertData();
			if ($action==true) {
				$msg = 'Berhasil Tambah data';
				$this->jsonResponse($msg);
			}else{
				$msg = 'Gagal Tambah data';
				$this->failjsonResponse($msg);
			}
		} catch (Exception $e) {
			$this->failjsonResponse($msg);
		}
	}
	public function editData()
	{
		$data['link_page'] = 'page/editdata';
		$data['title'] = 'Halaman Edit';
		$data['datanya'] = $this->MainModel->detailData();
		$this->load->view('utama', $data);
	}
	public function acteditData()
	{
		try {
			$action = $this->MainModel->editData();
			if ($action==true) {
				$msg = 'Berhasil Edit data';
				$this->jsonResponse($msg);
			}else{
				$msg = 'Gagal Edit data';
				$this->failjsonResponse($msg);
			}
		} catch (Exception $e) {
			$this->failjsonResponse($msg);
		}
	}
	public function getKota()
	{
		try {
			$this->MainModel->getKotaJson();
		} catch (Exception $e) {
			$this->failjsonResponse($e);
		}
	}
	public function getKec()
	{
		try {
			$this->MainModel->getKecJson();
		} catch (Exception $e) {
			$this->failjsonResponse($e);
		}
	}
	public function getDesa()
	{
		try {
			$this->MainModel->getDesaJson();
		} catch (Exception $e) {
			$this->failjsonResponse($e);
		}
	}
	public function getPolygon()
	{
		try {
			$this->MainModel->getDataPoly();
		} catch (Exception $e) {
			$this->failjsonResponse($e);
		}
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */