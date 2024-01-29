const navLinkEls = document.querySelectorAll('.nav__link');
const windowPathname = window.location.pathname;

navLinkEls.forEach(navLinkEl => {
    if(navLinkEl.href.includes(windowPathname)){
        navLinkEl.classList.add('active');
    }
});


// Function to filter and display table rows based on search input
const tableSearch = () => {
    const input = document.getElementById('SearchInput');
    const filter = input.value.toUpperCase();
    const table = document.querySelector('table');
    const rows = table.getElementsByTagName('tr');

    // Loop through all table rows and hide those that don't match the search query
    for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
        const cells = rows[i].getElementsByTagName('td');
        let found = false; // Flag to indicate if the row matches the search query

        // Loop through the cells in the current row
        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            if (cell) {
                const text = cell.textContent || cell.innerText;
                if (text.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break; // If a match is found, no need to check other cells in the same row
                }
            }
        }
        if (found) {
            rows[i].style.display = '';
        } else {
            rows[i].style.display = 'none';
        }
    }
};
const createSearchInputElement = () => {
    const el = document.createElement('input');
    el.classList.add('SearchInput');
    el.id = 'SearchInput';
    el.placeholder = 'Search by Name';
    return el;
};
const init = () => {
    const SearchBar = document.getElementById('SearchBar');
    SearchBar.appendChild(createSearchInputElement());
    const SearchInput = document.getElementById('SearchInput');
    SearchInput.addEventListener('keyup', () => {
        tableSearch();
    });  
};
init();
