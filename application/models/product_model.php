<?php
class product_model extends CI_Model
{
    public function getalldataproduct()
    {
        $this->db->select('id, product.id_brand, product.product, brand.brand, product.price, product.stock, product.specification,  product.img_product, brand.img_brand, product.date_created');
        $this->db->from('product');
        $this->db->join('brand', 'brand.id_brand = product.id_brand');
        // $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function deleteproduct($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product');
    }



    public function countproduct()
    {
        return $this->db->get('product')->num_rows();
    }

    public function getsearch($search, $limit, $start)
    {
        $this->db->select('id, product.id_brand, product.product, brand.brand, product.price, product.stock, product.specification,  product.img_product, brand.img_brand, product.date_created');
        $this->db->from('product');
        $this->db->join('brand', 'brand.id_brand = product.id_brand');
        $this->db->like('product.product', $search);
        $this->db->or_like('brand.brand', $search);
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }
}
