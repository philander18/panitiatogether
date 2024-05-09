<?php

namespace App\Controllers;

use App\Models\BendaharaModel;
use DateTime;

class Bendahara extends BaseController
{
    protected $BendaharaModel;
    protected $jumlahlist = 10;
    public function __construct()
    {
        $this->BendaharaModel = new BendaharaModel();
    }
    // Pendaftaran
    public function index(): string
    {
        $page = 1;
        $data = [
            'judul' => 'Bendahara',
            'listgereja' => $this->BendaharaModel->listgereja(),
            'peserta' => $this->BendaharaModel->searchnama("", $this->jumlahlist, 0, 1)['tabel'],
            'pagination' => $this->pagination($page, $this->BendaharaModel->searchnama("", $this->jumlahlist, 0, 1)['lastpage']),
            'last' => $this->BendaharaModel->searchnama("", $this->jumlahlist, 0, 1)['lastpage'],
            'jumlah' => $this->BendaharaModel->searchnama("", $this->jumlahlist, 0, 1)['jumlah'],
            'page' => $page,
            'halaman' => 'bendahara',
            'method' => 'pendaftaran'
        ];
        return view('Bendahara/index', $data);
    }

    public function searchDataPanitia()
    {
        $page = $_POST['page'];
        $keyword = $_POST['keyword'];
        $filter = $_POST['filter'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $peserta = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index, $filter)['tabel'];
        $last = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index, $filter)['lastpage'];
        $jumlah = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index, $filter)['jumlah'];
        $pagination = $this->pagination($page, $last);
        $data = [
            'peserta' => $peserta,
            'pagination' => $pagination,
            'last' => $last,
            'jumlah' => $jumlah,
            'page' => $page,
        ];
        echo view('Bendahara/Tabel/panitia', $data);
    }
    public function getdata()
    {
        echo json_encode($this->BendaharaModel->getDatabyid($_POST['id'])[0]);
    }

    public function updatedata()
    {
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $id = $_POST['id'];
        if (user()->username == 'elisabeth') {
            $dataupdate = [
                'wa' => $_POST['wa'],
            ];
        } else {
            $dataupdate = [
                'hp' => $_POST['hp'],
                'gender' => $_POST['gender'],
                'gereja' => $_POST['gereja'],
                'wa' => $_POST['wa'],
                'bayar' => $_POST['bayar'],
                'pic' => user()->username,
                'updated_at' => $date
            ];
        }
        if ($this->BendaharaModel->updatepeserta($dataupdate, $id)) {
            session()->setFlashdata('pesan', 'Update nama  ' . $_POST['nama'] . ' Berhasil.');
        } else {
            session()->setFlashdata('pesan', 'Update nama ' . $_POST['nama'] . ' Gagal.');
        }
        // if (empty($this->BendaharaModel->statusSummary(user()->username))) {
        //     $summary['pic'] = false;
        //     $summary['total'] = false;
        // } else {
        //     $summary = $this->BendaharaModel->statusSummary(user()->username)[0];
        //     if ($this->BendaharaModel->setorPIC(user()->username)) {
        //         $summary['total'] = $summary['total'] - $this->BendaharaModel->setorPIC(user()->username)[0]['total'];
        //     }
        // }
        $page = $_POST['page'];
        $keyword = $_POST['keyword'];
        $filter = $_POST['filter'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $peserta = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index, $filter)['tabel'];
        $last = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index, $filter)['lastpage'];
        $jumlah = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index, $filter)['jumlah'];
        $pagination = $this->pagination($page, $last);
        $data = [
            'peserta' => $peserta,
            'pagination' => $pagination,
            'last' => $last,
            'jumlah' => $jumlah,
            'page' => $page,
        ];
        echo view('Bendahara/Tabel/panitia', $data);
    }

    public function deletepeserta()
    {
        $nama = $this->BendaharaModel->select('nama')->where(['id' => $_POST['id']])->first()['nama'];
        if ($this->BendaharaModel->delete(['id' => $_POST['id']])) {
            session()->setFlashdata('pesan', 'Hapus nama  ' . $nama . ' Berhasil.');
        } else {
            session()->setFlashdata('pesan', 'Hapus nama ' . $nama . ' Gagal.');
        }
        $page = 1;
        $keyword = '';
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $peserta = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index, 1)['tabel'];
        $last = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index, 1)['lastpage'];
        $jumlah = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index, 1)['jumlah'];
        $pagination = $this->pagination($page, $last);
        $data = [
            'peserta' => $peserta,
            'pagination' => $pagination,
            'last' => $last,
            'jumlah' => $jumlah,
            'page' => $page,
        ];
        echo view('Bendahara/Tabel/panitia', $data);
    }
    // Menangani tambah data keuangan
    public function input_keuangan()
    {
        $date = new DateTime();
        $date = $date->format('Y-m-d H:i:s');
        $data = [
            'tanggal' => $_POST['tanggal'],
            'keterangan' => $_POST['keterangan'],
            'jenis' => $_POST['jenis'],
            'jumlah' => $_POST['jumlah'],
            'pic' => user()->username,
            'updated_at' => $date
        ];
        $this->BendaharaModel->tambah_keuangan($data);
    }
    public function keuangan()
    {
        // $data['a'] = [
        //     'id' => 10,
        //     'tanggal' => '2024-04-30'
        // ];
        // $test = array_merge($data, $this->BendaharaModel->searchkeuangan("", $this->jumlahlist, 0, 'debit')['tabel']);
        // d($test);
        $page = 1;
        $data = [
            'judul' => 'Bendahara',
            'debit' => $this->BendaharaModel->searchkeuangan("", $this->jumlahlist, 0, 'debit')['tabel'],
            'pagination_debit' => $this->pagination($page, $this->BendaharaModel->searchkeuangan("", $this->jumlahlist, 0, 'debit')['lastpage']),
            'last_debit' => $this->BendaharaModel->searchkeuangan("", $this->jumlahlist, 0, 'debit')['lastpage'],
            'kredit' => $this->BendaharaModel->searchkeuangan("", $this->jumlahlist, 0, 'kredit')['tabel'],
            'pagination_kredit' => $this->pagination($page, $this->BendaharaModel->searchkeuangan("", $this->jumlahlist, 0, 'kredit')['lastpage']),
            'last_kredit' => $this->BendaharaModel->searchkeuangan("", $this->jumlahlist, 0, 'kredit')['lastpage'],
            'page' => $page,
            'halaman' => 'bendahara',
            'method' => 'keuangan'
        ];
        return view('Bendahara/keuangan', $data);
    }


    public function pagination($page, $lastpage)
    {
        $pagination = [
            'first' => false,
            'previous' => false,
            'next' => false,
            'last' => false
        ];
        if ($lastpage == 1) {
            $pagination['number'] = [1];
        } elseif ($lastpage == 2) {
            $pagination['number'] = [1, 2];
        } elseif ($lastpage == 3) {
            $pagination['number'] = [1, 2, 3];
        } elseif ($lastpage == 4) {
            $pagination['number'] = [1, 2, 3, 4];
        } elseif ($lastpage == 5) {
            $pagination['number'] = [1, 2, 3, 4, 5];
        } else {
            if ($page >= 1 and $page <= 3) {
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [1, 2, 3];
            } elseif ($page >= $lastpage - 2 and $page <= $lastpage) {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['number'] = [$lastpage - 2, $lastpage - 1, $lastpage];
            } else {
                $pagination['first'] = true;
                $pagination['previous'] = true;
                $pagination['next'] = true;
                $pagination['last'] = true;
                $pagination['number'] = [$page - 1, $page, $page + 1];
            }
        };
        $pagination['page'] = $page;
        return $pagination;
    }
}
