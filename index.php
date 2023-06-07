<?php
if (!isset($_GET['mode'])) header("Location: ./?mode=default")
?>
<!DOCTYPE html>

<html>

<head>
    <title>Download NuggetInc's Wallpaper tool</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
</head>

<body>
    <?php
    if (isset($_GET['submit'])) {
    ?>
        <div class="d-flex flex-column text-center justify-content-center">
            <p class="mt-4">
                Your file should be downloading<br>
                The url of the image will be https://wallpaper.dirkdev.com/wallpapers/<?= $_GET['username'] ?>.png<br>
                Set an image or change it at any time at
                <a href="https://wallpaper.dirkdev.com/manage/<?= $_GET['username'] ?>">https://wallpaper.dirkdev.com/manage/<?= $_GET['username'] ?></a>
            </p>
            <form action="./?mode=default">
                <input class="input-group-submit p-2 w-50 mx-auto mt-3 cursor-pointer mw-40" type="submit" name="return" value="Go again">
            </form>
        </div>
    <?php
    } else {
    ?>
        <h1 class="text-center mt-4 mb-5">Download NuggetInc's Wallpaper tool</h1>

        <form class="d-flex flex-column text-center align-items-center">
            <div class="btn-group w-50 mw-40" role="group" aria-label="Mode selection">
                <a type="button" href="./?mode=default" class="btn btn-primary shadow-none <?= $_GET['mode'] == "default" ? "bg-primary text-white" : "bg-white text-primary" ?>">Default</a>
                <a type="button" href="./?mode=url" class="btn btn-primary shadow-none <?= $_GET['mode'] == "url" ? "bg-primary text-white" : "bg-white text-primary" ?>">URL</a>
                <a type="button" href="./?mode=image" class="btn btn-primary shadow-none <?= $_GET['mode'] == "image" ? "bg-primary text-white" : "bg-white text-primary" ?>">Image</a>
                <a type="button" href="./?mode=xkcd" class="btn btn-primary shadow-none <?= $_GET['mode'] == "xkcd" ? "bg-primary text-white" : "bg-white text-primary" ?>">xkcd</a>
            </div>
            <input type="hidden" name="mode" value="<?= $_GET['mode'] ?>">
            <?php
            switch ($_GET['mode']) {
                case "default":
            ?>
                    <span class="mt-4 w-50 mw-40">Download the wallpaper from dirkdev.com. The image can be changed at any time at https://wallpaper.dirkdev.com/manage/{username}</span>
                    <input required autocomplete="off" id="name-input-field" class="input-group-text form-control text-start p-2 w-50 mt-4 mw-40" type="text" name="username" placeholder="Username">
                    <span id="helpMessage" class="text-success">The url of the image will be
                        https://wallpaper.dirkdev.com/wallpapers/{username}.png</span>
                <?php
                    break;
                case "url":
                ?>
                    <span class="mt-4 w-50 mw-40">Download the wallpaper from a url of your own. Link to an image you found on the internet or use a link of which you can change the image contents.</span>
                    <input required autocomplete="off" id="url-input-field" class="input-group-text form-control text-start p-2 w-50 mt-4 mw-40" type="text" name="url" placeholder="URL">
                <?php
                    break;
                case "image":
                ?>
                    <span class="mt-4 w-50 mw-40">Pick an image. Because this image doesn't have to be downloaded, this will work even on devices without an internet connection</span>
                    <input type="file" id="wallpaper" name="wallpaper" class="mt-4 mw-40">
                <?php
                    break;
                case "xkcd":
                ?>
                    <span class="mt-4 w-50 mw-40">Every time the user starts their computer or changes their background, a random comic from https://xkcd.com will be downloaded and set as desktop wallpaper</span>
            <?php
                    break;
            }
            ?>
            <div class="mt-4">
                <input type="checkbox" name="addToStartup" id="addToStartup" class="form-check-input shadow-none">
                <label for="addToStartup" class=" form-check-label user-select-none">Start tool on startup</label>
            </div>
            <input class=" input-group-submit p-2 w-50 mt-4 cursor-pointer mw-40" type="submit" name="submit" value="Download">
        </form>
    <?php
    }
    ?>
</body>

</html>