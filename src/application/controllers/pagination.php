<?php
$perpage = 5;
$this->load->library('pagination');
$config['base_url'] = '?page=';
$config['per_page'] = $perpage;
$config['page_query_string'] = TRUE;
$config['total_rows'] = count($todayTips);
$this->pagination->initialize($config);
$pageLink =  $this->pagination->create_links();

$from = $this->input->get('per_page');
if ($from === false || $from === '') {
$from = 0;
}

$showTips = array_slice($todayTips,$from,$perpage);
?>