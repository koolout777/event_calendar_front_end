<?php

# If view does not exist, show 404 error
if ( ! file_exists(APPPATH.'/views/pages/admin/'.$view.'.php') ) show_404();
# NOTE: show_404 automatically stops program execution

# Parse title
$data['title']    = ucfirst( $view );
$data['userid']   = ( !empty($this->session->userdata['user_id']) ) ? $this->session->userdata['user_id'] : '' ;
$data['username'] = ( !empty($this->session->userdata['user_name']) ) ? $this->session->userdata['user_name'] : '' ;
$data['type'] = ( !empty($this->session->userdata['type']) ) ? $this->session->userdata['type'] : '' ;
# Load Header
$this->load->view( 'includes/admin/header', $data );

# Load View
$this->load->view( 'pages/admin/' . $view, $view_data );

