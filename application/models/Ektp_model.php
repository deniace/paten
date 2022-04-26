<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Ektp_model extends CI_Model
{
    private $table = "ektp";
    private $join_table = "penduduk";
    // mengambil semua data barang
    public function get_all()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->join_table, $this->table . '.nik = ' . $this->join_table . '.nik');
        $this->db->order_by('id_ektp', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * mengambil semua data barang berdasarkan id barang
     * @param id_ektp
     */
    public function get_by_id($id_ektp)
    {
        $this->db->where('id_ektp', $id_ektp);
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
        $update = $this->db->update($this->table, $data, ['id_ektp' => $data['id_ektp']]);
        return $update;
    }

    /**
     * menghapus barang berdasarkan id barang
     * @param id_ektp = id barang yang akan di hapus
     */
    public function delete($id_ektp)
    {
        $delete = $this->db->delete($this->table, ['id_ektp' => $id_ektp]);
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
        $this->db->where($this->table . '.tgl >=', $dari);
        $this->db->where($this->table . '.tgl <=', $ke);
        $query = $this->db->get();
        return $query->result();
    }
}
