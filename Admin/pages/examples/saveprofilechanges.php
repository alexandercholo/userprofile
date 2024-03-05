<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if email exists in the database
    $email = $_POST["email"] ?? null;
    $query = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Email exists, show error message
        echo '
        <style>
            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .error-message {
                background-color: #f8d7da;
                border: 1px solid #f5c6cb;
                color: #721c24;
                padding: 15px;
                border-radius: 5px;
                width: 300px;
                text-align: center;
                box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            }

            .error-message p {
                margin: 0;
            }

            .back-button {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease;
                margin-top: 15px;
            }

            .back-button:hover {
                background-color: #0056b3;
            }
        </style>
        <div class="container">
            <div class="error-message">
                <p>Email already exists</p>
                <button class="back-button" onclick="window.location.href=\'profile.php\'">Go Back</button>
            </div>
        </div>';
    } else {
        // Email doesn't exist, insert new user into the database
        $user_id = $_POST['user_id'];
        $full_name = $_POST['full_name'];
       $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $dob = isset($_POST['dob']) ? $_POST['dob'] : null;
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $bio = isset($_POST['bio']) ? $_POST['bio'] : '';
        $social_media = isset($_POST['social_media']) ? $_POST['social_media'] : '';
        $email = $_POST["email"] ?? null;
        $profile_picture = isset($target_file) ? $target_file : 'default_picture.jpg';

        // Validate date of birth
        if ($dob != null && !strtotime($dob)) {
            echo "Error: Invalid date format for date of birth";
            exit();
        }

        // Process the uploaded file
        $target_file = '';
        if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
            // You should also check if file already exists, file size, and file type here
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["profile_picture"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    // Assuming $conn is your database connection
$sql = "INSERT INTO user_profile (user_id, full_name, email, phone_number, address, dob, gender, bio, social_media, profile_picture) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

// Assuming all fields are strings; adjust accordingly if not
mysqli_stmt_bind_param($stmt, 'ssssssssss', $user_id, $full_name, $email, $phone_number, $address, $dob, $gender, $bio, $social_media, $profile_picture);

if (mysqli_stmt_execute($stmt)) {
    // Redirect or success message
    header("Location: userprofile.php");
    exit();
} else {
    // Error handling
    echo "Error: " . mysqli_error($conn);
}

    }
}
?>
