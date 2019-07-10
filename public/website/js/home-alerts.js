(function($) {
    $('body').xmalert({ 
        x: 'right',
        y: 'bottom',
        xOffset: 30,
        yOffset: 30,
        alertSpacing: 40,
        fadeDelay: 0.3,
        autoClose: false,
        template: 'survey',
        title: 'مرحباً بك على منصة سريع',
        paragraph: 'منصة سريع هي أكبر منصة عربية للمنتجات التقنية و الخدماتا الإلكترونية و العديد من الخدمات المميزة ',
        timestamp: '',
        imgSrc: 'website/images/dashboard/alert-logo.png',
        buttonSrc: [ 'alerts-notifications.html' ],
        buttonText: ' تفقد خدماتنا <span class="primary"> الان </span>',
    });
})(jQuery);