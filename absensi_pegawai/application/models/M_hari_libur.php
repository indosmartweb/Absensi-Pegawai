<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_hari_libur extends CI_Model {

    public function index()
    {
        return $this->db->get_where('hari_libur', ['is_deleted' => 0])->result();
    }

    public function tambah($object)
    {
        $this->db->insert('hari_libur', $object);
    }

    public function edit($id)
    {
        return $this->db->get_where('hari_libur', ['id' => $id])->row();
    }

    public function update($object)
    {
        $this->db->update('hari_libur', $object, ['id' => $object['id']]);
    }

    public function hapus($id)
    {
        $this->db->update('hari_libur', ['is_deleted' => 1], ['id' => $id]);
    }

    public function cek_hari_libur($tanggal)
    {
        $where = [
            'tanggal'       => $tanggal,
            'is_deleted'    => 0
        ];
        return $this->db->get_where('hari_libur', $where)->row();
    }

}

/* End of file M_hari_libur.php */

?>