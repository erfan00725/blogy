<?php 

require "../founctions.php";
require_once "../config.php";
require "../utility/uploadImage.php";

sessionStart();

if(!isAuthorized('writer')){
    header("Location: /index.php");
}

$stmnt = $connection->prepare("SELECT * FROM users WHERE role = :role");
$stmnt->execute(['role' => 'writer']);
$writers = $stmnt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($_SESSION);


if (isset($_POST['submit'])) {
    if (requireFields(['title','description'])) {
        $imageLocation = uploadImage();
        $title = $_POST['title'];
        $description = $_POST['description'];
        $writerID = $_SESSION['id'];

        $stmnt = $connection->prepare("INSERT INTO posts (title, description, writer_id, image_path) VALUES(:title, :description, :writer_id, :image_path)");

        try {
            $stmnt->execute([
                'title' => $title,
                'description' => $description,
                'writer_id' => $writerID,
                'image_path' => $imageLocation
            ]);
            echo "post saved!";
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }


    }else {
        echo "all fields are required";
    }
}

?>



<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <title>Writer Panel</title>
	<link rel="shortcut icon" href="/favicon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="/fonts/icomoon/style.css">
	<link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="/css/tiny-slider.css">
	<link rel="stylesheet" href="/css/aos.css">
	<link rel="stylesheet" href="/css/glightbox.min.css">
	<link rel="stylesheet" href="/css/style.css">

	<link rel="stylesheet" href="/css/flatpickr.min.css">

    <style>
        .form-group{
            margin-bottom: 15px;
        }
        label{
            margin-bottom: 5px;
        }
        .alert{
            margin: 20px 100px;
        }
    </style>
</head>
<body>
<?php require "../partials/_header.php"?>

    <div class="container">
        <div class="row" style="margin-top: 80px;">
            <h2>Write a post:</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">title:</label>
                    <input type="text" id="title" placeholder="title" class="form-control" name="title">
                </div>

                <div class="form-group">
                    <label for="image">image:</label>
                    <input type="file" id="image" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Body:</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Add post</button>
                </div>
            </form>
        </div>
    </div>
    <?php require "../partials/_footer.php"?>

    
    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading.</span>
      </div>
    </div>

    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="/js/tiny-slider.js"></script>

    <script src="/js/flatpickr.min.js"></script>

    <script src="/js/aos.js"></script>
    <script src="/js/glightbox.min.js"></script>
    <script src="/js/navbar.js"></script>
    <script src="/js/counter.js"></script>
    <script src="/js/custom.js"></script>

</body>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>