$('.child-category').each(function () {
    var parentId = $(this).attr('data-parent');
    console.log(parentId);
    var subCatContent = "<div class='card-body'>" + " <p class='card-text'>"+ $(this) + "</p></div>";
    console.log(subCatContent);
    $(this).insertAfter(".parent-category.cat-"+parentId)
});