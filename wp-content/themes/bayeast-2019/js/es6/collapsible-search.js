const searchBtn = document.querySelector(
	".utility-navigation .collapsible-search__button"
);
const search = document.querySelector(
	".utility-navigation .collapsible-search__input"
);

var isSearchOpen = () =>
	// I check to see whether or not the search bar is open.
	search.classList.contains("collapsible-search__input-open") ? true : false;

const togglePlaceholder = () => {
	// I toggle the placeholder text depending on whether or not search is open.
	isSearchOpen()
		? (search.placeholder = "Search...")
		: (search.placeholder = "");
};

const toggleSearch = () => {
	// I toggle the search bar on and off, as well as the placeholder text.
	search.classList.toggle("collapsible-search__input-open");
	togglePlaceholder();
};
// This is the event listener on the Font Awesome glyph
searchBtn.addEventListener("click", () => toggleSearch());

// This is out we detect outside clicks to close search:
document.addEventListener("click", event => {
	var targetElement = event.target; // I'm any element that was clicked.
	do {
		/* 
		We're looping through the DOM to make sure we haven't clicked
		the search bar or button, OR a child of the search bar or button,
		in which case, we break out of the function. 
		*/
		if (targetElement == search || targetElement == searchBtn) {
			return;
		}
		targetElement = targetElement.parentNode;
		// It's going to do this as long as targetElement doesn't eval to 'null'.
	} while (targetElement);

	/*
	Now that we've determined the click wasn't on the search bar or button...
	This checks to see if search is open, and if it is, it toggles it. 
	*/
	if (isSearchOpen()) {
		toggleSearch();
	}
});
//Phew...
