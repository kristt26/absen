<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsenModel;
use App\Models\KaryawanModel;
use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{

    public function index()
    {
        $data['title'] = "Laporan Absensi";
        return view('laporan', $data);
    }

    public function read(): object
    {
        $param = $this->request->getJSON();
        $abs = new AbsenModel();
        $kar = new KaryawanModel();
        $karyawans = $kar->findAll();
        $absens = $abs->where(['tanggal >=' => $param->dari, 'tanggal<=' => $param->sampai])->findAll();
        if (count($absens) > 0) {
            foreach ($karyawans as $key1 => $karyawan) {
                $karyawan->absen = [];
                foreach ($absens as $key2 => $absen) {
                    if ($karyawan->id == $absen->karyawan_id) $karyawan->absen[] = $absen;
                }
            }
            return $this->respond($karyawans);
        } else {
            return $this->respond([]);
        }
    }
    public function detail($mulai, $sampai, $id)
    {
        $abs = new AbsenModel();
        $kar = new KaryawanModel();
        $arr = explode("-", $mulai);
        $list = array();
        $month = (int)$arr[1];
        $year = (int)$arr[0];

        for ($d = 1; $d <= 31; $d++) {
            $time = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time) == $month) {
                if (date('D', $time) != 'Sun') {
                    $item = [
                        "tanggal" => date('Y-m-d', $time)
                    ];
                    $list[] = $item;
                }
            }
        }
        $data = $abs->where(['tanggal >=' => $mulai, 'tanggal <=' => $sampai, 'karyawan_id =' => $id])->findAll();
        foreach ($data as $key1 => $absen) {
            foreach ($list as $key2 => $tanggal) {
                if ($absen->tanggal == $tanggal['tanggal'])
                    $list[$key2]['data'] = $absen;
            }
            # code...
        }
        $tanggal = [
            "mulai" => $mulai,
            "sampai" => $sampai
        ];

        return view('detail', ['data' => $list, "karyawan" => $kar->where("id", $id)->first(), 'tanggal' => $tanggal, "title"=>"Detail Laporan"]);
    }

    public function excel($mulai, $sampai, $id)
    {
        $abs = new AbsenModel();
        $kar = new KaryawanModel();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->setActiveSheetIndex(0);
        $arr = explode("-", $mulai);
        $list = array();
        $month = (int)$arr[1];
        $year = (int)$arr[0];
        $karyawan = $kar->where("id", $id)->first();
        for ($d = 1; $d <= 31; $d++) {
            $time = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time) == $month) {
                if (date('D', $time) != 'Sun') {
                    $item = [
                        "tanggal" => date('Y-m-d', $time)
                    ];
                    $list[] = $item;
                }
            }
        }
        $data = $abs->where(['tanggal >=' => $mulai, 'tanggal <=' => $sampai, 'karyawan_id =' => $id])->findAll();
        foreach ($data as $key1 => $absen) {
            foreach ($list as $key2 => $tanggal) {
                if ($absen->tanggal == $tanggal['tanggal'])
                    $list[$key2]['data'] = $absen;
            }
        }
        $sheet->setCellValue('A1', 'DETAIL ABSEN')
            ->setCellValue('A2', 'TANGGAL ' . $mulai . " S/D " . $sampai)
            ->setCellValue('A4', 'NAMA')
            ->setCellValue('C4', ": ".strtoupper($karyawan->nama))
            ->setCellValue('A5', 'JENIS KELAMIN')
            ->setCellValue('C5', ': '.strtoupper($karyawan->gender))
            ->setCellValue('A6', 'KONTAK')
            ->setCellValue('C6', ': '.$karyawan->hp);

        $sheet->setCellValue('A8', 'NO')
            ->setCellValue('B8', 'TANGGAL')
            ->setCellValue('C8', 'DATANG')
            ->setCellValue('D8', 'PULANG')
            ->setCellValue('E8', 'KET');
        $styleArray = ['borders' => ['allBorders' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,],]];
        $spreadsheet->getActiveSheet()->getStyle("A1")->getFont()->setBold(true)->setSize(15);
        $spreadsheet->getActiveSheet()->getStyle("A2")->getFont()->setBold(true)->setSize(15);
        $spreadsheet->getActiveSheet()->mergeCells("A1:E1");
        $spreadsheet->getActiveSheet()->getStyle("A1")->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->getStyle("A2")->getAlignment()->setHorizontal('center');
        $spreadsheet->getActiveSheet()->mergeCells("A2:E2");
        $spreadsheet->getActiveSheet()->mergeCells("A4:B4");
        $spreadsheet->getActiveSheet()->mergeCells("A5:B5");
        $spreadsheet->getActiveSheet()->mergeCells("A6:B6");
        $spreadsheet->getActiveSheet()->getColumnDimension("A")->setWidth(40, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension("B")->setWidth(100, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension("C")->setWidth(100, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension("D")->setWidth(100, 'px');
        $spreadsheet->getActiveSheet()->getColumnDimension("E")->setWidth(100, 'px');
        foreach ($list as $key => $value) {
            $sheet->setCellValue('A' . $key + 9, $key + 1)
                ->setCellValue('B' . $key + 9, $value['tanggal'])
                ->setCellValue('C' . $key + 9, isset( $value['data']->datang) ?  $value['data']->datang : "")
                ->setCellValue('D' . $key + 9, isset($value['data']->pulang) ? $value['data']->pulang : "")
                ->setCellValue('E' . $key + 9, isset($value['data']->keterangan) ? $value['data']->keterangan : "");
        }
        $spreadsheet->getActiveSheet()->getStyle("A8:E" . count($list) + 8)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His') . '-' . $karyawan->nama;
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
