<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require('./excel/vendor/autoload.php');
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Presensi extends CI_Controller
{
	public function __construct() {
		parent::__construct();
        $this->load->model('m_presensi');
        $this->auth->cek_login();
    }
    
	public function index() {
        $presensi  = $this->m_presensi->presensi_user($this->session->userdata('id'));
        $data = [
            'title'     => 'Presensi',
            'presensi'  => $presensi,
            'content'   => 'presensi/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    
    public function export()
    {
        $user        = $this->m_pegawai->detail($this->session->userdata('id'));
        $limit       = (int)(date('n'));
        $presensi    = $this->m_presensi->cetak_presensi($this->session->userdata('id'), $limit);
        $hari        = hari();
        $bulan       = bulan();
        $bln         = $bulan[date('n')]; 
        $periode     = $bln.'-'.date('Y');
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator($user->nama_pekerja)
        ->setLastModifiedBy($user->nama_pekerja)
        ->setTitle('Data Presensi')
        ->setSubject('Data Presensi '.$user->nama_pekerja);

        $spreadsheet->setActiveSheetIndex(0)
        ->mergeCells('D1:F1')
        ->setCellValue('D1', 'Data Presensi '.$user->nama_pekerja)
        ->setCellValue('A2', 'Periode')
        ->setCellValue('B2', $periode)
        ->setCellValue('A3', 'Pangkat')
        ->setCellValue('B3', $user->pangkat)
        ->setCellValue('A4', 'Jabatan')
        ->setCellValue('B4', $user->nama_jabatan)
        ->setCellValue('A6', 'No')
        ->setCellValue('B6', 'Nama Pekerja')
        ->setCellValue('C6', 'Tanggal')
        ->setCellValue('D6', 'Absen Masuk')
        ->setCellValue('E6', 'Absen Pulang')
        ->setCellValue('F6', 'Terlambat')
        ->setCellValue('G6', 'Pulang Awal')
        ->setCellValue('H6', 'Keterangan')
        ->getStyle('D1')->getFont()->setSize(14);

        $hari  = hari();
        $bulan = bulan();
        $i  = 7;
        $no = 1;
        foreach( $presensi as $row ) {
            $h  = $hari[date('N', strtotime($row->tanggal))];
            $t  = date('d', strtotime($row->tanggal));
            $b  = $bulan[date('n', strtotime($row->tanggal))];
            $th = date('Y', strtotime($row->tanggal));
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $no)
            ->setCellValue('B'.$i, $row->nama_pekerja)
            ->setCellValue('C'.$i, $h.', '.$t.'-'.$b.'-'.$th)
            ->setCellValue('D'.$i, $row->jam_masuk)
            ->setCellValue('E'.$i, $row->jam_pulang)
            ->setCellValue('F'.$i, $row->terlambat)
            ->setCellValue('G'.$i, $row->pulang_awal)
            ->setCellValue('H'.$i, $row->keterangan)
            ->setCellValue('I'.$i, $row->jumlah_jam_kerja);
            $no++;
            $i++;
        }

        $spreadsheet->getActiveSheet()->setTitle('Data Presensi');
        $spreadsheet->setActiveSheetIndex(0);
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data_Presensi.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $styleArray = [
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            ],
                        ],
                    ];
        $i = $i - 1;
        $spreadsheet->getActiveSheet()->getStyle('A6:I'.$i)->applyFromArray($styleArray);
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');

        redirect(site_url('presensi'));
    }
}

?>