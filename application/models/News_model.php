<?php
//application/models/News_model.php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
                $query = $this->db->get('sp18_news');
                return $query->result_array();
        }

        $query = $this->db->get_where('sp18_news', array('slug' => $slug));
        return $query->row_array();
} // end get_news()

    
public function set_news()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'text' => $this->input->post('text')
    );

    //return $this->db->insert('sp18_news', $data);
    
    if($this->db->insert('sp18_news', $data))
    {// data inserted pass back slug
        return $slug;
    }else{//data not inserted, pass back warning
         return $false;
                

    }


}//end set_news() 
    
    
}//end News_model