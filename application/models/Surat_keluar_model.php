<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat_keluar_model extends CI_Model
{
    private $table = "surat_keluar";
    // mengambil semua data barang
    public function get_all()
    {
        $this->db->order_by('id_surat_keluar', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * mengambil semua data barang berdasarkan id barang
     * @param id_surat_keluar
     */
    public function get_by_id($id_surat_keluar)
    {
        $this->db->where('id_surat_keluar', $id_surat_keluar);
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
        $update = $this->db->update($this->table, $data, ['id_surat_keluar' => $data['id_surat_keluar']]);
        return $update;
    }

    /**
     * menghapus barang berdasarkan id barang
     * @param id_surat_keluar = id barang yang akan di hapus
     */
    public function delete($id_surat_keluar)
    {
        $delete = $this->db->delete($this->table, ['id_surat_keluar' => $id_surat_keluar]);
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
