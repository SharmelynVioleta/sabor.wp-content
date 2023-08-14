/* global twentytwentyoneGetHexLum */

(function () {
    document.addEventListener(
        "DOMContentLoaded", () => {
            new Mmenu("#menu", {
                "offCanvas": {
                    "position": "right-front"
                },
                "theme": "light",
                "navbars": [
                    {
                        "content": [
                            '<a href="' + custom.site_url + '"><img src="' + custom.logo_url + '" alt="' + custom.logo_name + '" width="238" height="40" /></a>',
                            'close'
                        ]
                    },
                    {
                        "position": "top",
                        "content": [
                            '<form action="' + custom.site_url + '" method="get"><input placeholder="Busca una receta ahora" id="searchbox" type="text" name="s" required><button><input type="hidden" name="post_type" value="post"><img src="https://mydemoserver.site/sabor/wp-content/themes/sabor/assets/images/search-icon.svg" alt="Search Icon" width="20" height="20"></button></form>'
                        ]
                    }, {
                        "position": "bottom",
                        "content": [
                            custom.social_icon_url
                        ]
                    }
                ],
            });
        }
    );
}());
jQuery(document).ready(function () {
    jQuery(".search-bar").click(function () {
        jQuery(".search-popup").addClass("active");
        jQuery("html").addClass("search-active");
    });
    jQuery(".search-popup .close-btn").click(function () {
        jQuery(".search-popup").removeClass("active");
        jQuery("html").removeClass("search-active");
    });
    if (window.outerWidth <= 991) {
        jQuery('.col-4 .cards,.col-3 .cards').slick({
            infinite: true,
            arrows: false,
            centerMode: true,
            slidesToShow: 2,
            responsive: [
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false,
                        variableWidth: true,
                    }
                },
            ]
        });
    }
    if (window.outerWidth <= 1199) {
        jQuery('.slider .cards').slick({
            infinite: true,
            arrows: false,
            centerMode: true,
            slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        centerMode: false,
                        variableWidth: true,
                    }
                },
            ]
        });
    }
});