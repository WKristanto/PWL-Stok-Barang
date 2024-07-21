<?php

class Madmin extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function cek_login($u, $p) {
        $q = $this->db->get_where('user', array('name' => $u, 'password' => $p, 'level' => 'admin', 'aktif' => 'Y'));
        return $q;
    }

    //Menampilkan data barang
    public function tampil_data_barang() {
        return $this->db->get('barang');
    }

    //Input data barang
    public function input_data_barang($data) {
        return $this->db->insert('barang', $data);
    }

    //Detail barang
    public function get_barang_detail($id){
        $query = $this->db->get_where('barang', array('id' => $id));

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    //Update data barang
    public function update_data_barang($id, $data){
        $this->db->where('id', $id);
        $this->db->update('barang', $data);
    }

    //Hapus barang
    public function hapus_data_barang($where, $table){
    	$this->db->where($where);
    	$this->db->delete($table);
    }
}
