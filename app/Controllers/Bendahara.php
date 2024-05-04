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
    public function index(): string
    {
        $page = 1;
        $data = [
            'judul' => 'Bendahara',
            'listgereja' => $this->BendaharaModel->listgereja(),
            'peserta' => $this->BendaharaModel->searchnama("", $this->jumlahlist, 0)['tabel'],
            'pagination' => $this->pagination($page, $this->BendaharaModel->searchnama("", $this->jumlahlist, 0)['lastpage']),
            'last' => $this->BendaharaModel->searchnama("", $this->jumlahlist, 0)['lastpage'],
            'jumlah' => $this->BendaharaModel->searchnama("", $this->jumlahlist, 0)['jumlah'],
            'page' => $page,
        ];
        return view('Bendahara/index', $data);
    }

    public function searchDataPanitia()
    {
        if (empty($this->BendaharaModel->statusSummary(user()->username))) {
            $summary['pic'] = false;
            $summary['total'] = false;
        } else {
            $summary = $this->BendaharaModel->statusSummary(user()->username)[0];
            if ($this->BendaharaModel->setorPIC(user()->username)) {
                $summary['total'] = $summary['total'] - $this->BendaharaModel->setorPIC(user()->username)[0]['total'];
            }
        }
        $page = $_POST['page'];
        $keyword = $_POST['keyword'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $peserta = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index)['tabel'];
        $last = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index)['lastpage'];
        $jumlah = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index)['jumlah'];
        $pagination = $this->pagination($page, $last);
        $data = [
            'peserta' => $peserta,
            'pagination' => $pagination,
            'last' => $last,
            'jumlah' => $jumlah,
            'page' => $page,
            'summary' => $summary,
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
        $dataupdate = [
            'hp' => $_POST['hp'],
            'gender' => $_POST['gender'],
            'gereja' => $_POST['gereja'],
            'bayar' => $_POST['bayar'],
            'pic' => user()->username,
            'updated_at' => $date
        ];
        if ($this->BendaharaModel->updatepeserta($dataupdate, $id)) {
            session()->setFlashdata('pesan', 'Update nama  ' . $_POST['nama'] . ' Berhasil.');
        } else {
            session()->setFlashdata('pesan', 'Update nama ' . $_POST['nama'] . ' Gagal.');
        }
        // $this->searchDataPanitia();
        if (empty($this->BendaharaModel->statusSummary(user()->username))) {
            $summary['pic'] = false;
            $summary['total'] = false;
        } else {
            $summary = $this->BendaharaModel->statusSummary(user()->username)[0];
            if ($this->BendaharaModel->setorPIC(user()->username)) {
                $summary['total'] = $summary['total'] - $this->BendaharaModel->setorPIC(user()->username)[0]['total'];
            }
        }
        $page = $_POST['page'];
        $keyword = $_POST['keyword'];
        if ($page == 1) {
            $index = 0;
        } else {
            $index = ($page - 1) * $this->jumlahlist;
        }
        $peserta = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index)['tabel'];
        $last = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index)['lastpage'];
        $jumlah = $this->BendaharaModel->searchnama($keyword, $this->jumlahlist, $index)['jumlah'];
        $pagination = $this->pagination($page, $last);
        $data = [
            'peserta' => $peserta,
            'pagination' => $pagination,
            'last' => $last,
            'jumlah' => $jumlah,
            'page' => $page,
            'summary' => $summary
        ];
        echo view('Bendahara/tabel/panitia', $data);
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
