<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class M_profil extends CI_Model
{
	
	public function index($id)
	{
		return $this->db->get_where('pegawai', array('id'=>$id))->row();
	}
	public function edit($id)
    {
        return $this->db->get_where('pegawai', ['id' => $id])->row();
    }
    public function update($data)
    {
        $this->db->update('pegawai', $data, ['id' => $data['id']]);
    }
    public function detail($id)
    {
        $this->db->join('jabatan', 'jabatan.kode_jabatan = pegawai.kode_jabatan', 'left');
        $this->db->join('pangkat', 'pangkat.kode_pangkat = pegawai.kode_pangkat', 'left');
        $this->db->join('unit_kerja', 'unit_kerja.kode_unit_kerja = pegawai.kode_unit_kerja', 'left');
        return $this->db->get_where('pegawai', ['pegawai.id' => $id])->row();
    }
}
 ?>