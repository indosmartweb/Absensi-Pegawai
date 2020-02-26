<?php 
require_once 'header.php';
require_once 'nav.php';
require_once 'sidebar.php';
if ( $content ) {
    $this->load->view($content);
}
require_once 'footer.php';