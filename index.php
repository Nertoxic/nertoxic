<?php 
try {
    include 'app/nic/display/error_public_path.html'; 
} catch (Exception $e) {
    print_r("There was a fatal error while loading the error page. Please contact the system administrator to fix the routing.");
}
?>