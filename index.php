<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/index.css">
    <title>Document</title>
</head>
<body style="position: relative; height: 100vh">
    <svg style="position: absolute; top:0; left:0; width: 100%; height: 100%; z-index: -1" xmlns='http://www.w3.org/2000/svg' width='600' height='100' viewBox='0 0 600 100'><rect fill='#ffffff' width='600' height='100'/><g stroke='#FFF' stroke-width='0' stroke-miterlimit='10' ><circle fill='#037B79' cx='0' cy='0' r='50'/><circle fill='#92DEBA' cx='100' cy='0' r='50'/><circle fill='#FFFFD8' cx='200' cy='0' r='50'/><circle fill='#CAF2FF' cx='300' cy='0' r='50'/><circle fill='#6FCCFF' cx='400' cy='0' r='50'/><circle fill='#006EB4' cx='500' cy='0' r='50'/><circle fill='#037B79' cx='600' cy='0' r='50'/><circle cx='-50' cy='50' r='50'/><circle fill='#53ac9a' cx='50' cy='50' r='50'/><circle fill='#ceefc1' cx='150' cy='50' r='50'/><circle fill='#ffffff' cx='250' cy='50' r='50'/><circle fill='#9de0fe' cx='350' cy='50' r='50'/><circle fill='#3e9cda' cx='450' cy='50' r='50'/><circle fill='#00789c' cx='550' cy='50' r='50'/><circle cx='650' cy='50' r='50'/><circle fill='#037B79' cx='0' cy='100' r='50'/><circle fill='#92DEBA' cx='100' cy='100' r='50'/><circle fill='#FFFFD8' cx='200' cy='100' r='50'/><circle fill='#CAF2FF' cx='300' cy='100' r='50'/><circle fill='#6FCCFF' cx='400' cy='100' r='50'/><circle fill='#006EB4' cx='500' cy='100' r='50'/><circle fill='#037B79' cx='600' cy='100' r='50'/><circle cx='50' cy='150' r='50'/><circle cx='150' cy='150' r='50'/><circle cx='250' cy='150' r='50'/><circle cx='350' cy='150' r='50'/><circle cx='450' cy='150' r='50'/><circle cx='550' cy='150' r='50'/></g></svg>
    <div class="logo">
        <h1 id="logo">WallShare</h1>
    </div>
    <div class="hero-container">
        <div class="all-wallpapers">
            <?php require_once 'process.php'; ?>
            <?php
                $mysqli = new mysqli('localhost', 'root', '','crud') or die(mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM data");
                //pre_r($result);
                ?>
                    <div class="images-container" style="display:flex; justify-content:space-around; align-items: center; width: 100%; flex-wrap: wrap ">
                        <?php
                            while($images = $result->fetch_assoc()): ?>
                            <div class="image" style="border: 5px solid black;border-radius: 2rem; overflow: hidden; margin-bottom: 1rem">
                                <div class="desc" style="padding: 1rem; text-align: center; background: grey; font-family: 'Poppins', sans-serif">
                                    <p style="font-weight: bold; font-size: 1.5rem"><?php echo $images['name']; ?></p>
                                    <p style="font-weight: 500"><?php echo $images['location'] ?></p>
                                     
                                </div>
                                <div class="image-main" style="height:350px; width: 400px; position: relative">
                                    <img style="width: 100%; height: 100%; object-fit: cover" src="image/<?php echo $images['image']; ?>"  alt="image">
                                    <a style=" position: absolute; top: 90%; left: 40%; background: rgb(57, 183, 233); color: white; text-decoration: none; padding: .5rem 1rem; font-family:'Poppins', sans-serif; border-radius: .4rem; margin-bottom: .5rem" href="image/<?php echo $images['image']; ?>" download>Download</a>
                                </div>
                            </div>
                        <?php endwhile; ?>

                    </div>

                <?php
            ?>
        </div>
        <div class="input-section">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="Caption" name="caption" required>
                <input type="file" name="image" required>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>