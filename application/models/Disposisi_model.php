<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Disposisi_model extends CI_Model
{
    private $table = "disposisi";
    // mengambil semua data barang
    public function get_all()
    {
        $this->db->order_by('id_disposisi', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * mengambil semua data barang berdasarkan id barang
     * @param id_disposisi
     */
    public function get_by_id($id_disposisi)
    {
        $this->db->where('id_disposisi', $id_disposisi);
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
        $update = $this->db->update($this->table, $data, ['id_disposisi' => $data['id_disposisi']]);
        return $update;
    }

    /**
     * menghapus barang berdasarkan id barang
     * @param id_disposisi = id barang yang akan di hapus
     */
    public function delete($id_disposisi)
    {
        $delete = $this->db->delete($this->table, ['id_disposisi' => $id_disposisi]);
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
