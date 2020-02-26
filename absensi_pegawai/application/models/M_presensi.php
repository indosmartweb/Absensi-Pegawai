<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_presensi extends CI_Model
{
	public function index()
    {
       return $this->db->get('presensi')->result();
    }

    public function listing($pegawai_id, $limit)
    {
        return $this->db->get_where('pegawai', ['pegawai_id' => $pegawai_id], $limit)->result();
    }

    public function presensi_user($pegawai_id)
    {
        $this->db->join('pegawai', 'pegawai.id = presensi.pegawai_id', 'left');
        return $this->db->get_where('presensi', ['pegawai_id' => $pegawai_id])->result();
    }
    
    public function cetak_presensi($pegawai_id, $limit)
    {
        $this->db->join('pegawai', 'pegawai.id = presensi.pegawai_id', 'left');
        return $this->db->get_where('presensi', ['pegawai_id' => $pegawai_id], $limit)->result();
    }

    public function cek_absen($pegawai_id, $tanggal)
    {
        $where = [
            'pegawai_id'    => $pegawai_id,
            'tanggal'       => $tanggal
        ];
        return $this->db->get_where('presensi', $where)->row();
    }
    
    public function cek_absen_masuk($pegawai_id, $tanggal)
    {
        $where = [
            'pegawai_id'    => $pegawai_id,
            'tanggal'       => $tanggal,
            'jam_pulang'    => null
        ];
        return $this->db->get_where('presensi', $where)->row();
    }

    public function absen_masuk($object)
    {
        $this->db->insert('presensi', $object);
    }

    public function absen_pulang($pegawai_id, $tanggal, $object)
    {
        $where = [
            'pegawai_id'    => $pegawai_id,
            'tanggal'       => $tanggal
        ];
        $this->db->update('presensi', $object, $where);
    }

    public function chart($pegawai_id, $tahun, $bulan)
    {
        $query = $this->db->query("SELECT COUNT(id_presensi) AS jumlah FROM `presensi` WHERE `pegawai_id` = '$pegawai_id' AND SUBSTRING(tanggal, 6, 2) = '$bulan' AND SUBSTRING(tanggal, 1, 4) = '$tahun'");
        return $query->row();
    }
}

/* End of file M_presensi.php */

?>