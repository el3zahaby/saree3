function basename(path) {
    return path.replace(/\/+$/, "").replace( /.*\//, "" );
}
function animateCSS(element, animationName, displayNone= false, callback) {
    const node = document.querySelector(element)
    node.classList.add('animated', animationName)

    function handleAnimationEnd() {
        node.classList.remove('animated', animationName)
        node.removeEventListener('animationend', handleAnimationEnd)

        if (typeof callback === 'function') callback()
    }
    if (displayNone == true){ node.classList.remove('d-none') }


    node.addEventListener('animationend', handleAnimationEnd)
}



function escapeHtml(html) {
    return html.replace(/</g, "&lt;").replace(/>/g, "&gt;");
}

var GEOoptions = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
};

function GEOsuccess(pos) {
    var crd = pos.coords;

    // console.log('Your current position is:');
    // console.log(`Latitude : ${crd.latitude}`);
    // console.log(`Longitude: ${crd.longitude}`);
    // console.log(`More or less ${crd.accuracy} meters.`);

    maplink(crd.latitude,crd.longitude)
}

function GEOerror(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
}

function maplink(lat, long) {
    send_map('https://maps.google.com/maps?q='+lat+','+long+'&hl=es;z=14&amp;output=embed');
}

animateCSS('body','slideInLeft',true);

$(document).ready(function () {

    var chat_path = window.location.pathname.split("/").pop();
    $('.contact_' + chat_path).addClass("active");

    $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");
    setTimeout(function () {
        $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");
    }, 1000);



    var url = document.head.querySelector('meta[name="url"]').content;
    $('.contact').click(function () {
        window.location.href = url + '/chat/rooms/' + $(this).attr("room");
    });
    var list = [];
    $('.contact').each(function () {
        var element = $(this).attr('element');
        list.push(element);
    });
    var socket = io.connect("http://localhost:5000", {
        query: 'userid=' + userid + '&username=' + '&list=' + list.join(',')
    });

    socket.on('tell_status', function (data) {
        if ($("." + data.element + ' .wrap .contact-status').hasClass('online')) {
            $("." + data.element + ' .wrap .contact-status').removeClass('online');
        }
        if ($("." + data.element + ' .wrap .contact-status').hasClass('away')) {
            $("." + data.element + ' .wrap .contact-status').removeClass('away');
        }
        if ($("." + data.element + ' .wrap .contact-status').hasClass('busy')) {
            $("." + data.element + ' .wrap .contact-status').removeClass('busy');
        }
        $("." + data.element + ' .wrap .contact-status').addClass(data.status);
    });
    socket.on('tell_offline', function (data) {
        if ($("." + data.element + ' .wrap .contact-status').hasClass('online')) {
            $("." + data.element + ' .wrap .contact-status').removeClass('online');
        }
        if ($("." + data.element + ' .wrap .contact-status').hasClass('away')) {
            $("." + data.element + ' .wrap .contact-status').removeClass('away');
        }
        if ($("." + data.element + ' .wrap .contact-status').hasClass('busy')) {
            $("." + data.element + ' .wrap .contact-status').removeClass('busy');
        }
        $("." + data.element + ' .wrap .contact-status').addClass(data.status);
    });
    socket.on('ping_all', function (data) {
        if ($("." + data.element + ' .wrap .contact-status').hasClass('online')) {
            $("." + data.element + ' .wrap .contact-status').removeClass('online');
        }
        if ($("." + data.element + ' .wrap .contact-status').hasClass('away')) {
            $("." + data.element + ' .wrap .contact-status').removeClass('away');
        }
        if ($("." + data.element + ' .wrap .contact-status').hasClass('busy')) {
            $("." + data.element + ' .wrap .contact-status').removeClass('busy');
        }
        if ($("." + data.element + ' .wrap .contact-status').hasClass('offline')) {
            $("." + data.element + ' .wrap .contact-status').removeClass('offline');
        }
        $("." + data.element + ' .wrap .contact-status').addClass(data.status);
    });

    socket.on('connect', function () {
        $('.contact').each(function () {
            var element = $(this).attr('element');
            socket.emit('check_status', {
                element: element
            });
        });
    });

    $("#status-options ul li").click(function () {
        socket.emit('ping_me', {
            status: $(this).attr('status')
        });

    });

    $('.message_form').submit(function (e) {
        e.preventDefault();
        var serial = $(this).serialize();
        var message = escapeHtml($('.message_form input[name="message"]').val());
        var element = $('.message_form input[name="element"]').val();
        var room = $('.message_form input[name="room"]').val();
        if ($('.message_form input[name="message"]').val() != null) {
            if (room_status == 0) {
                $.ajax({
                    url: url + '/messages/add',
                    method: 'POST',
                    data: serial,
                    dataType: 'json',
                    beforeSend: function () {
                        $('.message_form input[name="message"]').val("");
                        $('<li class="replies"><img src="' + $('#profile-img').attr('src') + '" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
                        $('.contact.active .last').html('<span>You: </span>' + message);
                        $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");
                    },
                    success: function (e) {
                        if (e.success == "please try again") {
                            alert("please try again");
                        }
                        if (e.success == "true") {
                            socket.emit('share', {
                                element: element,
                                message: message,
                                room: room,
                                file: 'no',
                            });
                        }
                    },
                    error: function (request, status, error) {
                        console.log(request);
                        console.log(status);
                        console.log(error);
                    }
                });
            }

        }


    });

    socket.on('backshare', function (data) {
        // alert('msg');
        if (data.room == chat_path) {
            if (data.file == 'audio') {
                $('<li class="sent"><img src="' + $('#friend_image').attr('src') + '" alt="" /><p>' +
                    '<audio style="display:block;width:250px;" controls src="' + data.message + '"></audio>'
                    + '</p></li>').appendTo($('.messages ul'));
                $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");
            }else if (data.file == 'image'){
                $('<li class="sent"><img  src="' + $('#friend_image').attr('src') + '" alt="" /><p>' +
                    '<img class="imageChat"   ' +
                    'src="' + filterXSS(data.message) + '"' +
                    'href="' + filterXSS(data.message) + '"' +
                    '' +
                    '' +
                    '>'
                    + '</p></li>').appendTo($('.messages ul'));

            } else if(data.file == 'map'){
                $('<li class="sent"><img  src="' + $('#friend_image').attr('src') + '" alt="" /><p>' +
                    '' +
                    '<iframe src="' +
                    data.message +
                    '' +
                    '"  frameborder="0" style="border:0" class="mapChat" ></iframe>' +
                    '' +
                    + '</p></li>').appendTo($('.messages ul'));
                $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");
            } else if(data.file === 'application'){

                $('<li class="sent"><img  src="' + $('#friend_image').attr('src') + '" alt="" /><p>' +
                    '<a download ' +
                    'href="'+data.message+'"' +
                    'class="btn btn-link "><i class="fas fa-file-alt"></i> '+basename(data.message)+'</a>' +
                    + '</p></li>').appendTo($('.messages ul'));
                $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");




            }else if (data.file == 'color'){
                $('<li class="sent"><img  src="' + $('#friend_image').attr('src') + '" alt="" /><p ' +
                    'style="text-shadow: 1px 1px 17px #000; color: white;background-color: ' + data.message +
                    '">' +
                    'COLOR:' +
                    '' +
                    data.message +
                    '</p></li>').appendTo($('.messages ul'));
                $('#openPicker').modal('hide');
                $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");
            } else if(data.file == 'no' || data.file == undefined) {
                $('<li class="sent"><img src="' + $('#friend_image').attr('src') + '" alt="" /><p>' + data.message + '</p></li>').appendTo($('.messages ul'));
                $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");
            }

            var name = $('.contact[room="' + data.room + '"] .wrap  .meta .name').text();
            $('.contact[room="' + data.room + '"] .last').html('<span>' + name + ': </span>' + data.message);
        } else {
            // console.log(data.room);
            var name = $('.contact[room="' + data.room + '"] .wrap  .meta .name').text();
            $('.contact[room="' + data.room + '"] .last').html('<span>' + name + ': </span>' + data.message);
        }

    });

    $("#block_room").click(function (e) {

        e.preventDefault();
        var room = $(this).attr("room");
        var serial = "_token=" + token;
        $.ajax({
            url: url + '/rooms/block/' + room,
            method: 'GET',
            data: serial,
            dataType: 'json',
            beforeSend: function () {
            },
            success: function (e) {
                if (e.success) {
                    if (e.success == "block") {
                        $('.message_form input[name="message"]').val("Sorry You can't replay to this converstion").css('text-align', 'center').attr('disabled', 'disabled');
                        $("#block_room").text("Unblock");
                        room_status = 1;
                    } else if (e.success == "unblock") {
                        $('.message_form input[name="message"]').val("").css('text-align', 'left').removeAttr('disabled');
                        $("#block_room").text("Block");
                        room_status = 0;
                    }
                    socket.emit('report_block_status', {
                        element: "element_" + e.element,
                        room: room,
                        room_status: room_status,
                    });
                }
            },
            error: function (request, status, error) {
                console.log(request);
                console.log(status);
                console.log(error);
            }
        });
    });
    socket.on('back_report_block_status', function (data) {
        room_status = data.room_status;
        if (data.room_status == 1) {
            $('.message_form input[name="message"]').val("Sorry You can't replay to this converstion").css('text-align', 'center').attr('disabled', 'disabled');
            $("#block_room").css('cursor', 'not-allowed');

        } else {
            $('.message_form input[name="message"]').val("").css('text-align', 'left').removeAttr('disabled');
            $("#block_room").css('cursor', 'pointer');
        }

    });

    $('.voice').click(function () {
        startRecording();
    });
    $('.voice').dblclick(function () {
        stopRecording();
    });


});


$("#profile-img").click(function () {
    $("#status-options").toggleClass("active");
});

$(".expand-button").click(function () {
    $("#profile").toggleClass("expanded");
    $("#contacts").toggleClass("expanded");
});

$("#status-options ul li").click(function () {
    $("#profile-img").removeClass();
    $("#status-online").removeClass("active");
    $("#status-away").removeClass("active");
    $("#status-busy").removeClass("active");
    $("#status-offline").removeClass("active");
    $(this).addClass("active");

    if ($("#status-online").hasClass("active")) {
        $("#profile-img").addClass("online");
    } else if ($("#status-away").hasClass("active")) {
        $("#profile-img").addClass("away");
    } else if ($("#status-busy").hasClass("active")) {
        $("#profile-img").addClass("busy");
    } else if ($("#status-offline").hasClass("active")) {
        $("#profile-img").addClass("offline");
    } else {
        $("#profile-img").removeClass();
    }
    ;

    $("#status-options").removeClass("active");
});

$('.colorPicker').click(function () {
    $('#openPicker').modal();

    // $('.modal-dialog').css('min-width',$('.message_form').width());

    //appending modal background inside the bigform-content
    $('.modal-backdrop').appendTo('.messages');
    //removing body classes to able click events
    $('body').removeClass();
});

$('.attachment').click(function () {
    $('#openFiles').modal();

    // $('.modal-dialog').css('right','111px !important');
    // right:  !important;

    //appending modal background inside the bigform-content
    $('.modal-backdrop').appendTo('.messages');
    //removing body classes to able click events
    $('body').removeClass();
});

function send_map(location) {

     var serial = {"_token":token,"file":'map',"message":location,"room":$('.message_form input[name="room"]').val()};

    $.ajax({
        url:  route['chat.send'],
        method: 'POST',
        data: serial,
        dataType: 'json',
        beforeSend: function () {
            $('<li class="replies"><img  src="' + $('#friend_image').attr('src') + '" alt="" /><p>' +
                '' +
                '<iframe src="' +
                location +
                '' +
                '"  frameborder="0" style="border:0" class="mapChat" ></iframe>' +
                '' +
                + '</p></li>').appendTo($('.messages ul'));
            $('#openFiles').modal('hide');
            $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");
        },
        success: function (e) {
            if (e.success == "please try again") {
                alert("please try again");
            }
            if (e.success == "true") {
                socket.emit('share', {
                    element: $('.message_form input[name="element"]').val(),
                    message: location,
                    room: $('.message_form input[name="room"]').val(),
                    file: 'map',
                });
            }
        },
    });
}

$(document).ready(function () {
    $("#imageCapture,input[name=\"image\"]").on('change', function () {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(this.files[0]);
        oFReader.onload = function (oFREvent) {
            $('<li class="replies"><img  src="' + $('#friend_image').attr('src') + '" alt="" /><p>' +
                '<span class="prog1"></span><img class="imageChat"   ' +
                'href="' + oFREvent.target.result + '" '+
                'src="' + oFREvent.target.result + '">'
                + '</p></li>').appendTo($('.messages ul'));
            $('#openFiles').modal('hide');
            $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");
        };


        var fd = new FormData();
        fd.append('image', this.files[0]);
        fd.append('room', $(this).attr('room'));
        fd.append('_token', token);
        console.log(this.files[0]);

        var path = $.parseJSON($.ajax({
            async: false,
            url: route['chat.upload'],
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
            progress: function (e) {
                if (e.lengthComputable) {
                    var pct = (e.loaded / e.total) * 100;
                    $('.prog1:last').html(pct.toPrecision(3) + '%');

                    console.log(pct.toPrecision(3) + '%');
                } else {
                    console.warn('Content Length not reported!');
                }
            }
        }).responseText);
        console.log(path);

        socket.emit('share', {
            element: $('.message_form input[name="element"]').val(),
            message: path.success,
            room: $('.message_form input[name="room"]').val(),
            file: 'image',
        });

    });


    $("input[name=\"doc\"]").on('change', function () {


        var fd = new FormData();
        fd.append('doc', this.files[0]);
        fd.append('room', $(this).attr('room'));
        fd.append('_token', token);
        console.log(this.files[0]);

        var path = $.parseJSON($.ajax({
            async: false,
            url: route['chat.upload'],
            type: 'post',
            data: fd,
            dataType: 'json',
            contentType: false,
            processData: false,
        }).responseText);
        $('<li class="replies"><img  src="' + $('#friend_image').attr('src') + '" alt="" /><p>' +
            '<a download\n' +
            'href="'+path.success+'"' +
            'class="btn btn-link "><i class="fas fa-file-alt"></i> '+basename(path.success)+'</a>' +
            '</p></li>').appendTo($('.messages ul'));
        $('#openFiles').modal('hide');
        $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");

        socket.emit('share', {
            element: $('.message_form input[name="element"]').val(),
            message: path.success,
            room: $('.message_form input[name="room"]').val(),
            file: 'application',
        });

    });



    $(".showmap").click(function () {
        $(this).after('' +
            '<iframe src="' +
            $(this).data('src') +
            '' +
            '"  frameborder="0" style="border:0" class="mapChat" ></iframe>' +
            '').remove();
    });
});


