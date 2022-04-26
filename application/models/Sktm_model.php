<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sktm_model extends CI_Model
{
    private $table = "sktm";
    private $join_table = "penduduk";
    // mengambil semua data barang
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->join_table, $this->table . '.nik = ' . $this->join_table . '.nik');
        $this->db->order_by('id_sktm', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * mengambil semua data barang berdasarkan id barang
     * @param id_sktm
     */
    public function get_by_id($id_sktm)
    {
        $this->db->where('id_sktm', $id_sktm);
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
        $update = $this->db->update($this->table, $data, ['id_sktm' => $data['id_sktm']]);
        return $update;
    }

    /**
     * menghapus barang berdasarkan id barang
     * @param id_sktm = id barang yang akan di hapus
     */
    public function delete($id_sktm)
    {
        $delete = $this->db->delete($this->table, ['id_sktm' => $id_sktm]);
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
        $this->db->where('tgl_surat >=', $dari);
        $this->db->where('tgl_surat <=', $ke);
        $query = $this->db->get();
        return $query->result();
    }
}
