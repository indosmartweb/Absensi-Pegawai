<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_unit_kerja extends CI_Model {

    public function index()
    {
        return $this->db->get('unit_kerja')->result();
    }

    public function tambah($data)
    {
        $this->db->insert('unit_kerja', $data);
    }

    public function edit($id)
    {
        return $this->db->get_where('unit_kerja', ['id' => $id])->row();
    }

    public function update($data)
    {
        $this->db->update('unit_kerja', $data, ['id' => $data['id']]);
    }

    public function hapus($id)
    {
        $this->db->delete('unit_kerja', ['id' => $id]);
    }

}

/* End of file M_unit_kerja.php */

?>