<?php
class Polres_model extends CI_Model
{
    public function dashboard()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('user_role', 'users.id_role = user_role.id_role');
        $this->db->where('username', $this->session->userdata('username'));
        return $this->db->get()->row_array();
    }

    public function map()
    {
        $this->db->select(" *, replace(nama_polres, ' ', '') AS name");
        $this->db->from("tb_polres");
        return $this->db->get()->result_array();
    }

    public function nilaiMax(){
        $this->db->select('MAX(jumlah_kejahatan) as nilai')
                ->from('tb_data_kejahatan');
        return $this->db->get()->result_array();
    }

    public function add()
    {
        $data = [
            'nama_polres' => $this->input->post('nama_polres', true),
            'alamat' => $this->input->post('alamat', true),
            'kontak' => $this->input->post('kontak', true),
            'email' => $this->input->post('email', true),
            'latitude' => $this->input->post('latitude', true),
            'longitude' => $this->input->post('longitude', true),
            'deskripsi' => $this->input->post('deskripsi', true),
        ];
        $this->db->insert('tb_polres', $data);
    }
    public function getid($id)
    {
        return $this->db->get_where('tb_polres', ['id_polres' => $id])->row_array();
    }

    public function update()
    {
        $id = $this->input->post('id', true);
        $data = [
            'nama_polres' => $this->input->post('nama_polres', true),
            'alamat' => $this->input->post('alamat', true),
            'kontak' => $this->input->post('kontak', true),
            'email' => $this->input->post('email', true),
            'latitude' => $this->input->post('latitude', true),
            'longitude' => $this->input->post('longitude', true),
            'deskripsi' => $this->input->post('deskripsi', true),
        ];
        $this->db->where('id_polres', $id);
        $this->db->update('tb_polres', $data);
    }


    public function delete($id)
    {
        $this->db->where('id_polres', $id);
        $this->db->delete('tb_polres');
    }


}