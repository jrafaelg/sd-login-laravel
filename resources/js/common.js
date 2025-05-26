window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);



// const element = document.getElementById('user-menu1'); // Replace 'myElement'

// element.addEventListener('blur', () => {
//     // Add a CSS class to indicate focus loss
//     element.classList.add('no-focus');

//     // Or directly apply styles
//     element.style.backgroundColor = 'blue'; // Example
// });

// element.addEventListener('focus', () => {
//     // Remove the CSS class or revert styles
//     element.classList.remove('no-focus');
//     element.style.backgroundColor = ''; // Example
// });



// Dropdown menu, show/hide based on menu state.

// Entering: "transition ease-out duration-100"
// From: "transform opacity-0 scale-95"
// To: "transform opacity-100 scale-100"
// Leaving: "transition ease-in duration-75"
// From: "transform opacity-100 scale-100"
// To: "transform opacity-0 scale-95"
// https://tailwindui.com/preview#component-1c0f3b2a4d7e5c8f9a6b
// $(document).ready(function(){
//     $("#toggleButton1").click(function(){
//         $("#user-menu-dropdown").toggleClass("hidden");
//     });
//     $("#toggleButton1").blur(function(){
//         $("#user-menu-dropdown").addClass("hidden");
//     });
// });



//alert('common.js loaded!');