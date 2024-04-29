<?php
// Include the TCPDF library
require_once 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\autoload.php';
include 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\Controller\CommentController.php';
include 'C:\xampp\htdocs\ecotrust11\ecotrust11\ecotrust\Controller\BlogController.php';

// Retrieve data from the form
$post_id = $_GET['id'] ?? 0;
$title = urldecode($_GET['title'] ?? '');
$created_at = urldecode($_GET['created_at'] ?? '');
$author = urldecode($_GET['author'] ?? '');
$content = urldecode($_GET['content'] ?? '');

$commentController = new CommentController();
$blogController = new BlogController();

// Check if the post exists and all required data is available
if ($post_id && $title && $created_at && $author && $content) {
    // Start output buffering
    ob_start();
    $post = $blogController->getBlogPost($post_id); // Fetch blog post data

    // Output the HTML content
    ?>
    <h1><?= $title ?></h1>
    <p class="blog-meta">Published on <?= $created_at ?> by <?= $author ?></p>
    <div class="content">
        <?php
        // Convert the binary image data to base64 for displaying
        $image_data = base64_encode($post['image_url']);
        $image_mime = 'image/jpeg'; // Assuming the image MIME type is JPEG
        $image_src = "data:{$image_mime};base64,{$image_data}";
        ?>
        <?php if (!empty($image_src)) : ?>
            <img src="<?= $image_src ?>" alt="Blog Image"> <!-- Display the image -->
        <?php endif; ?>
        <p class="blog-content">Content: <br><?= $content ?></p>
        <p class="blog-content">Comments:</p>
        <?php
        // Load comments related to this blog post
        $comments = $commentController->listCommentsByBlogId($post_id);
        if ($comments) {
            foreach ($comments as $comment) {
                ?>
                <div class="comment">
                    <p><strong><?= $comment['name'] ?>:</strong> <?= $comment['content'] ?></p>
                </div>
                <?php
            }
        } else {
            echo "<p>No comments yet.</p>";
        }
        ?>
    </div>
    <?php

    // Get the HTML content from the output buffer
    $html = ob_get_clean();

    // Create a new TCPDF instance
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // Set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Your Name');
    $pdf->SetTitle($title);
    $pdf->SetSubject('Blog Post Details');
    $pdf->SetKeywords('TCPDF, PDF, blog, post');

    // Set default header data
    $pdf->SetHeaderData("C:\xampp\htdocs\recrutement-et-emploi-2A39\Mentor\assets\img\logo.png", PDF_HEADER_LOGO_WIDTH, 'PDF BY NAWRES', $title);

    // Set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // Set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Set font
    $pdf->SetFont('helvetica', '', 12);

    // Add a page
    $pdf->AddPage();

    // Write HTML content to the PDF
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output the PDF as a download
    $pdf->Output('blog_post_' . $post_id . '.pdf', 'D');

} else {
    // No post found or missing data
    echo "<p>No post found or missing data.</p>";
}
?>
