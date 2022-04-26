<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User_model extends CI_Model
{
    // mengambil data login
    public function login($nip, $password)
    {
        $query_login = $this->db->get_where('user', ["nip" => $nip]);
        if ($query_login->num_rows() == 1) {
            // ada di database
            // mengambil data
            $row_login = $query_login->row();

            if (password_verify($password, $row_login->password)) {
                // password oke
                // mengambil data join dari tb_login_user, user

                $result = array(
                    "status" => true,
                    "data" => $row_login
                );
            } else {
                // password tidak oke
                $result = array(
                    "status" => false
                );
            }
        } else {
            // tidak ada di database
            $result = array(
                "status" => false
            );
        }
        return $result;
    }

    public function register($data)
    {
        $reg = $this->db->insert("user", $data);
        return $reg;
    }

    public function cek_email($email)
    {
        $query_email = $this->db->get_where('user', ["email" => $email]);
        if ($query_email->num_rows() > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }


    public function cek_nip($nip)
    {
        $query_nip = $this->db->get_where('user', ["nip" => $nip]);
        if ($query_nip->num_rows() > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * mengambil semua data
     */
    public function get_all()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    /**
     * mengambil semua data user berdasarkan id user
     * @param id_user
     */
    public function get_by_id($id_user)
    {
        $query = $this->db->get_where('user', ['id_user' => $id_user]);
        return $query->row();
    }

    /**
     * mendapatkan data user yang sudah terpaging
     * @param limit = jumlah data per page
     * @param offset = jumlah data yang dilewati
     */
    public function get_page($limit = null, $offset = null)
    {
        if ($limit !== null || $offset !== null) {
            $this->db->limit($limit, $offset);
            $this->db->where('1', '1');
            $this->db->from('user');
            $this->db->order_by('id_user', 'DESC');
            $query = $this->db->get();

            $this->db->where('1', '1');
            $total_data = $this->db->count_all_results('user');

            $data = array(
                "total_data" => $total_data,
                "data" => $query->result()
            );

            return $data;
        } else {
            $response = false;
        }
        return $response;
    }

    /**
     * menginsert / input data user ke database
     * @param data = data user yang akan di insert
     */
    public function insert($data)
    {
        $data["avatar"] = $this->_uploadImage();
        $insert = $this->db->insert('user', $data);
        return $insert;
    }

    /**
     * mengupdate user
     * @param data = data user yang akan di update
     */
    public function update($data)
    {
        if (!empty($_FILES["avatar"]["name"])) {
            $data['avatar'] = $this->_uploadImage();
        }

        $update = $this->db->update('user', $data, ['id_user' => $data['id_user']]);
        return $update;
    }

    private function _uploadImage()
    {
        $nama_foto = "user_" . date("YmdHis", now());

        $config['upload_path'] = './uploads/image/avatar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = $nama_foto;
        $config['overwrite'] = true;
        $config['max_size'] = 2048; //2mb
        // $config['max_width'] = 1024;
        // $config['max_height'] = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('avatar')) {
            $file_name = $this->upload->data("file_name");
        } else {
            $file_name = "default.jpg";
        }
        return $file_name;
    }

    /**
     * menghapus user berdasarkan id user
     * @param id_user = id user yang akan di hapus
     */
    public function delete($id_user)
    {
        $this->_deleteImage($id_user);
        $delete = $this->db->delete('user', ['id_user' => $id_user]);
        return $delete;
    }
    private function _deleteImage($id)
    {
        $result = $this->get_by_id($id);
        if ($result->avatar != "default.jpg") {
            $filename = explode(".", $result->avatar)[0];
            return array_map('unlink', glob(FCPATH . "uploads/image/avatar/$filename.*"));
        }
    }

    /**
     * menghitung jumlah
     */
    public function get_count()
    {
        $query = $this->db->count_all_results('user');
        return $query;
    }
}
