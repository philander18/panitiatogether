<?php

namespace App\Models;

use CodeIgniter\Model;

class BendaharaModel extends Model
{
    protected $table = 'peserta';
    protected $allowedFields = ['nama', 'hp', 'gender', 'gereja', 'kata', 'bayar', 'pic', 'wa', 'updated_at'];

    public function listgereja()
    {
        return $this->db->table('gereja')->select('nama')->orderBy('nama', 'asc')->get()->getResultArray();
    }
    public function searchnama($keyword, $jumlahlist, $index, $filter)
    {
        if ($filter == 1) {
            $where = "nama like '%" . $keyword . "%'";
            $order = "nama ASC";
        } elseif ($filter == 2) {
            $where = "nama like '%" . $keyword . "%' and bayar is not null";
            $order = "wa ASC";
        } else {
            $where = "nama like '%" . $keyword . "%' and bayar is null";
            $order = "nama ASC";
        }
        $all = $this->db->table('peserta')->select('id, nama, hp, pic, bayar, wa')->where($where)->orderBy($order)->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }

    function getDatabyid($id)
    {
        $query = $this->db->table('peserta')->where('id', $id)->get();
        return $query->getResult();
    }

    function updatepeserta($data, $id)
    {
        return $this->db->table('peserta')->where('id', $id)->update($data);
    }

    // Menangani tambah data keuangan
    function tambah_keuangan($data)
    {
        return $this->db->table('keuangan')->insert($data);
    }
    public function searchkeuangan($keyword, $jumlahlist, $index, $jenis)
    {

        if ($jenis == 'debit') {
            $where = "keterangan like '%" . $keyword . "%' and jenis = 'debit'";
            $all = $this->db->table('keuangan')->select('id, tanggal, keterangan, jumlah, pic, jenis')->where($where)->orderBy('tanggal DESC')->get()->getResultArray();
            $data['pendaftaran'] = [
                'tanggal' => '2024-04-30',
                'keterangan' => 'Pendaftaran',
                'jumlah' => 1000000
            ];
            $all = array_merge($data, $all);
        } elseif ($jenis == 'kredit') {
            $where = "keterangan like '%" . $keyword . "%' and jenis = 'kredit'";
            $all = $this->db->table('keuangan')->select('id, tanggal, keterangan, jumlah, pic, jenis')->where($where)->orderBy('tanggal DESC')->get()->getResultArray();
        } else {
            $where = "keterangan like '%" . $keyword . "%'";
        }
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        $data['jumlah'] = $jumlahdata;
        return $data;
    }
}
