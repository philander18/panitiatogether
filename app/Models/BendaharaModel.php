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
    public function listpanitia()
    {
        return $this->db->table('users')->join('auth_groups_users', 'user_id = id')->select('username')->orderBy('username', 'asc')->get()->getResultArray();
    }
    public function getposisi($username)
    {
        return $this->db->table('users')->join('auth_users_permissions', 'user_id = id')->join('auth_permissions', 'permission_id = auth_permissions.id')->select('auth_permissions.name')->where('username', $username)->get()->getResultArray()[0]['name'];
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
    function update_keuangan($data, $id)
    {
        return $this->db->table('keuangan')->where('id', $id)->update($data);
    }
    function delete_keuangan($id)
    {
        return $this->db->table('keuangan')->delete(['id' => $id]);
    }
    public function searchkeuangan($keyword, $jumlahlist, $index, $jenis)
    {
        if ($jenis == 'debit') {
            $where = "keterangan like '%" . $keyword . "%' and jenis = 'debit'";
            $all = $this->db->table('keuangan')->select('id, tanggal, keterangan, jumlah, pic, jenis')->where($where)->orderBy('tanggal DESC')->get()->getResultArray();
            $data['pendaftaran'] = [
                'id' => 0,
                'tanggal' => date('d-m-Y'),
                'keterangan' => 'Pendaftaran',
                'jumlah' => $this->db->table('peserta')->select('sum(bayar) as jumlah')->get()->getResultArray()[0]['jumlah']
            ];
            $all = array_merge($data, $all);
            $jumlah_uang = $this->db->table('keuangan')->select('sum(jumlah) as jumlah')->where("jenis = 'debit'")->get()->getResultArray()[0]['jumlah'] + $this->db->table('peserta')->select('sum(bayar) as jumlah')->get()->getResultArray()[0]['jumlah'];
        } elseif ($jenis == 'kredit') {
            $where = "keterangan like '%" . $keyword . "%' and jenis = 'kredit'";
            $all = $this->db->table('keuangan')->select('id, tanggal, keterangan, jumlah, pic, jenis')->where($where)->orderBy('tanggal DESC')->get()->getResultArray();
            $jumlah_uang = $this->db->table('keuangan')->select('sum(jumlah) as jumlah')->where("jenis = 'kredit'")->get()->getResultArray()[0]['jumlah'];
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
        $data['jumlah_uang'] = $jumlah_uang;
        return $data;
    }
    function get_data_keuangan_byid($id)
    {
        $query = $this->db->table('keuangan')->where('id', $id)->get();
        return $query->getResult();
    }
    // Menangani tambah data flow
    public function searchflow($keyword, $jumlahlist, $index)
    {
        $where = "(keterangan like '%" . $keyword . "%' or pic like '%" . $keyword . "%') and pic <> 'hadasa'";
        $all = $this->db->table('keuangan')->select('id, tanggal, keterangan, jumlah, pic, jenis')->where($where)->orderBy('tanggal DESC')->get()->getResultArray();
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        return $data;
    }
    // Menangani data keuangan di tangan
    public function data_hand($keyword, $jumlahlist, $index)
    {
        $where1 = "pic not in ('hadasa') and jenis = 'transit' and pic like '%" . $keyword . "%'";
        $where2 = "pic not in ('hadasa') and jenis = 'kredit' and pic like '%" . $keyword . "%'";
        $transit = $this->db->table('keuangan')->select('pic, sum(jumlah) as jumlah')->where($where1)->groupBy('pic')->get()->getResultArray();
        $kredit = $this->db->table('keuangan')->select('pic, sum(jumlah) as jumlah')->where($where2)->groupBy('pic')->get()->getResultArray();
        $bendahara = ($this->searchkeuangan("", 10, 0, 'debit')['jumlah_uang'] - $this->searchkeuangan("", 10, 0, 'kredit')['jumlah_uang']) - ($this->db->table('keuangan')->select('sum(jumlah) as jumlah')->where("pic not in ('hadasa') and jenis = 'transit'")->get()->getResultArray()[0]['jumlah'] - $this->db->table('keuangan')->select('sum(jumlah) as jumlah')->where("pic not in ('hadasa') and jenis = 'kredit'")->get()->getResultArray()[0]['jumlah']);
        $all[] = [
            'pic' => 'hadasa',
            'panitia' => $this->getposisi('hadasa'),
            'jumlah' => $bendahara,
        ];
        foreach ($transit as $row1) :
            foreach ($kredit as $row2) :
                if ($row2['pic'] == $row1['pic']) {
                    $row1['jumlah'] -= $row2['jumlah'];
                }
            endforeach;
            $all[] = [
                'pic' => $row1['pic'],
                'panitia' => $this->getposisi($row1['pic']),
                'jumlah' => $row1['jumlah'],
            ];
        endforeach;
        $jumlahdata = count($all);
        $lastpage = ceil($jumlahdata / $jumlahlist);
        $tabel = array_splice($all, $index);
        array_splice($tabel, $jumlahlist);
        $data['lastpage'] = $lastpage;
        $data['tabel'] = $tabel;
        return $data;
    }
}
