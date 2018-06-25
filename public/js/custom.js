$('.child-category').each(function () {
    var parentId = $(this).attr('data-parent');
    console.log(parentId);
    var subCatContent = "<div class='card-body'>" + " <p class='card-text'>"+ $(this) + "</p></div>";
    console.log(subCatContent);
    $(this).insertAfter(".parent-category.cat-"+parentId)
});

$('.card-header').each(function () {
   $(this).on("click", function () {
       $(this).toggleClass("expanded");
       $(this).siblings($('.child-category')).slideToggle();
   });
});

$('.card-body').each(function () {
    if ($('this').empty()) {
        $(this).hide();
    }
});