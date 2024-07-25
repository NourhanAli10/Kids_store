// $(document).ready(function() {
//     $('.nav-tab').on('click', function(event) {
//         event.preventDefault();
//         var target = $(this).data('target');
//         var tabContent = $(target);
//         var activeTab = $('.nav-tab.active');
//         var activeContent = $('.tab-pane.show.active');

//         activeTab.removeClass('active');
//         $(this).addClass('active');

//         activeContent.removeClass('show active');
//         tabContent.addClass('show active');

//     });
// });

$(document).ready(function() {
    $('.nav-tab').on('click', function(event) {
        var target = $(this).data('target');
        var route = $(this).data('route');
        var tabContent = $(target);
        var activeTab = $('.nav-tab.active');
        var activeContent = $('.tab-pane.show.active');
        activeTab.removeClass('active');
        $(this).addClass('active');
        activeContent.removeClass('show active');
        tabContent.addClass('show active');
        $.ajax({
            url: route,
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // Iterate over each product in the response
                response.forEach(function(product) {
                    // Clone the first .new-arrival element
                    var $productItem = $('.new-arrival').first().clone();

                    // Populate the cloned .new-arrival element with product data
                    $productItem.find('.product-name').text(product.name);
                    $productItem.find('.product-price').text('EGP ' + product.price);

                    // Append the populated product item to the products container
                    $('#products-container').append($productItem);
                });
            },
            error: function(xhr, status, error) {
                console.error("AJAX request failed:", status, error);
            }
        });

    });



});

document.getElementById('cart-icon').addEventListener('click', function(event) {
    event.preventDefault();
    var cart = document.getElementById('shopping-cart');
    if (cart.style.display === 'none' || cart.style.display === '') {
        cart.style.display = 'block';
    } else {
        cart.style.display = 'none';
    }
});