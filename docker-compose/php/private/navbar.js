const dropdown_menu = document.getElementById("dropdown-menu");
const dropdown_menu_items = document.getElementById("dropdown-menu-items");

const dropdown_menu_items_a = document.querySelectorAll("#dropdown-menu-items li a")




dropdown_menu.addEventListener('mouseout', function() {
    dropdown_menu_items.style.display = 'none';
});

dropdown_menu.addEventListener('mouseover', function() {
    dropdown_menu_items.style.display = 'inline';
    dropdown_menu_items_a.forEach(anchor => {
        anchor.addEventListener('mouseover', function() {
            this.style.color = 'red';

            this.style.transition = '0.5s';
        });
        
        anchor.addEventListener('mouseout', function() {
            this.style.color = "rgb(8, 217, 207)"; // Reset to default color
            this.style.transition = '0.5s';
        });
    });
});

