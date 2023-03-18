<?php
// Check if the file parameter is set in the URL
if (isset($_GET['file'])) {
    // Get the file name from the URL parameter
    $file_name = urldecode($_GET['file']);
    
    // Set the path to the file
    $file_path = 'uploads/files/' . $file_name;
    
    // Check if the file exists
    if (file_exists($file_path)) {
        // Set the content type and send the file headers
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $file_name . '"');
        header('Content-Length: ' . filesize($file_path));
        
        // Read the file and send its contents to the browser
        readfile($file_path);
        exit;
    } else {
        // Display an error message if the file doesn't exist
        echo 'File not found.';
    }
}
?>
