<?php
class shop_model extends CI_Model
{

    public function getshop()
    {
        $this->db->select('id, product.id_brand, product.product, brand.brand, product.price, product.stock, product.specification,  product.img_product, brand.img_brand, product.date_created');
        $this->db->from('product');
        $this->db->join('brand', 'brand.id_brand = product.id_brand');
        // $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }
}
