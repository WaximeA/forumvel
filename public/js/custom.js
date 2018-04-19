$('.child-category').each(function () {
    var parentId = $(this).attr('data-parent');
    console.log(parentId);
    var subCatContent = "<div class='card-body'>" + " <p class='card-text'>" + $(this) + "</p></div>";
    console.log(subCatContent);
    $(this).insertAfter(".parent-category.cat-" + parentId)
});

$('.comment-child').each(function () {
    var parentId = $(this).attr('data-parent');
    console.log(parentId);
    $(this).insertAfter(".comment-parent-" + parentId)
});

$('.card-header').each(function () {
    $(this).on("click", function () {
        $(this).toggleClass("expanded");
        $(this).siblings($('.child-category')).slideToggle();
    });
    if ($(this).siblings($('.child-category')).length) {
        $(this).addClass('card-parent')
    }
});

$("input.btn-submit").on("click", function () {
    $("input.btn-submit").addClass("onclic", 250, validate);
});

function validate() {
    setTimeout(function () {
        $("input.btn-submit").removeClass("onclic");
        $("input.btn-submit").addClass("validate", 450, callback);
    }, 2250);
}

function callback() {
    setTimeout(function () {
        $("input.btn-submit").removeClass("validate");
    }, 1250);
}