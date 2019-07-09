// $(document).ready(function () {
//webkitURL is deprecated but nevertheless
URL = window.URL || window.webkitURL;

var gumStream; 						//stream from getUserMedia()
var rec; 							//Recorder.js object
var input; 							//MediaStreamAudioSourceNode we'll be recording

// shim for AudioContext when it's not avb. 
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext //audio context to help us record

var recordButton = document.getElementById("recordButton");
var stopButton = document.getElementById("stopButton");

//add events to those 2 buttons
recordButton.addEventListener("click", startRecording);
stopButton.addEventListener("click", stopRecording);


function startRecording() {
    console.log("recordButton clicked");

    $('#recordButton').addClass('d-none');
    $('#stopButton').removeClass('d-none');


    /*
        Simple constraints object, for more advanced audio features see
        https://addpipe.com/blog/audio-constraints-getusermedia/
    */

    var constraints = {audio: true, video: false}

    /*
       Disable the record button until we get a success or fail from getUserMedia()
   */

    recordButton.disabled = true;
    stopButton.disabled = false;

    /*
        We're using the standard promise based getUserMedia()
        https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
    */

    navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
        console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

        /*
            create an audio context after getUserMedia is called
            sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
            the sampleRate defaults to the one set in your OS for your playback device

        */
        audioContext = new AudioContext();

        //update the format
        document.getElementById("formats").innerHTML = "Format: 1 channel pcm @ " + audioContext.sampleRate / 1000 + "kHz"

        /*  assign to gumStream for later use  */
        gumStream = stream;

        /* use the stream */
        input = audioContext.createMediaStreamSource(stream);

        /*
            Create the Recorder object and configure to record mono sound (1 channel)
            Recording 2 channels  will double the file size
        */
        rec = new Recorder(input, {numChannels: 1})

        //start the recording process
        rec.record()

        console.log("Recording started");

    }).catch(function (err) {
        //enable the record button if getUserMedia() fails
        recordButton.disabled = false;
        stopButton.disabled = true;

    });
}

function pauseRecording() {
    console.log("pauseButton clicked rec.recording=", rec.recording);
    if (rec.recording) {
        //pause
        rec.stop();
        pauseButton.innerHTML = "Resume";
    } else {
        //resume
        rec.record()
        pauseButton.innerHTML = "Pause";

    }
}

function stopRecording() {
    console.log("stopButton clicked");

    $('#recordButton').removeClass('d-none');
    $('#stopButton').addClass('d-none');

    //disable the stop button, enable the record too allow for new recordings
    stopButton.disabled = true;
    recordButton.disabled = false;


    //reset button just in case the recording is stopped while paused


    //tell the recorder to stop the recording
    rec.stop();

    //stop microphone access
    gumStream.getAudioTracks()[0].stop();

    //create the wav blob and pass it on to createDownloadLink
    rec.exportWAV(createDownloadLink);
}

function createDownloadLink(blob) {
    var url_site = document.head.querySelector('meta[name="url"]').content;
    var token = document.head.querySelector('meta[name="csrf-token"]').content;
    var filename = new Date().toISOString();
    var url = URL.createObjectURL(blob);
    var room = $('.message_form input[name="room"]').val();
    $('.message_form input[name="message"]').val("");
    $('<li class="replies"><img src="' + $('#profile-img').attr('src') + '" alt="" /><p>' + '<span class="prog1"></span><audio style="display:block;width:250px;" controls src="' + url + '"></audio>' + '</p></li>').appendTo($('.messages ul'));
    $('.contact.active .last').html('<span>You: </span>' + "file");
    $(".messages").animate({scrollTop: $('.messages')[0].scrollHeight}, "fast");


    var fd = new FormData();
    fd.append("audio_data", blob, filename);
    fd.append("_token", token);
    fd.append("room", room);

    var path = $.parseJSON($.ajax({
        type: 'POST',
        async: false,
        url: url_site + '/rooms/voices/upload',
        dataType: 'json',
        processData: false,
        contentType: false,
        data: fd,
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

    socket.emit('share', {
        element: $('.message_form input[name="element"]').val(),
        message: path.success,
        room: room,
        file: 'audio',
    });

}

function useReturnData(data){
    myvar = data;
     return myvar
};

// });
