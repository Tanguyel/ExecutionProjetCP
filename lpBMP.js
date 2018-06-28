$(".tab_content").hide();
$(".tab_content:first").show();

/* if in tab mode */
$("ul.tabs-list li").click(function() {

    $(".tab_content").hide();
    var activeTab = $(this).attr("rel"); 
    $("#"+activeTab).fadeIn();		

    $("ul.tabs-list li").removeClass("active");
    $(this).addClass("active");

    $(".tab_drawer_heading").removeClass("d_active");
    $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");

});
/* if in drawer mode */
$(".tab_drawer_heading").click(function() {

    $(".tab_content").hide();
    var d_activeTab = $(this).attr("rel"); 
    $("#"+d_activeTab).fadeIn();

    $(".tab_drawer_heading").removeClass("d_active");
    $(this).addClass("d_active");

    $("ul.tabs-list li").removeClass("active");
    $("ul.tabs-list li[rel^='"+d_activeTab+"']").addClass("active");
});


/* Extra class "tab_last" 
	   to add border to right side
	   of last tab */
$('ul.tabs-list li').last().addClass("tab_last");



$(".accordion-item .accordion-heading").click(function(e) {
    e.preventDefault();

    // Add the correct active class
    if($(this).closest(".accordion-item").hasClass("active")) {
        // Remove active classes
        $(".accordion-item").removeClass("active");
    } else {
        // Remove active classes
        $(".accordion-item").removeClass("active");

        // Add the active class
        $(this).closest(".accordion-item").addClass("active");
    }

    // Show the content
    var $content = $(this).next();
    $content.slideToggle(300);
    $(".accordion-item .accordion-content").not($content).slideUp(300);
});


