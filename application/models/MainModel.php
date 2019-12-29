<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {

	public function getData()
	{
		$this->db->select('id,luas,alamat,created_at');
		$this->db->from('aset');
		$query = $this->db->get();
		return $query->result();
	}
	public function detailData()
	{
		$query = $this->db->get_where('aset',array('id'=>$this->uri->segment(2)));
		return $query->row();
	}
	public function insertData()
	{
		$query = $this->db->insert('aset', array(
			'lat'=>$this->input->post('lat'),
			'long'=>$this->input->post('long'),
			'polygon'=>$this->input->post('polygon'),
			'kelurahan'=>$this->input->post('sel_desa'),
			'kecamatan'=>$this->input->post('sel_kec'),
			'kota'=>$this->input->post('sel_kota'),
			'alamat'=>$this->input->post('alamat'),
			'luas'=>$this->input->post('luas'),
			'luasha'=>$this->input->post('luasha'),
			'created_at'=>date('Y-m-d'),
		));
		return $query;
	}
	public function editData()
	{
		$query = $this->db->update('aset', array(
			'lat'=>$this->input->post('lat'),
			'long'=>$this->input->post('long'),
			'polygon'=>$this->input->post('polygon'),
			// 'kelurahan'=>$this->input->post('kel'),
			// 'kecamatan'=>$this->input->post('kec'),
			// 'kota'=>$this->input->post('kota'),
			'alamat'=>$this->input->post('alamat'),
			'luas'=>$this->input->post('luasedit'),
			'luasha'=>$this->input->post('luaseditha'),
		),array('id'=>$this->input->post('idaset')));
		return $query;
	}
	    function getKotaJson()
    {
        $this->db->select('r.id,r.name AS kab, p.name AS provinsi');
        $this->db->from('regencies r');
        $this->db->join('provinces p', 'p.id = r.province_id', 'INNER');
        $this->db->where('p.id', 31);
        $query = $this->db->get();
        $data = "";
        foreach ($query->result() as $value) {
            $data[]= array(
                'id' => $value->id,
                'text' => $value->kab, 
            );
        }
        echo json_encode($data);
    }
    function getKecJson()
    {
        $id = $this->input->get('idkab');
        $this->db->select('name AS kec,id');
        $this->db->from('districts d');
        $this->db->where('regency_id', $id);
        $query = $this->db->get();
        $data = "";
        foreach ($query->result() as $value) {
            $data[] = array(
                'id' => $value->id,
                'text' => $value->kec, 
            );
        }
        echo json_encode($data);
    }
    function getDesaJson()
    {
        $id = $this->input->get('idkec');
        $this->db->select('v.name as desa,v.id');
        $this->db->from('villages v');
        $this->db->join('districts d', 'v.district_id = d.id', 'INNER');
        $this->db->where('v.district_id', $id);
        $query = $this->db->get();
        $data = "";
        foreach ($query->result() as $value) {
            $data[] = array(
                'id' => $value->id,
                'text' => $value->desa, 
            );
        }
        echo json_encode($data);
    }
    public function getDataPoly()
    {
    	$query = $this->db->get_where('aset',array('id'=>$this->input->post('id')))->result();

    	$respon = array(
    		'msg'=>'bisanih?',
    		'wilayah'=>
    			array(
    				'lahan'=>$query,
    			),
    		);
    	echo json_encode($respon);
    }
}

/* End of file Main.php */
/* Location: ./application/models/Main.php */