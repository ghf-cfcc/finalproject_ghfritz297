<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width+device-width, initial-scale=1.0">
    <title> Full Stack Development Final Project Search.php</title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="scripts/main.js" defer></script>
</head>

<body>
    <h1>Student Directory</h1>
    <h3>Search Results</h3>

    <?php
    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $lastName = trim($_POST["last_name"] ?? "");

        if (empty($lastName)) {
            echo "<p class='message'>Please enter a last name.</p>";
        } else {
            //connect to XAMPP database
            $connection = mysqli_connect("localhost", "root", "", "student_directory", 3307);

            if (!$connection) {
                echo "<p class='message'>Database connection failed.</p>";
            } else {
                // Search for student by last name
                $sql = "CALL search_students(?)";
                $statement = mysqli_prepare($connection, $sql);

                if (!$statement) {
                    echo "<p class='message'>Search could not be completed.</p>";
                } else {
                    mysqli_stmt_bind_param($statement, "s", $lastName);

                    if (mysqli_stmt_execute($statement)) {
                        mysqli_stmt_bind_result($statement, $id, $firstName, $studentLastName, $email);
                        $rows = "";

                        //Display each matching student using a while loop
                        while (mysqli_stmt_fetch($statement)) {
                            $rows .= "<tr>";
                            $rows .= "<td>" .htmlspecialchars($id, ENT_QUOTES, "UTF-8") . "</td>";
                            $rows .= "<td>" .htmlspecialchars($firstName, ENT_QUOTES, "UTF-8") . "</td>";
                            $rows .= "<td>" .htmlspecialchars($studentLastName, ENT_QUOTES, "UTF-8") . "</td>";
                            $rows .= "<td>" .htmlspecialchars($email, ENT_QUOTES, "UTF-8") . "</td>";
                            $rows .= "<tr>";
                        }
                        if ($rows == "") {
                            echo "<p class='message'>No students found.</p>";
                        } else {
                            echo "<table>";
                            echo "<tr><th>ID</th><th>First Name</th>th>Last Name</th><th>Email</th><tr>";
                            echo $rows;
                        }    echo "<table>";
                    } else {
                        echo "<p class='message'>Search could not be completed.</p>";
                    }
                    mysqli_stmt_close($statement);
                }
            }   mysqli_close($connection);            }
    } else {
        echo "<p class='message'>Please submit the search form first.</p>";
    }
    ?>
    
    <p><a href="index.php">Return to Home</a></p>
</body>
</html>