$(document).ready(function() {
    current_page = document.location.href
    if (current_page.match(/dashboard/)) 
    {
    $("ul#navigation li:eq(0)").addClass('selected');
    } 
    else if (current_page.match(/inventory/)) 
    {
    $("ul#navigation li:eq(1)").addClass('selected');
    }
    else if (current_page.match(/add_item/)) 
     {
     $("ul#navigation li:eq(2)").addClass('selected');
    } 
    else if (current_page.match(/add_category/)) 
    {
      $("ul#navigation li:eq(3)").addClass('selected');
    } 
    else if (current_page.match(/quoteList/)) 
    {
    $("ul#navigation li:eq(4)").addClass('selected');
    }  
     else if (current_page.match(/add_user/)) 
    {
    $("ul#navigation li:eq(4)").addClass('selected');
    } 

   else { // don't mark any nav links as selected
      $("ul#navigation li").removeClass('selected');
};
});