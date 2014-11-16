<?php
$perpage = 5;
$this->load->library('pagination');
$config['base_url'] = '?page=';
$config['per_page'] = $perpage;
$config['page_query_string'] = TRUE;
$config['total_rows'] = count($this->todayTips);
$this->pagination->initialize($config);
$this->pageLink =  $this->pagination->create_links();

$from = $this->input->get('per_page');
if ($from === false || $from === '') {
    $from = 0;
}

$this->showTips = array_slice($this->todayTips,$from,$perpage);
?>