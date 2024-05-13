<?php
require_once '../../config.php';
include '../../Model/feedback.php'; 
include '../../Controller/feedController.php'; 

$error = "";

if (
    isset($_POST["userId"]) &&
    isset($_POST["comment"]) &&
    isset($_POST["rating"]) 
    
) {
    if (
        !empty($_POST["userId"]) &&
        !empty($_POST["comment"]) &&
        !empty($_POST["rating"]) 

    ) {
        $feed = new feed (
            $_POST['userId'],
            $_POST['comment'],
            $_POST['rating']
        );
        $feedC = new feedC;
       
        $feedC->create($feed);
    } else {
        $error = "Missing information";
    }
}



?>


<!doctype html>
<html lang="en">
<head>
<script>
function validateForm() {
    var complaintField = document.getElementById('comment');
    var complaint = complaintField.value.toLowerCase(); // Convertir le texte en minuscules pour faciliter la comparaison

    // Liste de mots interdits
    var forbiddenWords = ['chien', 'gang', 'merde']; // Ajoutez vos mots inappropriés ici

    // Vérifier si le texte contient l'un des mots interdits
    for (var i = 0; i < forbiddenWords.length; i++) {
        if (complaint.includes(forbiddenWords[i])) {
            alert('Erreur : Les mots utilisés sont inappropriés.');
            return false; // Empêcher la soumission du formulaire
        }
    }
    
    return true; // Autoriser la soumission du formulaire si aucun mot interdit n'est détecté
}
</script>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
    <!-- Add relevant stylesheets and scripts -->
    <style>
        /* Style the container where Google Translate is placed */
#google_translate_element {
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center; /* Center-align text */
}

/* Change text style */
.goog-te-gadget-simple {
    font-size: 14px;
    color: #333;
    cursor: pointer;
}

/* Hide the Google Translate icon if needed */
.goog-te-gadget-icon {
    display: none;
}

/* Center the form on the page */
.feedback-table {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

/* Style the form elements */
#feedback-form {
    width: 400px; /* Adjust width as needed */
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.feedback-table td {
    padding: 10px;
}

.feedback-table label {
    font-weight: bold;
}

.feedback-table textarea,
.feedback-table input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-top: 4px;
    margin-bottom: 8px;
    box-sizing: border-box; /* Include padding and border in element's total width and height */
}

.feedback-table .like-dislike-container label {
    margin-right: 20px; /* Adjust margin as needed */
}

.feedback-table button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.feedback-table button:hover {
    background-color: #0056b3;
}
.h2 {
    border-radius: 5px;
    text-align: center; /* Center-align text */
 
}
    </style>
</head>
<body>
<?php if (!empty($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <div class="container">
        <h2>Merci pour votre réservation donnez votre feedback </h2>
        
        <div id="google_translate_element"></div>
<script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script>
    function googleTranslateElementInit() {
        new google.translate.TranslateElement(
            { pageLanguage: 'en' },
            'google_translate_element'
        );
    }
</script>
        
        <table class="feedback-table">
            <form id="feedback-form" action="" method="post" onsubmit="return validateForm()">
                <tr>
                    <td><label for="userId">Votre nom (Pas obligatoire):</label></td>
                    <td>
                        <input type="text" class="form-control" id="userId" name="userId">
                    </td>
                </tr>

                <tr>
                    <td><label for="comment">Votre commentaire:</label></td>
                    <td>
                        <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                    </td>
                </tr>

                <tr>
                    <td><label>Avez-vous aimé notre contenu ?</label></td>
                    <td>
                        <div class="like-dislike-container">
                            <label>
                                <input type="radio" name="rating" value="like" required>
                                <i class="fa fa-thumbs-o-up"></i> Like
                            </label>
                            <label>
                                <input type="radio" name="rating" value="dislike" required>
                                <i class="fa fa-thumbs-o-down"></i> Dislike
                            </label>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align: right;">
                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                    </td>
                </tr>
            </form>
        </table>

        <!-- Result Display -->
        <div id="result-display" class="result-display"></div>
    </div>

</body>
</html>
