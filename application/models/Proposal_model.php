<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Proposal_model extends CI_Model
{
    private $table = "proposal";
    // mengambil semua data barang
    public function get_all()
    {
        $this->db->order_by('id_proposal', 'DESC');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    /**
     * mengambil semua data barang berdasarkan id barang
     * @param id_proposal
     */
    public function get_by_id($id_proposal)
    {
        $this->db->where('id_proposal', $id_proposal);
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
        $update = $this->db->update($this->table, $data, ['id_proposal' => $data['id_proposal']]);
        return $update;
    }

    /**
     * menghapus barang berdasarkan id barang
     * @param id_proposal = id barang yang akan di hapus
     */
    public function delete($id_proposal)
    {
        $delete = $this->db->delete($this->table, ['id_proposal' => $id_proposal]);
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
        $this->db->where('tgl_penerimaan >=', $dari);
        $this->db->where('tgl_penerimaan <=', $ke);
        $query = $this->db->get($this->table);
        return $query->result();
    }
}
