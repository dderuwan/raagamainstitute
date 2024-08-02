<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading...</title>
    <link rel="stylesheet" href="./css/loding.css">
</head>
<script>
    setTimeout(function() {
        window.location.href = 'teachers_first.php';
    }, 2000);
</script>
<body>
    <div class="container-loding">
        <div class="ring"></div>
        <div class="ring"></div>
        <div class="ring"></div>
        <span class="load">Loading...</span>
    </div>
</body>
</html>