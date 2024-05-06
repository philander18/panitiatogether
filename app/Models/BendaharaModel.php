<?php

namespace App\Models;

use CodeIgniter\Model;

class BendaharaModel extends Model
{
    protected $table = 'peserta';
    protected $allowedFields = ['nama', 'hp', 'gender', 'gereja', 'kata', 'bayar', 'pic', 'status', 'updated_at'];

    public function listgereja()
    {
        return $this->db->table('gereja')->select('nama')->orderBy('nama', 'asc')->get()->getResultArray();
    }
    public function searchnama($keyword, $jumlahlist, $index)
    {
        $where = "nama like '%" . $keyword . "%'";
        $all = $this->db->table('peserta')->select('id, nama, hp, pic, bayar')->where($where)->orderBy('nama', 'ASC')->get()->getResultArray();
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
}
