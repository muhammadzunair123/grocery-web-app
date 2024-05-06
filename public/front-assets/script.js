$(document).ready(function () {
    if($('.lightSlider')){
        $(".lightSlider").lightSlider();
    }
});

var searchInput = document.querySelector('#serach-input');
var overlay = document.querySelector('.overlay-one');
var searchDropdown = document.querySelector('.main-search-container-dropdown');
var dropdownContent = document.getElementById('dropdown-content-drop');

document.addEventListener("DOMContentLoaded", function () {
    var dropdownBtn = document.getElementById('dropdown-btn-drop');

    dropdownBtn.addEventListener('click', function () {
        dropdownContent.classList.toggle('show');
    });

    // Close the dropdown menu if the user clicks outside of it
    window.addEventListener('click', function (event) {
        if (!dropdownBtn.contains(event.target) && !dropdownContent.contains(event.target)) {
            dropdownContent.classList.remove('show');
        }
    });
});

function closeMessage() {
    if (document.querySelector('.message-container')) {
        document.querySelector('.message-container').style.transform = 'translateX(-50%) translateY(400%)';
    }
}

function closeDropdown(){
    var dropdownBtn = document.getElementById('dropdown-btn-drop');

    if(dropdownBtn){
        dropdownContent.classList.remove('show');
    }
}



// function openCustomerAddress(){
//     if(document.querySelector('#dev-address-1')){
//         document.querySelector('#dev-address-1').style.display = 'flex';
//     }
// }

function openPopup1() {
    dropdownContent.classList.remove('show');
    if (document.querySelector('.auth-container1')) {
        document.querySelector('.auth-container1').style.opacity = '1';
        document.querySelector('.auth-container1').style.visibility = 'visible';
        document.querySelector('.auth-container1').style.transform = 'scale(1)';
    }
    if (document.querySelector('#main-search-container')) {
        document.querySelector('#main-search-container').style.zIndex = '900';
    }
    if (document.querySelector('.view-cart-container')) {
        document.querySelector('.view-cart-container').style.zIndex = '900';
    }
    if (document.querySelector('.second-navbar-2')) {
        document.querySelector('.second-navbar-2').style.zIndex = '900';
    }
    if (document.querySelector('.third-navbar')) {
        document.querySelector('.third-navbar').style.zIndex = '900';
    }
    if (document.querySelector('.auth-container2')) {
        document.querySelector('.auth-container2').style.opacity = '0';
        document.querySelector('.auth-container2').style.visibility = 'hidden';
        document.querySelector('.auth-container2').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.auth-container3')) {
        document.querySelector('.auth-container3').style.opacity = '0';
        document.querySelector('.auth-container3').style.visibility = 'hidden';
        document.querySelector('.auth-container3').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.auth-container4')) {
        document.querySelector('.auth-container4').style.opacity = '0';
        document.querySelector('.auth-container4').style.visibility = 'hidden';
        document.querySelector('.auth-container4').style.transform = 'scale(0.8)';
    }


    overlay.style.visibility = 'visible'; // Show the overlay when input is focused
    overlay.style.opacity = '1'; // Show the overlay when input is focused
}

function closePopup1() {
    if (document.querySelector('.auth-container1')) {
        document.querySelector('.auth-container1').style.opacity = '0';
        document.querySelector('.auth-container1').style.visibility = 'hidden';
        document.querySelector('.auth-container1').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.view-cart-container')) {
        document.querySelector('.view-cart-container').style.zIndex = '1000';

    } if (document.querySelector('#main-search-container')) {
        document.querySelector('#main-search-container').style.zIndex = '1000';
    }
    if (document.querySelector('.third-navbar')) {
        document.querySelector('.third-navbar').style.zIndex = '1000';
    }
    if (document.querySelector('.second-navbar-2')) {
        document.querySelector('.second-navbar-2').style.zIndex = '1000';
    }

    overlay.style.visibility = 'hidden'; // Hide the overlay when input loses focus
    overlay.style.opacity = '0'; // Hide the overlay when input loses focus
}

function openPopup2() {
    dropdownContent.classList.remove('show');
    if (document.querySelector('.auth-container2')) {
        document.querySelector('.auth-container2').style.opacity = '1';
        document.querySelector('.auth-container2').style.visibility = 'visible';
        document.querySelector('.auth-container2').style.transform = 'scale(1)';

    }
    if (document.querySelector('.second-navbar-2')) {
        document.querySelector('.second-navbar-2').style.zIndex = '900';
    }
    if (document.querySelector('.third-navbar')) {
        document.querySelector('.third-navbar').style.zIndex = '900';
    }
    if (document.querySelector('.auth-container1')) {
        document.querySelector('.auth-container1').style.opacity = '0';
        document.querySelector('.auth-container1').style.visibility = 'hidden';
        document.querySelector('.auth-container1').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.auth-container3')) {
        document.querySelector('.auth-container3').style.opacity = '0';
        document.querySelector('.auth-container3').style.visibility = 'hidden';
        document.querySelector('.auth-container3').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.auth-container4')) {
        document.querySelector('.auth-container4').style.opacity = '0';
        document.querySelector('.auth-container4').style.visibility = 'hidden';
        document.querySelector('.auth-container4').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('#main-search-container')) {
        document.querySelector('#main-search-container').style.zIndex = '900';

    }
    if (document.querySelector('#main-search-container')) {
        document.querySelector('#main-search-container').style.zIndex = '900';

    } if (document.querySelector('#main-search-container')) {
        document.querySelector('#main-search-container').style.zIndex = '900';

    }
    if (document.querySelector('.view-cart-container')) {
        document.querySelector('.view-cart-container').style.zIndex = '900';
    }

    overlay.style.visibility = 'visible'; // Show the overlay when input is focused
    overlay.style.opacity = '1'; // Show the overlay when input is focused
}

function closePopup2() {
    if (document.querySelector('.auth-container2')) {
        document.querySelector('.auth-container2').style.opacity = '0';
        document.querySelector('.auth-container2').style.visibility = 'hidden';
        document.querySelector('.auth-container2').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.third-navbar')) {
        document.querySelector('.third-navbar').style.zIndex = '1000';
    }
    if (document.querySelector('.view-cart-container')) {
        document.querySelector('.view-cart-container').style.zIndex = '1000';
    }
    if (document.querySelector('.second-navbar-2')) {
        document.querySelector('.second-navbar-2').style.zIndex = '1000';
    }
    if (document.querySelector('#main-search-container')) {
        document.querySelector('#main-search-container').style.zIndex = '1000';
    }

    overlay.style.visibility = 'hidden'; // Hide the overlay when input loses focus
    overlay.style.opacity = '0'; // Hide the overlay when input loses focus
}

function openPopup3() {
    dropdownContent.classList.remove('show');
    if (document.querySelector('.auth-container3')) {
        document.querySelector('.auth-container3').style.opacity = '1';
        document.querySelector('.auth-container3').style.visibility = 'visible';
        document.querySelector('.auth-container3').style.transform = 'scale(1)';
    }
    if (document.querySelector('#main-search-container')) {
        document.querySelector('#main-search-container').style.zIndex = '900';
    }
    if (document.querySelector('.view-cart-container')) {
        document.querySelector('.view-cart-container').style.zIndex = '900';
    }
    if (document.querySelector('.second-navbar-2')) {
        document.querySelector('.second-navbar-2').style.zIndex = '900';
    }
    if (document.querySelector('.third-navbar')) {
        document.querySelector('.third-navbar').style.zIndex = '900';
    }
    if (document.querySelector('.auth-container2')) {
        document.querySelector('.auth-container2').style.opacity = '0';
        document.querySelector('.auth-container2').style.visibility = 'hidden';
        document.querySelector('.auth-container2').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.auth-container1')) {
        document.querySelector('.auth-container1').style.opacity = '0';
        document.querySelector('.auth-container1').style.visibility = 'hidden';
        document.querySelector('.auth-container1').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.auth-container4')) {
        document.querySelector('.auth-container4').style.opacity = '0';
        document.querySelector('.auth-container4').style.visibility = 'hidden';
        document.querySelector('.auth-container4').style.transform = 'scale(0.8)';
    }


    overlay.style.visibility = 'visible'; // Show the overlay when input is focused
    overlay.style.opacity = '1'; // Show the overlay when input is focused
}

function closePopup3() {
    if (document.querySelector('.auth-container3')) {
        document.querySelector('.auth-container3').style.opacity = '0';
        document.querySelector('.auth-container3').style.visibility = 'hidden';
        document.querySelector('.auth-container3').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.view-cart-container')) {
        document.querySelector('.view-cart-container').style.zIndex = '1000';

    } if (document.querySelector('#main-search-container')) {
        document.querySelector('#main-search-container').style.zIndex = '1000';
    }
    if (document.querySelector('.third-navbar')) {
        document.querySelector('.third-navbar').style.zIndex = '1000';
    }
    if (document.querySelector('.second-navbar-2')) {
        document.querySelector('.second-navbar-2').style.zIndex = '1000';
    }

    overlay.style.visibility = 'hidden'; // Hide the overlay when input loses focus
    overlay.style.opacity = '0'; // Hide the overlay when input loses focus
}

function openPopup4() {
    dropdownContent.classList.remove('show');
    if (document.querySelector('.auth-container4')) {
        document.querySelector('.auth-container4').style.opacity = '1';
        document.querySelector('.auth-container4').style.visibility = 'visible';
        document.querySelector('.auth-container4').style.transform = 'scale(1)';
    }
    if (document.querySelector('#main-search-container')) {
        document.querySelector('#main-search-container').style.zIndex = '900';
    }
    if (document.querySelector('.view-cart-container')) {
        document.querySelector('.view-cart-container').style.zIndex = '900';
    }
    if (document.querySelector('.second-navbar-2')) {
        document.querySelector('.second-navbar-2').style.zIndex = '900';
    }
    if (document.querySelector('.third-navbar')) {
        document.querySelector('.third-navbar').style.zIndex = '900';
    }
    if (document.querySelector('.auth-container2')) {
        document.querySelector('.auth-container2').style.opacity = '0';
        document.querySelector('.auth-container2').style.visibility = 'hidden';
        document.querySelector('.auth-container2').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.auth-container1')) {
        document.querySelector('.auth-container1').style.opacity = '0';
        document.querySelector('.auth-container1').style.visibility = 'hidden';
        document.querySelector('.auth-container1').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.auth-container3')) {
        document.querySelector('.auth-container3').style.opacity = '0';
        document.querySelector('.auth-container3').style.visibility = 'hidden';
        document.querySelector('.auth-container3').style.transform = 'scale(0.8)';
    }


    overlay.style.visibility = 'visible'; // Show the overlay when input is focused
    overlay.style.opacity = '1'; // Show the overlay when input is focused
}

function closePopup4() {
    if (document.querySelector('.auth-container4')) {
        document.querySelector('.auth-container4').style.opacity = '0';
        document.querySelector('.auth-container4').style.visibility = 'hidden';
        document.querySelector('.auth-container4').style.transform = 'scale(0.8)';
    }
    if (document.querySelector('.view-cart-container')) {
        document.querySelector('.view-cart-container').style.zIndex = '1000';

    } if (document.querySelector('#main-search-container')) {
        document.querySelector('#main-search-container').style.zIndex = '1000';
    }
    if (document.querySelector('.third-navbar')) {
        document.querySelector('.third-navbar').style.zIndex = '1000';
    }
    if (document.querySelector('.second-navbar-2')) {
        document.querySelector('.second-navbar-2').style.zIndex = '1000';
    }

    overlay.style.visibility = 'hidden'; // Hide the overlay when input loses focus
    overlay.style.opacity = '0'; // Hide the overlay when input loses focus
}


document.addEventListener("DOMContentLoaded", function () {
    var links = document.querySelectorAll('.third-navbar a');

    for (var link of links) {
        link.addEventListener('click', clickHandler);
    }

    function clickHandler(e) {
        e.preventDefault();
        var href = this.getAttribute('href');
        var offsetTop = document.querySelector(href).offsetTop;

        scroll({
            top: offsetTop - 140,
            behavior: 'smooth'
        });
    }

    // Function to add active class to the correct anchor tag
    function setActiveLink() {
        var containers = document.querySelectorAll('.container');
        let currentContainer = containers[0];
        for (var container of containers) {
            var rect = container.getBoundingClientRect();
            if (rect.top >= 0 && rect.top <= window.innerHeight) {
                currentContainer = container;
                break;
            }
        }
        var containerId = currentContainer.id;
        links.forEach(link => {
            if (link.getAttribute('href') === '#' + containerId) {
                link.classList.add('active-third');
            } else {
                link.classList.remove('active-third');
            }
        });
    }

    // Listen for scroll events and update active link
    window.addEventListener('scroll', setActiveLink);
    // Set active link on page load
    setActiveLink();
});



var mainImage = document.getElementById("carsoul_main-image");
var images = document.querySelectorAll(".carsoul_product__image");

images.forEach((image) => {
    image.addEventListener("click", (event) => {
        mainImage.src = event.target.src;

        document
            .querySelector(".carsoul_product__image--active")
            .classList.remove("carsoul_product__image--active");

        event.target.classList.add("carsoul_product__image--active");
    });
});


// Add event listener to the search input for focus and blur events
if (searchInput) {
    searchInput.addEventListener('focus', () => {
        overlay.style.visibility = 'visible'; // Show the overlay when input is focused
        overlay.style.opacity = '1'; // Show the overlay when input is focused
    });

    searchInput.addEventListener('blur', () => {
        overlay.style.visibility = 'hidden'; // Hide the overlay when input loses focus
        overlay.style.opacity = '0'; // Hide the overlay when input loses focus
    });

}
var searchInput2 = document.querySelector('#second-search');

if(searchInput2){
    searchInput2.addEventListener('focus', () => {
        overlay.style.visibility = 'visible'; // Show the overlay when input is focused
        overlay.style.opacity = '1'; // Show the overlay when input is focused
        if(document.querySelector('.third-navbar')){
            document.querySelector('.third-navbar').style.zIndex = '800';
        }

    });
}

if(searchInput2){

    searchInput2.addEventListener('blur', () => {
        overlay.style.visibility = 'hidden'; // Hide the overlay when input loses focus
        overlay.style.opacity = '0'; // Hide the overlay when input loses focus
        if(document.querySelector('.third-navbar')){
            document.querySelector('.third-navbar').style.zIndex = '1000';
        }

    });
}


// $('#lightSlider-banner').lightSlider({
//     gallery: true,
//     item: 1,
//     loop: true,
//     slideMargin: 0,
//     thumbItem: 9
// });

// Add event listener for resize event
function openNav() {

    var target = document.getElementById('targetDiv');

    if (target.style.transform === 'translateX(0px)') {
        target.style.transform = 'translateX(600px)';
    } else {
        target.style.transform = 'translateX(0px)';

    }
}



/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementsByClassName("main-container-child-2").style.transform = "translateX(300px)";
}



document.addEventListener('DOMContentLoaded', function () {
    var closeBtns = document.querySelectorAll('.close-btn-pop');
    var openButtons = document.querySelectorAll('.view-btns');
    var cartSideBar = document.querySelector('.main-container-child-2');

    openButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var target = button.getAttribute('data-target');
            var popup = document.getElementById(target);
            var productName = popup.querySelector('#quick-view-product-name');
            var productDescription = popup.querySelector('#quick-view-product-description');
            var productPrice = popup.querySelector('#quick-view-product-price');
            var productImg = popup.querySelector('.quick-view-product-img');

            popup.style.display = 'flex';
            popup.style.zIndex = '10000000000000000000000000'
            // Set product details from data attributes
            productName.textContent = button.getAttribute('data-name');
            productDescription.textContent = button.getAttribute('data-description');
            productPrice.textContent = 'Price: $' + button.getAttribute('data-price');
            productImg.src = button.querySelector('div > img').src; // Get product image source
        });
    });

    closeBtns.forEach(function (closeBtn) {
        closeBtn.addEventListener('click', function () {
            var popup = closeBtn.closest('.popup');
            popup.style.display = 'none';
        });
    });

    // Close the popup when clicking outside of it
    window.addEventListener('click', function (event) {
        if (event.target.classList.contains('popup')) {
            event.target.style.display = 'none';
        }
    });
});
