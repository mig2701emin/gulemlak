var trgHeight = 200;
var trgWidth = 200;

var myDropzone = new Dropzone('div#dzone', {
    acceptedFiles: 'image/*',
    url: 'http://example.com',
    autoQueue: false
});

myDropzone.on('addedfile', function (file) {
    var reader = new FileReader();
    reader.onload = (function () {
        return (function (e) {
            var image = new Image();
            image.onload = function () {
                (function (file, uri) {
                    EXIF.getData(file, function () {
                        var imgToSend = processImg(
                        uri,
                        trgHeight, trgWidth,
                        this.width, this.height,
                        EXIF.getTag(file, 'Orientation'));

                        console.log(imgToSend);

                        // Promise
                        //    .resolve($.post('http://example.com', {img: imgToSend}))
                        //    .then(console.log('Image was sent !'));
                    });
                })(file, e.target.result);
            };
            image.src = e.target.result;
        })
    })(file);
    reader.readAsDataURL(file);
});

function processImg(image, trgHeight, trgWidth, srcWidth, srcHeight, orientation) {
    var canvas = document.createElement('canvas');
    canvas.width = trgWidth;
    canvas.height = trgHeight;

    var img = new Image;
    img.src = image;
    var ctx = canvas.getContext("2d");

    if (orientation == 2) ctx.transform(-1, 0, 0, 1, trgWidth, 0);
    if (orientation == 3) ctx.transform(-1, 0, 0, -1, trgWidth, trgHeight);
    if (orientation == 4) ctx.transform(1, 0, 0, -1, 0, trgHeight);
    if (orientation == 5) ctx.transform(0, 1, 1, 0, 0, 0);
    if (orientation == 6) ctx.transform(0, 1, -1, 0, trgHeight, 0);
    if (orientation == 7) ctx.transform(0, -1, -1, 0, trgHeight, trgWidth);
    if (orientation == 8) ctx.transform(0, -1, 1, 0, 0, trgWidth);

    ctx.drawImage(img, 0, 0, srcWidth, srcHeight, 0, 0, trgWidth, trgHeight);
    ctx.fill();

    return canvas.toDataURL();
}
