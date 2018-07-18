function preview(file, elem, divElem) {
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
page = {
    init: function () {
        var inpElem = $('.form-control-file'),
        divElem = $('.preview');
        inpElem.on("change", function(e) {
            preview(this.files[0],$(this), divElem);
        });

    }
};
window.onload = function () {
    page.init();
};