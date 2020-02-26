<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

    public function index()
    {
        return $this->db->get_where('pegawai', ['user_id' => 0,'is_deleted' => 0])->result();
    }

    public function detail($id)
    {
        $this->db->join('jabatan', 'jabatan.kode_jabatan = pegawai.kode_jabatan', 'left');
        $this->db->join('pangkat', 'pangkat.kode_pangkat = pegawai.kode_pangkat', 'left');
        $this->db->join('unit_kerja', 'unit_kerja.kode_unit_kerja = pegawai.kode_unit_kerja', 'left');
        return $this->db->get_where('pegawai', ['pegawai.id' => $id])->row();
    }

    public function tambah($data)
    {
        $this->db->insert('pegawai', $data);
    }
    
    public function update($data)
    {
        $this->db->update('pegawai', $data, ['id' => $data['id']]);
    }

    public function hapus($id)
    {
        $this->db->update('pegawai', ['is_deleted' => 1], ['id' => $id]);
    }

    public function login($username, $password)
    {
        $where = [
            'username'  => $username,
            'password'  => sha1($password)
        ];
        return $this->db->get_where('pegawai', $where)->row();
    }

    public function cek_password($password)
    {
        return $this->db->get_where('pegawai', ['password' => sha1($password)])->row();
    }

}

/* End of file M_pegawai.php */

?>