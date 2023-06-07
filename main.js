$("#name-input-field").on("input", () => {
    if ($("#name-input-field").val()) {
        //TODO Add a check to see if this username is already used
        if (isValid($("#name-input-field").val())) {
            $("#helpMessage").removeClass("text-danger");
            $("#helpMessage").addClass("text-success");
            $("#helpMessage").text("The url of the image will be https://wallpaper.dirkdev.com/wallpapers/" + $("#name-input-field").val().split(" ").join("%20") + ".png")
        } else {
            $("#helpMessage").removeClass("text-success");
            $("#helpMessage").addClass("text-danger");
            $("#helpMessage").text("This username is not allowed as it would result in an invalid file name");
        }
    } else {
        $("#helpMessage").text("The url of the image will be https://wallpaper.dirkdev.com/wallpapers/{username}.png")
    }
})

function isValid(fname) {
    var rg1 = /^[^\\/:\*\?"<>\|]+$/; // forbidden characters \ / : * ? " < > |
    var rg2 = /^\./; // cannot start with dot (.)

    return rg1.test(fname) && !rg2.test(fname);
};