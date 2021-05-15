import Masonry from 'masonry-layout';

function Menu() {

    const $masthead = $(".main-header"),
        $burger = $(".burger"),
        $mobileNav = $(".mobile-navigation");

    $('a[href="#"]').on('click', (e) => {
        e.preventDefault();
    });

    $burger.on("click", (e) => {
        const $this = $(e.currentTarget);

        $this.toggleClass("active");

        if ($this.hasClass("active")) {
            $mobileNav.addClass("active");
        } else {
            $mobileNav.removeClass('active');
            $mobileNav.removeClass('sub-open');
            $masthead.removeClass("active");
            $mobileNav.find('ul').removeClass('current active');
        }
    });

    $mobileNav.find('.menu-item-has-children').on('click', (e) => {
        e.stopPropagation();
        $mobileNav.addClass('sub-open');
        $mobileNav.scrollTop(0);
        $mobileNav.find('ul').scrollTop(0);
        $mobileNav.find('ul').removeClass('current');
        $(e.currentTarget).children('ul').addClass('active current');
    });


    $mobileNav.find('.menu-item-has-children > ul').prepend('<li class="menu-back"><a href="#">Back</a></li>');

    $mobileNav.find('.menu-back').on('click', (e) => {
        e.stopPropagation();

        const $this = $(e.currentTarget);

        if($this.parent().parent().parent().hasClass('menu')) {
            $mobileNav.removeClass('sub-open');
            $mobileNav.find('ul').removeClass('current');
            $this.parent().removeClass('active');
        } else {
            $this.parent().parent().parent().addClass('current');
            $this.parent().removeClass('active current');
        }
    });


    const menuGrid = document.querySelector('.main-header__nav--secondary').querySelector('.sub-menu-0');
    const msnry = new Masonry( menuGrid, {
        horizontalOrder: true
    } );
    msnry.layout();
  
    msnry.on( 'layoutComplete', () => {
        menuGrid.classList.add('layout-complete');
    });


    function menuItemStates($this, type) {

        if(type === 'leave') {
            $this.removeClass('active');
            $this.find('li').removeClass('active');
        } else {
            if (!$this.closest('li').hasClass('active')) {
                //$this.closest('li').addClass('active');
                $('.menu-item-has-children').not('.pop-out-nav').removeClass('active');
                $this.parents('li').addClass('active');
                $this.addClass('active');
            } else {
                if (type === 'click') {
                    $this.removeClass('active');
                    $this.find('li').removeClass('active');
                    menuGrid.classList.remove('layout-complete');
                }
            }
        }

        if($('.masthead .menu-item-has-children.active').length) {
            $masthead.addClass('active-hovered');
        } else {
            $masthead.removeClass('active-hovered');
        }
    }


    // $masthead.find('.menu-item-has-children').not('.pop-out-nav').on('mouseenter', (e) => {
    //     //const $this = $(e.currentTarget)
    //     menuItemStates($(e.currentTarget), 'enter');
    //     msnry.layout();
    // });

    // $masthead.find('.menu-item-has-children').not('.pop-out-nav').on('mouseleave', (e) => {
    //     menuItemStates($(e.currentTarget), 'leave');
    // });
    

    $masthead.find('.menu-item-has-children').on('click', (e) => {
        e.stopPropagation();
        //const $this = $(e.currentTarget)
        menuItemStates($(e.currentTarget), 'click');

    });

    $masthead.find('.menu-item-has-children').on('click', (e) => {
        e.preventDefault();
    });

    const body = document.querySelector('body');
    const searchTrigger = document.querySelector('.search-trigger');
    const searchForm = document.querySelector('.search-form-wrap');


    searchTrigger.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();

        if(!searchForm.classList.contains('active')) {
            searchForm.classList.add('active');
        } else {
            searchForm.classList.remove('active');
        }
  
    });

    searchForm.addEventListener('click', (e) => {
        e.stopPropagation();
    });

    const popOutNavs = document.querySelectorAll('.pop-out-nav');

    popOutNavs.forEach((el) => {

        // first level pop outs
        const megaInner = el.querySelector('.mega-inner');
        const itemChildren = el.childNodes;

        const closeButton = '<div class="close-button"><span>Close</span><span class="close-cross"></span></div>';
        const closeButtonFirst = `<div class="flex-1"><span class="text-secondary font-bold text-sm">${itemChildren[0].textContent}</span></div>${closeButton}`;

        const megaTopBar = document.createElement('div');

        megaTopBar.classList.add('mega-top-bar');

        megaTopBar.innerHTML = closeButtonFirst;

        megaInner.prepend(megaTopBar);

        megaInner.addEventListener('click', (e) => {
            e.stopPropagation();
        });

        const closeNav = megaInner.querySelector('.close-button');

        closeNav.addEventListener('click', (e) => {
            e.currentTarget.closest('.pop-out-nav').classList.remove('active');
            document.querySelectorAll('.sub-menu-1').forEach(el => el.classList.remove('active'));
            el.querySelectorAll('.offers-expander, .expander-btn').forEach(el => el.classList.remove('active'));
        });

        const itemHasChildren = el.querySelectorAll('.menu-item-has-children');

        itemHasChildren.forEach((item) => {
            item.addEventListener('click', (e) => {
            
                for (let child of e.currentTarget.children) {
                    if(child.classList.contains('sub-menu-1')) {
                        if(!child.classList.contains('active')) {
                            document.querySelectorAll('.sub-menu-1').forEach(el => el.classList.remove('active'));
                            child.classList.add('active');
                        } else {
                            child.classList.remove('active');
                        }
                    }
                }
            });
        });
     


        // Sub navigation
        const subNavOne = el.querySelectorAll('.sub-menu-1');


        subNavOne.forEach((el) => {

            el.querySelectorAll('li').forEach(el => el.addEventListener('click', e => e.stopPropagation()));    

            const closeLi = document.createElement('li');

            el.prepend(closeLi);
        
            closeLi.classList.add('close-sub-nav');
    
            closeLi.innerHTML = closeButton;

            const closeSubNav = el.querySelector('.close-button');

            closeSubNav.addEventListener('click', (e) => {
                e.stopPropagation();
                e.currentTarget.closest('.sub-menu-1').classList.remove('active');
            });
    
        });


        const offers = el.querySelectorAll('.offers-expander');

        offers.forEach((offer) => {
            const subMenu = offer.parentNode.querySelector('.sub-menu-1');

            const offerListItem = document.createElement('li');
            offerListItem.classList.add('nav-item-offers');
            offerListItem.prepend(offer);

            subMenu.prepend(offerListItem);

            offerListItem.addEventListener('click', e => e.stopPropagation());

        });
       
    });


    const featurePages = document.querySelectorAll('.menu-feature-pages');

    featurePages.forEach((page) => {
        const subMenu = page.parentNode.querySelector('.mega-inner');

        subMenu.prepend(page);

        page.addEventListener('click', e => e.stopPropagation());

    });


  
    body.addEventListener('click', () => {
        searchForm.classList.remove('active');

        popOutNavs.forEach((el) => el.classList.remove('active'));
    });

}

export default Menu;
