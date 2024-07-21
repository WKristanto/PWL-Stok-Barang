<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminpanel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    //Login
    public function index()
    {
        $this->load->view('admin/login');
    }

    public function login()
    {
        $this->load->model('Madmin');
        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $cek = $this->Madmin->cek_login($u, $p)->num_rows();

        if ($cek == 1) {
            $data_session = array(
                'username' => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            $this->session->set_flashdata('pesan_sukses', array(
                'icon' => 'success',
                'title' => 'Login Berhasil!'
            ));
            redirect('adminpanel/dashboard');
        } else {
            redirect('adminpanel');
        }
    }

    //Dashboard
    public function dashboard()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/layout/footer'); 
    }

    //Data Barang
    public function data_barang()
    {
        $data['barang'] = $this->Madmin->tampil_data_barang('barang')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('admin/layout/footer');
    }

    //Tambah barang
    public function tambah_barang()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/tambah_barang');
        $this->load->view('admin/layout/footer');
    }

    //Aksi tambah barang
    public function aksi_tambah_barang() {
        $config['upload_path'] = './assets/gambar/'; // Direktori untuk menyimpan gambar
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file yang diperbolehkan
        $config['max_size'] = 100000; // Ukuran maksimal file (dalam kilobytes)
        $config['file_name'] = uniqid(); // Nama file unik
    
        // Load library upload dengan konfigurasi yang telah ditentukan
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    
        // Inisialisasi array data dengan input form
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'keterangan' => $this->input->post('keterangan')
        );
    
        // Jika upload berhasil, ambil data file yang diupload
        if ($this->upload->do_upload('gambar')) {
            $uploaded_data = $this->upload->data();
            $data['gambar'] = $uploaded_data['file_name'];
        } else {
            // Jika upload gagal, set pesan error
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('pesan_error', array(
                'icon' => 'error',
                'title' => 'Upload Gambar Gagal!',
                'message' => $error
            ));
            redirect('adminpanel/tambah_barang');
            return; // Hentikan eksekusi jika ada error upload
        }
    
        // Input data ke database
        $this->Madmin->input_data_barang($data);
        $this->session->set_flashdata('pesan_sukses', array(
            'icon' => 'success',
            'title' => 'Data Barang Berhasil Ditambahkan!'
        ));
        redirect('adminpanel/data_barang');
    }
    

    //Detail_barang
    public function detail_barang($id){
        $this->load->model('Madmin');
        $data['detail_barang'] = $this->Madmin->get_barang_detail($id);
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu', $data);
        $this->load->view('admin/detail_barang', $data);
        $this->load->view('admin/layout/footer');
    }

    //Edit Barang
    public function edit_barang($id){
        $data['detail_barang'] = $this->Madmin->get_barang_detail($id);
        $data['id'] = $id;
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/menu', $data);
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('admin/layout/footer');
    }

    //Aksi Edit Barang
    public function update_barang($id) {
        $config['upload_path'] = './assets/gambar/'; // Direktori untuk menyimpan gambar
        $config['allowed_types'] = 'jpg|jpeg|png|gif'; // Jenis file yang diperbolehkan
        $config['max_size'] = 100000; // Ukuran maksimal file (dalam kilobytes)
        $config['file_name'] = uniqid(); // Nama file unik
    
        // Memuat library upload dengan konfigurasi yang ditentukan
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
    
        // Mendapatkan data yang ada saat ini
        $existing_data = $this->Madmin->get_barang_detail($id);
    
        // Inisialisasi array data
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'harga' => $this->input->post('harga'),
            'stok' => $this->input->post('stok'),
            'keterangan' => $this->input->post('keterangan'),
        );
    
        // Memeriksa apakah ada file baru yang diunggah
        if ($this->upload->do_upload('gambar')) {
            // Jika ada file baru yang diunggah, ambil data file yang diunggah
            $uploaded_data = $this->upload->data();
            $data['gambar'] = $uploaded_data['file_name'];
    
            // Opsional: Hapus file gambar lama dari server
            if (!empty($existing_data->gambar) && file_exists('./assets/gambar/' . $existing_data->gambar)) {
                unlink('./assets/gambar/' . $existing_data->gambar);
            }
        } else {
            // Jika tidak ada file baru yang diunggah, gunakan gambar yang sudah ada
            $data['gambar'] = $existing_data->gambar;
        }
    
        $this->Madmin->update_data_barang($id, $data);
        $this->session->set_flashdata('pesan_sukses', array(
            'icon' => 'success',
            'title' => 'Data Barang Berhasil Diubah!'
        ));
        redirect('adminpanel/data_barang');
    }
    

    //Hapus Barang
    public function hapus_barang($id){
        $where = array('id' => $id);

        $this->Madmin->hapus_data_barang($where, 'barang');
        $this->session->set_flashdata('pesan_sukses', array(
            'icon' => 'success',
            'title' => 'Data Barang Berhasil Dihapus!'
        ));
        redirect('adminpanel/data_barang');
    }

    //Logout
    public function logout() {
        $this->session->sess_destroy();
        redirect('adminpanel');
    }

}







