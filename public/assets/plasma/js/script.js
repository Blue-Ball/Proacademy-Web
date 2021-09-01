//#region document on load
/* Login */
function login(user) {
    setInterval(function () {
        $.get('/login/' + user);
    }, 5 * 60 * 1000);
};
$(() => {
    //#region swiper silder grid 6
    const swiperGrid6Target = document.querySelector('.swiper-container.grid-6');
    if (swiperGrid6Target) {
        var swiperGrid6 = new Swiper('.swiper-container.grid-6', {
            slidesPerView: 1,
            breakpoints: {
                200: {
                    slidesPerView: 1,
                },
                385: {
                    slidesPerView: 2,
                },
                578: {
                    slidesPerView: 3,
                },
                768: {
                    slidesPerView: 4,
                },
                992: {
                    slidesPerView: 5,
                },
                1200: {
                    slidesPerView: 6,
                },
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            speed: 1500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            loop: true
        });
    }
    //#endregion
    //#region swiper silder
    const swiperDefaultTarget = document.querySelector('.swiper-container.default');
    if (swiperDefaultTarget) {
        var swiperDefault = new Swiper('.swiper-container.default', {
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            speed: 1500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            loop: true
        });
    }
    //#endregion
    //#region swiper slider grid 4
    const swiperGrid4Target = document.querySelector('.swiper-container.grid-4');
    if (swiperGrid4Target) {
        var swiperGrid4 = new Swiper('.swiper-container.grid-4', {
            slidesPerView: 1,
            breakpoints: {
                578:{
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 4,
                }
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            speed: 1500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            loop: true
        });
    }
    //#endregion
    //#region swiper silder grid 3
    const swiperGrid3Target = document.querySelector('.swiper-container.grid-3');
    if (swiperGrid3Target) {
        var swiperGrid3 = new Swiper('.swiper-container.grid-3', {
            slidesPerView: 1,
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
                1200: {
                    slidesPerView: 2.75,
                }
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            speed: 1500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            loop: true
        });
    }
    //#endregion
    //#region swiper silder grid 2
    const swiperLiveClassesTarget = document.querySelector('.swiper-container.live-classes');
    if (swiperLiveClassesTarget) {
        var swiperLiveClasses = new Swiper('.swiper-container.live-classes', {
            slidesPerView: 1,
            breakpoints: {
                578: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            speed: 1500,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            loop: true
        });
    }
    //#endregion
    //#region select
    if (jQuery().select2) {
        $('.select').select2({
            minimumResultsForSearch: Infinity
        });
    }
    //#endregion
    //#region responsive tab
    var tabsActions = function (element) {
        this.element = $(element);
        this.setup = function () {
            if (this.element.length <= 0) {
                return;
            }
            this.init();
            // Update after resize window.
            var resizeId = null;
            $(window).resize(function () {
                clearTimeout(resizeId);
                resizeId = setTimeout(() => { this.init() }, 50);
            }.bind(this));
        };
        this.init = function () {
            // Add class to overflow items.
            this.actionOverflowItems();
            var tabs_overflow = this.element.find('.overflow-tab');
            // Build overflow action tab element.
            if (tabs_overflow.length > 0) {
                if (!this.element.find('.overflow-tab-action').length) {
                    var tab_link = $('<a>')
                        .addClass('nav-link')
                        .attr('href', '#')
                        .attr('data-toggle', 'dropdown')
                        .text('...')
                        .on('click', function (e) {
                            e.preventDefault();
                            $(this).parents('.nav.nav-tabs').children('.nav-item.overflow-tab').toggle();
                        });

                    var overflow_tab_action = $('<li>')
                        .addClass('nav-item')
                        .addClass('overflow-tab-action')
                        .append(tab_link);

                    // Add hide to overflow tabs when click on any tab.
                    this.element.find('.nav-link').on('click', function (e) {
                        $(this).parents('.nav.nav-tabs').children('.nav-item.overflow-tab').hide();
                    });
                    this.element.append(overflow_tab_action);
                }

                this.openOverflowDropdown();
            }
            else {
                this.element.find('.overflow-tab-action').remove();
            }
        };

        this.openOverflowDropdown = function () {
            var overflow_sum_height = 0;
            var overflow_first_top = 41;

            this.element.find('.overflow-tab').hide();
            // Calc top position of overflow tabs.
            this.element.find('.overflow-tab').each(function () {
                var overflow_item_height = $(this).height() - 1;
                if (overflow_sum_height === 0) {
                    $(this).css('top', overflow_first_top + 'px');
                    overflow_sum_height += overflow_first_top + overflow_item_height;
                }
                else {
                    $(this).css('top', overflow_sum_height + 'px');
                    overflow_sum_height += overflow_item_height;
                }

            });
        };

        this.actionOverflowItems = function () {
            var tabs_limit = this.element.width() - 100;
            var count = 0;

            // Calc tans width and add class to any tab that is overflow.
            for (var i = 0; i < this.element.children().length; i += 1) {
                var item = $(this.element.children()[i]);
                if (item.hasClass('overflow-tab-action')) {
                    continue;
                }

                count += item.width();
                if (count > tabs_limit) {
                    item.addClass('overflow-tab');
                }
                else if (count < tabs_limit) {
                    item.removeClass('overflow-tab');
                    item.show();
                }
            }
        };
    };
    var tabsAction = new tabsActions('.course-tab .nav-tabs');
    tabsAction.setup();
    //#endregion
    //#region handle support tab nav
    $('.course-tab .nav-item').click((e) => {
        const thisBtn = e.currentTarget;
        if ($(thisBtn).find('a').attr('id') === 'support-tab') {
            $('#course-comments').appendTo('#support');
            $('.course-tab .tab-content').css({
                'height': 'unset',
                'overflow-y': 'visible'
            });
        }
        else if ($('#course-comments-wrapper #course-comments').length === 0) {
            $('#course-comments').appendTo('#course-comments-wrapper');
            $('.course-tab .tab-content').css({
                'height': '397px',
                'overflow-y': 'auto'
            });
        }
    });
    //#endregion
    //#region dashbord menu
    $('.dashbord-sidebar .dashbord-sidebar-menu-item.child-menu').click((e) => {
        const thisBtn = e.currentTarget;
        const btnTarget = $(thisBtn);;
        e.preventDefault();
        if (!btnTarget.hasClass('active')) {
            $('.dashbord-sidebar .dashbord-sidebar-menu-item.child-menu').removeClass('active');
            btnTarget.addClass('active');
            $('ul.dashbord-sidebar-child-menu').slideUp('slow');
        }
        btnTarget.next('ul.dashbord-sidebar-child-menu').slideToggle('slow');
    });
    //#endregion
    //#region chart
    if ($('#chart').length > 0) {
        let months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        var chart1 = new Chart($('#chart'),
            {
                "type": "line",
                "data": {
                    "labels": months,
                    "datasets": [{
                        "data": [45, 78, 36, 48, 22, 70, 30, 80, 32, 90, 24, 65],
                        "borderColor": "#2120b8",
                        "backgroundColor": "rgba(244, 246, 253, 0.5)",
                        "lineTension": 0.5,
                        "pointBackgroundColor": "#2120b8",
                        "pointRadius": 5,
                        "pointBorderColor": "#2120b8"
                    }]
                },
                "options": {
                    legend: {
                        display: false
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                        fillColor: "#f4f6fd",
                        titleFontFamily: "Montserrat",
                        xPadding: 10,
                        yPadding: 10,
                    },
                    title: {
                        display: false,
                    },
                    scales: {
                        pointLabels: {
                            pointLabelFontSize: 30
                        },
                        yAxes: [{
                            ticks: {
                                min: 0,
                                fontSize: 12,
                                fontColor: "#777b96",
                                fontFamily: "Montserrat",
                                stepSize: 20
                            },
                            gridLines: {
                                color: "#e3e9ef",
                                lineWidth: 0.5,
                                zeroLineColor: "#e3e9ef",
                                zeroLineWidth: 1
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 12,
                                fontColor: "#777b96",
                                fontFamily: "Montserrat"
                            },
                            gridLines: {
                                display: false,
                            }
                        }],
                    },
                    responsive: true,
                }
            }
        );
    }
    //#endregion
    //#region boostrap tooltip
    $('[data-toggle="tooltip"]').tooltip();
    //#endregion
    //#region handle dashbord and menu showing
    $('#dashbord-toggle-checkbox').click((e) => {
        $('#menu-toggle-checkbox').prop('checked', false);
    });
    $('#menu-toggle-checkbox').click((e) => {
        $('#dashbord-toggle-checkbox').prop('checked', false);
    });
    //#endregion
    //#region part collapse
    $(document).on('click', '.part-collapse-btn a', (e) => {
        e.preventDefault();
        const thisBtn = e.currentTarget;
        if ($('part-collapse').hasClass('part-collapse-show')) {
            $('part-collapse').removeClass('part-collapse-show');
            $('.part-collapse-content').slideUp('slow');
        }
        $(thisBtn).parent().parent().find('.part-collapse-content').slideToggle('slow')
            .parent().toggleClass('part-collapse-show');
    });
    $(document).on('click', '.quiz-collapse-btn a', (e) => {
        e.preventDefault();
        const thisBtn = e.currentTarget;
        if ($('quiz-collapse').hasClass('quiz-collapse-show')) {
            $('quiz-collapse').removeClass('quiz-collapse-show');
            $('.quiz-collapse-content').slideUp('slow');
        }
        $(thisBtn).parent().parent().find('.quiz-collapse-content').slideToggle('slow')
            .parent().toggleClass('quiz-collapse-show');
    });
    //#endregion
    //#region new part
    $('#new-course-part').on('click', (e) => {
        e.preventDefault();
        $('.part-collapse').find('.custom-form-upload-btn').hide();
        $('.part-collapse').find('form').removeAttr('id');
        $('.part-collapse').find('input').attr('readonly');
        $('.part-collapse').find('.save-part-btn').hide().find('button').removeAttr('id');
        $('.part-collapse').find('input').removeAttr('id');
        $('.part-collapse').find('.custom-form-upload-btn').removeAttr('id').removeAttr('data-input');
        $('.part-collapse').find('.part-collapse-content').removeAttr('style');

        const thisBtn = e.currentTarget;
        var element = $(thisBtn).parent().find('.part-collapse:first-child')
            .clone()
            .hide()
            .removeClass('d-none')
            .appendTo('.dashbord-create-course-tab-content-parts')
            .fadeIn('slow');

        $(element).find('input').val('').removeAttr('readonly');
        $(element).find('.part-collapse-content').css('display','block')
        $(element).find('.custom-form-upload-btn').show();
        $(element).find('form').attr('id','step-5-form-new-part');
        $(element).find('input').removeAttr('readonly');
        $(element).find('.save-part-btn').show().find('button').attr('id','new-part');
        $(element).find('input[name="upload_video"]').attr('id','upload_video');
        $(element).find('.custom-form-upload-btn').attr('id','lfm_upload_video').attr('data-input','upload_video');
        $('#lfm_upload_video').filemanager('file', {prefix: '/user/laravel-filemanager'});
    });
    $('#new-course-quiz').on('click', (e) => {
        e.preventDefault();
        const thisBtn = e.currentTarget;
        $(thisBtn).parent().find('.quiz-collapse:first-child')
            .clone().hide()
            .removeClass('quiz-collapse-show quiz-collapse-active')
            .appendTo('.dashbord-create-course-tab-content-quizzes')
            .fadeIn('slow')
            .find('input').val('');
        setNumber('.dashbord-create-course-tab-content-quizzes', '.quiz');
    });
    //#endregion
    //#region alert
    $('.custom-alert button').click((e) => {
        e.preventDefault();
        const thisBtn = e.currentTarget;
        $(thisBtn).parent().fadeOut('slow');
    });
    //#endregion
    //#region handle dashbord form
    $('#next-step').click((e) => {
        e.preventDefault();
        console.log('called');
        $('.dashbord-create-course-tab-nav .nav-tabs .active').parent().next('li').find('a').trigger('click');
    });
    $('#prev-step').click((e) => {
        e.preventDefault();
        console.log('called');
        $('.dashbord-create-course-tab-nav .nav-tabs .active').parent().prev('li').find('a').trigger('click');
    });
    //#endregion
    //#region handle delete part
    $(document).on('click', '.quiz-delete', (e) => {
        e.preventDefault();
        if ($('.dashbord-create-course-tab-content-quizzes .quiz-collapse').length > 1) {
            const thisBtn = e.currentTarget;
            const target = $(thisBtn).parent().parent().parent();
            target.slideUp('slow', () => {
                target.remove();
                setNumber('.dashbord-create-course-tab-content-quizzes', '.quiz');
            });
        }
    });
    $(document).on('click', '.part-delete', (e) => {
        e.preventDefault();
        if ($('.dashbord-create-course-tab-content-parts .part-collapse').length > 1) {
            const thisBtn = e.currentTarget;
            const target = $(thisBtn).parent().parent().parent();
            target.slideUp('slow', () => {
                target.remove();
                setNumber('.dashbord-create-course-tab-content-parts', '.part');
            });
        }
    });
    //#endregion
    //#region input counter
    $(document).on('change paste keyup keydown keyprees', '.input-counter input', function () {
        let inputValueLength = $(this).val().length;
        let allowChar = $(this).attr('data-allow-char');
        let residueChar = +allowChar - inputValueLength;
        if (residueChar >= 0) {
            $(this).next('span').html(residueChar);
        }
        limitText(this, allowChar);
    });
    //#endregion
    //#region drag
    if (jQuery().dad) {
        $(".dashbord-create-course-tab-content-quizzes").dad({
            draggable: ".quiz-drag",
            placeholderTarget: ".quiz-drag"
        });
        $(".dashbord-create-course-tab-content-parts").dad({
            draggable: ".part-drag",
            placeholderTarget: ".part-drag"
        });
        $('.dashbord-create-course-tab-content-quizzes').on("dadDragEnd", function (e, targetElement) {
            setNumber('.dashbord-create-course-tab-content-quizzes', '.quiz');
        });
        $('.dashbord-create-course-tab-content-parts').on("dadDragEnd", function (e, targetElement) {
            setNumber('.dashbord-create-course-tab-content-parts', '.part');
        });
    }
    //#endregion
});
//#endregion
//#region document on scroll
$(document).scroll(() => {
    const header = $('#header');
    let scroll = $(document).scrollTop();
    if (header.length > 0) {
        //#region fix navbar on scroll
        if (scroll >= 140) {
            $('#header').addClass('fixed-header');
            $('body').css('padding-top', '73px');
        } else {
            $('#header').removeClass('fixed-header');
            $('body').css('padding-top', '0');
        }
    }
    //#endregion
    //#region handle support tab nav on scroll
    const courseTab = $('.course-tab');
    if (courseTab.length > 0) {
        let courseTabOffset = courseTab.offset().top;
        let courseTabHeight = courseTab.height();
        let windowHeight = $(window).height();
        let scrollValue = (courseTabOffset + courseTabHeight) - windowHeight;
        if ($('#course-comments-wrapper #course-comments').length === 0) {
            if (scroll >= scrollValue) {
                $('#course-comments').appendTo('#course-comments-wrapper');
                $('.course-tab .tab-content').css({
                    'height': '397px',
                    'overflow-y': 'auto'
                });
            }
        }
        else {
            if ($('#support-tab.active').length > 0 && scroll <= (courseTabOffset + courseTabHeight)) {
                $('#course-comments').appendTo('#support');
                $('.course-tab .tab-content').css({
                    'height': 'unset',
                    'overflow-y': 'visible'
                });
            }
        }
    }
    //#endregion
});
//#endregion
//#region set number
const setNumber = (selector, type) => {
    $.each($(selector).find(type + '-collapse'), function (i, item) {
        $(item).find(type + '-collapse-btn-couner').html(i + 1)
    });
}
//#endregion
//#region limit input
function limitText(field, maxChar) {
    var ref = $(field),
        val = ref.val();
    if (val.length >= maxChar) {
        ref.val(function () {
            return val.substr(0, maxChar);
        });
    }
}
//#endregion
