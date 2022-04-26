<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat_masuk_model extends CI_Model
{
    private $table = "surat_masuk";
    // mengambil semua data barang
    public function get_all()
    {
        $this->db->order_by('no_surat', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * mengambil semua data barang berdasarkan id barang
     * @param no_surat
     */
    public function get_by_id($no_surat)
    {
        $this->db->where('no_surat', $no_surat);
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
        $update = $this->db->update($this->table, $data, ['no_surat' => $data['no_surat']]);
        return $update;
    }

    /**
     * menghapus barang berdasarkan id barang
     * @param no_surat = id barang yang akan di hapus
     */
    public function delete($no_surat)
    {
        $delete = $this->db->delete($this->table, ['no_surat' => $no_surat]);
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
        $this->db->where('tgl_surat >=', $dari);
        $this->db->where('tgl_surat <=', $ke);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
