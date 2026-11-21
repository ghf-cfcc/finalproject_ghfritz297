<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width+device-width, initial-scale=1.0">
    <title> Full Stack Development Final Project.php</title>
    <link rel="stylesheet" href="styles/main.css">
    <script src="scripts/main.js" defer></script>
</head>

<body>
    <h1>Full Stack Development</h1>  
    <h2>Gavin Fritz</h2>
    <p><?php echo date("F j, Y"); ?></p>

    <section id="ImageGallery">
        <figure>
            <img src="media/image1.png" alt-"First student directory gallery image">
            <figcaption>First gallery image</figcaption>
        </figure>
        <figure>
            <img src="media/image2.png" alt-"Second student directory gallery image">
            <figcaption>Second gallery image</figcaption>
        </figure>
        <figure>
            <img src="media/image3.png" alt-"Third student directory gallery image">
            <figcaption>Third gallery image</figcaption>
        </figure>
    </section>

    
    <h3>Search Student Directory</h3>
    <p>Enter a Student's last name</p>
    <!-- send form fields to results.php using POST -->
    <form action="search.php" method="POST">
        <label for="last_name">Student Last Name</label>
        <input type="text" id="last_name" name="last_name" maxlength="50" required>
        <input type="submit" value="Search">
    </form>
</body>

</html>
