"use strict";var searchBtn=document.querySelector(".utility-navigation .collapsible-search__button"),search=document.querySelector(".utility-navigation .collapsible-search__input"),isSearchOpen=function(){return!!search.classList.contains("collapsible-search__input-open")},togglePlaceholder=function(){isSearchOpen()?search.placeholder="Search...":search.placeholder=""},toggleSearch=function(){search.classList.toggle("collapsible-search__input-open"),togglePlaceholder()};searchBtn.addEventListener("click",function(){return toggleSearch()}),document.addEventListener("click",function(e){var c=e.target;do{if(c==search||c==searchBtn)return;c=c.parentNode}while(c);isSearchOpen()&&toggleSearch()});
//# sourceMappingURL=main.js.map

/*//////////////////////////////////*/
/*/ Find Relator Sort Filter Start */
/*/ ///////////////////////////////*/
jQuery(function ($)  {	
	
    $("#btnSortName").on("click", function () {
        $("#ulSuperHeroes").html(
            $("#ulSuperHeroes").children("li").sort(function (a, b) {    
                return $('.employee-card_name', a).text().toUpperCase().localeCompare(    
                $('.employee-card_name', b).text().toUpperCase());   
            }) // End Sort
        ); // End HTML 
	    $('html,body').animate({scrollTop: $("#results").offset().top}, 'slow');
    }); // End Button Sort Name Click


    //Button Sort Company Click
    $("#btnSortCompany").on("click", function () {
        $("#ulSuperHeroes").html(
            $("#ulSuperHeroes").children("li").sort(function (a, b) {    
                 return $('.employee-card_company', a).text().toUpperCase().localeCompare(    
                $('.employee-card_company', b).text().toUpperCase());   
            }) // End Sort
        ); // End HTML 
	    $('html,body').animate({scrollTop: $("#results").offset().top}, 'slow');
    }); // End Button Sort Company Click

     //Button Sort Address Click
    $("#btnSortAddress").on("click", function () {
        $("#ulSuperHeroes").html(
            $("#ulSuperHeroes").children("li").sort(function (a, b) {    
                 return $('.employee-card_city_state', a).text().toUpperCase().localeCompare(    
                $('.employee-card_city_state', b).text().toUpperCase());  
            }) // End Sort
        ); // End HTML 
		$('html,body').animate({scrollTop: $("#results").offset().top}, 'slow');
    }); // End Button Sort Address Click

}); // End Document Ready

/*//////////////////////////////*/
/*/ Find Relator Sort Filter End*/
/*/ ////////////////////////////*/
