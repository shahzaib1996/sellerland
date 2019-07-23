<?php 

class Md extends CI_Model
{
    public function insert($tablename,$data)
    {
        $this->db->insert($tablename,$data);
    }


    public function update($where,$tablename,$updatedata)
    {
        foreach ($where as $k=>$v) {
            $this->db->where($k,$v);
        }
        $this->db->update($tablename,$updatedata);
    }
    public function delete($where,$tablename)
    {
        foreach ($where as $k=>$v) {
            $this->db->where($k,$v);
        }
        $this->db->delete($tablename);
    }

    public function week_profit()
    {
      $query=  "SELECT SUM(price) as price FROM `purchase` where `date` > DATE_SUB(NOW(),INTERVAL  1 WEEK )";
      $result=$this->db->query($query);
      return $result->row()->price;
    }
    public function month_profit()
    {
      $query=  "SELECT SUM(price) as price FROM `purchase` where `date` > DATE_SUB(NOW(),INTERVAL  1 MONTH )";
      $result=$this->db->query($query);
      return $result->row()->price;
    }
    public function year_profit()
    {
      $query=  "SELECT SUM(price) as price FROM `purchase` where `date` > DATE_SUB(NOW(),INTERVAL  1 YEAR )";
      $result=$this->db->query($query);
      return $result->row()->price;
    }
    public function report()
    {
//            $query="SELECT `orders.id`,`orders.title`,`orders.price`,`orders.qty`,`orders.status`,`user.email` From `orders`
//            INNER JOIN `user` ON `orders.id`=`user.id`";
//        $this->db->select('orders.id,orders.title,user.id,orders.price,orders.qty,orders.status,user.email');
        $this->db->select('*');
        $this->db->from("purchase");
        $this->db->join('user', 'purchase.id = user.id','left');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function user()
    {
//            $query="SELECT `orders.id`,`orders.title`,`orders.price`,`orders.qty`,`orders.status`,`user.email` From `orders`
//            INNER JOIN `user` ON `orders.id`=`user.id`";
//        $this->db->select('orders.id,orders.title,user.id,orders.price,orders.qty,orders.status,user.email');
        $this->db->select('*');
        $this->db->from("orders");
        $this->db->join('user', 'orders.user_id = user.id','left');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function fetch($tablename,$where=NULL)
    {
        $this->db->select();
        $this->db->from($tablename);
        if($where!=NULL)
        {
            foreach ($where as $k=>$v) {
                $this->db->where($k,$v);
            }
        }
        $data=$this->db->get()->result_array();
        return $data;
    }
    public function fetchh($tablename,$where=NULL){
        $this->db->select();
        $this->db->order_by('title','asc');
        $this->db->from($tablename);
        if($where!=NULL){
            foreach ($where as $k=>$v) {
                $this->db->where($k,$v);
            }
            }
        $data=$this->db->get()->result_array();
        return $data;
    }
    public function join($tbname,$tbjoin_name,$tb_f_col_name,$tb_s_col_name){
        $this->db->select('*');
        $this->db->from($tbname);
        $this->db->join($tbjoin_name, $tb_f_col_name.' = '.$tb_s_col_name,'left');
        $query = $this->db->get()->result_array();
        return $query;
    }
    public function ascending($tbname,$col_name_and_orderby,$where=null){
        $this->db->select('*');
        $this->db->from($tbname);
        foreach($col_name_and_orderby as $k=>$v){
            $this->db->order_by($k,$v);
        }
        if($where!=null){
            foreach($where as $k=>$v){
                $this->db->where($k,$v);
            }
        }
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function fetch_user_products($user_id)
    {
        $this->db->select();
        $this->db->from('product');
        $this->db->where('user_id',$user_id);  
        $data=$this->db->get()->result_array();
        return $data;
    }

    public function fetch_user_query( $user_id ) {
        $this->db->select('cq.*,v.store_name AS "vendor_name"');
        $this->db->from('client_query as cq');
        $this->db->join('vendor as v',' cq.vendor_id = v.id ');
        $this->db->where('user_id',$user_id);  
        $data=$this->db->get()->result_array();
        return $data;
    }

    public function fetch_query_detail( $query_id ) {
        $this->db->select('cq.*,v.store_name,u.username,u.email');
        $this->db->from('client_query cq');
        $this->db->join('vendor as v',' cq.vendor_id = v.id ');
        $this->db->join('user as u',' cq.user_id = u.id ');
        $this->db->where('cq.id',$query_id);  
        $data=$this->db->get()->result_array();
        return $data;
    }

    public function fetch_query_reply( $query_id ) {
        $this->db->select();
        $this->db->from('client_query_reply');
        $this->db->where('client_query_id',$query_id);  
        $data=$this->db->get()->result_array();
        return $data;
    }

    public function fetch_vender_feedback( $vendor_id ) {
        $this->db->select('fb.*,p.title AS "product_title"');
        $this->db->from('feedback fb');
        $this->db->join('product as p',' fb.pro_id = p.id ');
        $this->db->where('fb.vendor_id',$vendor_id);  
        $data=$this->db->get()->result_array();
        return $data;
    }

    public function feedback_join_product($vendor_id)
    {
        $this->db->select('fb.*, p.title as "product_title"');
        $this->db->from('feedback fb');
        $this->db->join('product as p',' fb.pro_id = p.id ');
        $this->db->where('vendor_id',$vendor_id);
        
        $data=$this->db->get()->result_array();
        return $data;
    }

    public function blacklist_user($user_id)
    {
        $this->db->where('id',$user_id);
        $this->db->update('user',[ 'status'=>'Inactive' ]);
    }

    public function unblacklist_user($user_id)
    {
        $this->db->where('id',$user_id);
        $this->db->update('user',[ 'status'=>'Active' ]);
    }

    public function single_product_with_vendor($productID)
    {
        $this->db->select('p.*,v.username,v.email,v.store_name');
        $this->db->from('product p');
        $this->db->join('vendor as v',' p.user_id = v.id ');
        $this->db->where('p.id',$productID);
        $data=$this->db->get()->result_array();
        return $data;
    }

    public function products_with_vendor()
    {
        $this->db->select('p.*,v.store_name');
        $this->db->from('product p');
        $this->db->join('vendor as v',' p.user_id = v.id ');
        $data=$this->db->get()->result_array();
        return $data;
    }

    public function search_products($search='',$vendor='')
    {
        $this->db->select('p.*,v.store_name');
        $this->db->from('product p');
        $this->db->join('vendor as v',' p.user_id = v.id ');
        if( $vendor != '' && $search != '' ) {
            $this->db->where('p.user_id', $vendor);
            $this->db->like('p.title', $search , 'both');
        } else if( $vendor != '' && $search == '' ) {
            $this->db->where('p.user_id', $vendor);
        } else if( $vendor == '' && $search != '' ) {
            $this->db->like('p.title', $search , 'both');
        }
        
        $data=$this->db->get()->result_array();
        return $data;
    }

}