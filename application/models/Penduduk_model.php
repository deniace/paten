<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Penduduk_model extends CI_Model
{
    private $table = "penduduk";
    // mengambil semua data barang
    public function get_all()
    {
        $this->db->order_by('nik', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * mengambil semua data barang berdasarkan id barang
     * @param nik
     */
    public function get_by_id($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row();
    }

    /**
     * menginsert / input data barang ke database
     * @param data = data barang yang akan di insert
     */
    public function insert($data)
    {
        $insert = $this->db->insert($this->table, $data);
        return $insert;
    }

    /**
     * mengupdate barang
     * @param data = data barang yang akan di update
     */
    public function update($data)
    {
        $update = $this->db->update($this->table, $data, ['nik' => $data['nik']]);
        return $update;
    }

    /**
     * menghapus barang berdasarkan id barang
     * @param nik = id barang yang akan di hapus
     */
    public function delete($nik)
    {
        $delete = $this->db->delete($this->table, ['nik' => $nik]);
        return $delete;
    }

    /**
     * menghitung Jumlah
     */
    public function get_count()
    {
        $query = $this->db->count_all_results($this->table);
        return $query;
    }

    public function get_by_date($dari, $ke)
    {
        $this->db->where('tgl >=', $dari);
        $this->db->where('tgl <=', $ke);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
