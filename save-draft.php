<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    
    // Sanitize the file name by removing special characters and spaces
    $filename = strtolower(preg_replace('/[^a-zA-Z0-9]/', '_', $title)) . '.txt';
    
    // Directory where drafts will be saved
    $dir = 'drafts/';
    
    // Ensure the directory exists
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    
    // Combine the draft content into one string
    $draft_content = "Title: " . $title . "\nCategory: " . $category . "\n\n" . $content;
    
    // Save the draft as a .txt file
    file_put_contents($dir . $filename, $draft_content);
    
    // Redirect to the edit-draft page or a confirmation page
    header('Location: edit-draft.php');
    exit();
}
?>
