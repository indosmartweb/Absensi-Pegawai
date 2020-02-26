<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model {

    public function index()
    {
        return $this->db->get_where('jabatan', ['is_deleted' => 0])->result();
    }

    public function tambah($data)
    {
        $this->db->insert('jabatan', $data);
    }

    public function edit($id)
    {
        return $this->db->get_where('jabatan', ['id' => $id])->row();
    }

    public function update($data)
    {
        $this->db->update('jabatan', $data, ['id' => $data['id']]);
    }

    public function hapus($id)
    {
        $this->db->update('jabatan', ['is_deleted' => 1], ['id' => $id]);
    }

}

/* End of file M_jabatan.php */

?>