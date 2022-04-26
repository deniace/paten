<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Surat_pencaker_model extends CI_Model
{
    private $table = "surat_pencaker";
    private $join_table = "penduduk";

    public function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->join_table, $this->table . '.nik = ' . $this->join_table . '.nik');
        $this->db->order_by('id_surat_pencaker', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * mengambil semua data barang berdasarkan id barang
     * @param id_surat_pencaker
     */
    public function get_by_id($id_surat_pencaker)
    {
        $this->db->where('id_surat_pencaker', $id_surat_pencaker);
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
        $update = $this->db->update($this->table, $data, ['id_surat_pencaker' => $data['id_surat_pencaker']]);
        return $update;
    }

    /**
     * menghapus barang berdasarkan id barang
     * @param id_surat_pencaker = id barang yang akan di hapus
     */
    public function delete($id_surat_pencaker)
    {
        $delete = $this->db->delete($this->table, ['id_surat_pencaker' => $id_surat_pencaker]);
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
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->join_table, $this->table . '.nik = ' . $this->join_table . '.nik');
        $this->db->where('tgl_pembuatan >=', $dari);
        $this->db->where('tgl_pembuatan <=', $ke);
        $query = $this->db->get();
        return $query->result();
    }
}
