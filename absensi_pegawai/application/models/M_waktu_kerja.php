<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_waktu_kerja extends CI_Model {

    public function index()
    {
        return $this->db->get_where('waktu_kerja', ['is_deleted' => 0])->result();
    }

    public function tambah($object)
    {
        $this->db->insert('waktu_kerja', $object);
    }

    public function edit($id)
    {
        return $this->db->get_where('waktu_kerja', ['id' => $id])->row();
    }

    public function update($id, $object)
    {
        $this->db->update('waktu_kerja', $object, ['id' => $id]);
    }

    public function hapus($id)
    {
        $this->db->update('waktu_kerja', ['is_deleted' => 1], ['id' => $id]);
    }

    public function cek_waktu($hari)
    {
        return $this->db->get_where('waktu_kerja', ['hari' => $hari])->row();
    }

}

/* End of file M_waktu_kerja.php */

?>