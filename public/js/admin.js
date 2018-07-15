page = {
    init: function () {
        var inpElem = $('.form-control-file'),
        divElem = $('.preview');
        inpElem.on("change", function(e) {
            preview(this.files[0],$(this) );
        });
        function preview(file, elem) {
            elem.parent().find(divElem).find($('img')).remove();
            if ( file.type.match(/image.*/) ) {
                var reader = new FileReader(), img;
                reader.addEventListener("load", function(event) {
                    img = document.createElement('img');
                    img.src = event.target.result;
                    elem.parent().find(divElem).append(img);
                });
                reader.readAsDataURL(file);
            }
        }

    }
};
window.onload = function () {
    page.init();
};