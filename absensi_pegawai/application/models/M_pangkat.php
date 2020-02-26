<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pangkat extends CI_Model {

    public function index()
    {
        return $this->db->get_where('pangkat', ['is_deleted' => 0])->result();
    }

    public function tambah($data)
    {
        $this->db->insert('pangkat', $data);
    }

    public function edit($id)
    {
        return $this->db->get_where('pangkat', ['id' => $id])->row();
    }

    public function update($data)
    {
        $this->db->update('pangkat', $data, ['id' => $data['id']]);
    }

    public function hapus($id)
    {
        $this->db->update('pangkat', ['is_deleted' => 1], ['id' => $id]);
    }

}

/* End of file M_pangkat.php */

?>