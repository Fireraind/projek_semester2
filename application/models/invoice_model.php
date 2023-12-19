<?php
class invoice_model extends CI_Model
{
    public  function getinvoice()
    {
        $this->db->select('ordering.id_order, user.id, user.name AS name, user.email, user.phone, user.addres, product.product, product.price, product.img_product, expedition.name_ex, payment.payment, ordering.invoice, ordering.resi, ordering.jumlah, ordering.note, ordering.total, ordering.status');
        $this->db->from('ordering');
        $this->db->join('user', 'user.id = ordering.id_user'); // Pastikan relasi antar tabel sudah benar
        $this->db->join('product', 'product.id = ordering.id'); // Relasi antara tabel product dan ordering (pastikan ini benar)
        $this->db->join('expedition', 'expedition.id_expedition = ordering.id_ex');
        $this->db->join('payment', 'payment.id_pay = ordering.id_pay');
        // $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array(); // Mengembalikan hasil langsung
    }
    // public function countinvoice()
    // {
    //     return $this->db->get('ordering')->num_rows();
    // }
}
