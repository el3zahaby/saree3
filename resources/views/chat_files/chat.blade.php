@include('chat_files.header')
<div class="body">
    <div class="frame" id="app">
        <div id="sidepanel">
            <div id="profile">
                <div class="wrap">

                    <img id="profile-img" src="/images/avatars/{{Auth::user()->image}}" class="online" alt="">

                    <p>{{Auth::user()->name}}</p>

                    <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
{{--                    <div id="status-options">--}}
{{--                        <ul>--}}
{{--                            <li id="status-online" class="active" status="online"><span class="status-circle"></span>--}}
{{--                                <p>Online</p></li>--}}
{{--                            <li id="status-away" status="away"><span class="status-circle"></span>--}}
{{--                                <p>Away</p></li>--}}
{{--                            <li id="status-busy" status="busy"><span class="status-circle"></span>--}}
{{--                                <p>Busy</p></li>--}}
{{--                            <li id="status-offline" status="offline"><span class="status-circle"></span>--}}
{{--                                <p>Offline</p></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                    <div id="expanded">
                        <label for="twitter"><i class="fab fa-facebook fa-fw" aria-hidden="true"></i></label>
                        <input name="twitter" type="text" value="mikeross">
                        <label for="twitter"><i class="fab fa-twitter fa-fw" aria-hidden="true"></i></label>
                        <input name="twitter" type="text" value="ross81">
                        <label for="twitter"><i class="fab fa-instagram fa-fw" aria-hidden="true"></i></label>
                        <input name="twitter" type="text" value="mike.ross">
                    </div>
                </div>
            </div>
            <div id="search">
                <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
                <input type="text" placeholder="Search contacts...">
            </div>

            <div id="contacts" class="">
                <ul>
                    @foreach($friends as $friend)
                        @if($friend->parent == Auth::user()->id)

                            <li class="contact element_{{$friend->get_user_info_child->id}}"
                                element="element_{{$friend->get_user_info_child->id}}" room="{{$friend->id}}">
                                <div class="wrap ">
                                    <span class="contact-status offline"></span>
                                    <img src="/images/avatars/{{$friend->get_user_info_child->image}}" alt="">
                                    <div class="meta">
                                        <p class="name">{{$friend->get_user_info_child->name}}</p>
                                        <p class="preview">{{'jop title'}}</p>
                                        <p class="preview last">{{$friend->get_last_message_by_type() ?? ""}}</p>
                                    </div>
                                </div>
                            </li>
                        @else

                            <li class="contact element_{{$friend->get_user_info_parent->id}} "
                                element="element_{{$friend->get_user_info_parent->id}}"
                                room="{{$friend->id}}">

                                <div class="wrap">
                                    <span class="contact-status offline"></span>
                                    <img src="/images/avatars/{{ $friend->get_user_info_parent->image }}" alt="">
                                    <div class="meta">
                                        <p class="name">{{$friend->get_user_info_parent->name}}</p>
                                        <p class="preview">{{'jop title'}}</p>
                                        <p class="preview last">{{$friend->get_last_message_by_type() ?? ""}}</p>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach


                </ul>
            </div>
{{--            <div id="bottom-bar">--}}
{{--                <button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i>--}}
{{--                    <span>Add contact</span></button>--}}
{{--                <button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Settings</span></button>--}}
{{--            </div>--}}
        </div>

        <div class="content">
            <div class="contact-profile">
                @if($room->parent == Auth::user()->id)
                    <img id="friend_image" src="/images/avatars/{{$room->get_user_info_child->image}}" alt="">
                    <p>{{$room->get_user_info_child->name}} <span class="jobtitle">( {{'jop title'}} )</span></p>
                @else
                    <img id="friend_image" src="/images/avatars/{{ $room->get_user_info_parent->image}}" alt="">
                    <p>{{$room->get_user_info_parent->name}} <span class="jobtitle">( {{'jop title'}} )</span></p>
                @endif


                <div class="social-media">
                    <div class="actions">
                        <div class="dropdown">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Actions
                            </button>
                            <div class="dropdown-menu">
                                @if($room->parentblock == 1 && $room->parent == Auth::user()->id)
                                    <a class="dropdown-item" room="{{$room->id}}" id="block_room">Unblock</a>
                                @elseif($room->parentblock == 0 && $room->parent == Auth::user()->id && $room->childblock == 0)
                                    <a class="dropdown-item" room="{{$room->id}}" id="block_room">Block</a>
                                @elseif($room->childblock == 1 && $room->child == Auth::user()->id)
                                    <a class="dropdown-item" room="{{$room->id}}" id="block_room">Unblock</a>
                                @elseif($room->childblock == 0 && $room->child == Auth::user()->id && $room->parentblock == 0)
                                    <a room="{{$room->id}}" id="block_room" class="dropdown-item">Block</a>
                                @else
                                    <a class="dropdown-item" room="{{$room->id}}" id="block_room"
                                       style="cursor:not-allowed;">Block</a></li>
                                @endif
                            </div>
                        </div>
                    </div>


                </div>

                <div class="clear"></div>
            </div>
            <div class="messages">

                <ul>
                    @foreach($rooms_messages as $message)
                        <li class="@if($message->parent == Auth::user()->id) replies @else sent @endif"><img
                                    src="/images/avatars/{{ $message->get_user->image }}" alt="">
                            @if($message->file == 'audio')
                                <p>
                                    <span class="prog1"></span>
                                    <audio style="display:block;width:250px;" controls
                                           src="{{ $message->message}}"></audio>
                                </p>
                                @elseif($message->file == 'image')
                                <p>
                                    <img href="{{$message->message}}" class="imageChat" src="{{$message->message}}"
                                         style="display:block;width:250px;"/>
                                </p>
                                @elseif($message->file == 'map')
                                <p>
                                    <button data-src="{{$message->message}}"
                                            href="{{$message->message}}"
                                            class="btn btn-link showmap">Show Map</button>
                                </p>
                                @elseif($message->file == 'application')
                                <p>
                                    <a download
                                            href="{{$message->message}}"
                                            class="btn btn-link "><i class="fas fa-file-alt"></i> {{ basename($message->message) }}</a>
                                </p>
                                @elseif($message->file == 'color')
                                <p style="text-shadow: 1px 1px 17px #000; color: white;background-color: {{$message->message}}">
                                COLOR: {{$message->message}}
                                </p>
                                @elseif($message->file == null)
                                <p>
                                    {{$message->message}}
                                </p>
                                @endif

                        </li>
                    @endforeach

                </ul>

            </div>

            <script>
                        @if($room->parentblock == 1 || $room->childblock == 1)
                        {{$i = 1}}
                        @else
                        {{$i = 0}}
                        @endif
                var room_status = "{{$i}}";
            </script>
            @if($room->parent == Auth::user()->id)

                @if($room->parentblock == 1 || $room->childblock == 1)
                    <form class="message_form">
                        <div class="message-input">
                            <div class="wrap bg-white">
                                {{csrf_field()}}
                                <input type="hidden" name="element" value="element_{{$room->get_user_info_child->id}}">
                                <input type="hidden" name="room" value="{{$room->id}}">
                                <input type="text" name="message" dir="auto" placeholder="Write your message..."
                                       required disabled
                                       value="Sorry You can't replay to this converstion" style="text-align:center">
                                <i id="recordButton" class="fas fa-microphone voice"></i>
                                <i id="stopButton" class="fas fa-microphone voice red"></i>
                                <i class="fas fa-paperclip attachment"></i>
                                <i class="fas fa-eye-dropper colorPicker"></i>

                                <button class="submit"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                @else
                    <form class="message_form">
                        <div class="message-input">
                            <div class="wrap bg-white">
                                {{csrf_field()}}
                                <input type="hidden" name="element" value="element_{{$room->get_user_info_child->id}}">
                                <input type="hidden" name="room" value="{{$room->id}}">
                                <input type="text" name="message" dir="auto" placeholder="Write your message..."
                                       required>
                                <i id="recordButton" class="fas fa-microphone voice"></i>
                                <i id="stopButton" class="fas fa-circle d-none text-danger Blink"></i>
                                <i class="fas fa-paperclip attachment"></i>
                                <i class="fas fa-eye-dropper colorPicker"></i>
                                <button class="submit"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                @endif

            @else
                @if($room->parentblock == 1 || $room->childblock == 1)
                    <form class="message_form">
                        <div class="message-input">
                            <div class="wrap bg-white">
                                {{csrf_field()}}
                                <input type="hidden" name="element" value="element_{{$room->get_user_info_parent->id}}">
                                <input type="hidden" name="room" value="{{$room->id}}">
                                <input type="text" name="message" dir="auto" placeholder="Write your message..."
                                       required disabled
                                       value="Sorry You can't replay to this converstion" style="text-align:center">

                                <button class="submit"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                @else
                    <form class="message_form">
                        <div class="message-input">
                            <div class="wrap bg-white">
                                {{csrf_field()}}
                                <input type="hidden" name="element" value="element_{{$room->get_user_info_parent->id}}">
                                <input type="hidden" name="room" value="{{$room->id}}">
                                <input type="text" name="message" dir="auto" placeholder="Write your message..."
                                       required>
                                <i id="recordButton" class="fas fa-microphone voice"></i>
                                <i id="stopButton" class="fas fa-circle d-none text-danger Blink"></i>
                                <i class="fas fa-paperclip attachment"></i>
                                <i class="fas fa-eye-dropper colorPicker"></i>
                                <button class="submit"><i class="fas fa-paper-plane" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                @endif


            @endif


        </div>
    </div>
</div>

<div class="d-none">
    <div id="formats">Format: start recording to see sample rate</div>
    <h3>Recordings</h3>
    <ol id="recordingsList"></ol>
</div>

<!-- Modal attachment -->
<div class="modal fade" id="openFiles" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog animated fadeInUp col"
         style="position:fixed;min-width: 79%;right: 0;left: auto;/* height: fit-content; */bottom:0;top: calc(100% - 240px);">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col text-center p-2">
                            <input room="{{ $room->id }}"
                                   style="position: absolute;cursor: pointer; top: 0; left: 0; width: 100%; height: 100%; opacity: 0;"
                                   type="file" name="image" accept="image/*,video/mp4,video/3gpp,video/quicktime">
                            <svg  xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 53 53"
                                 enable-background="new 0 0 53 53" width="53" style="height:-webkit-fill-available; ">
                                <filter height="130%" id="image-dropshadow">
                                    <feOffset dy="2" result="offsetblur"></feOffset>
                                    <feComponentTransfer>
                                        <feFuncA slope=".08" type="linear"></feFuncA>
                                    </feComponentTransfer>
                                    <feMerge>
                                        <feMergeNode></feMergeNode>
                                        <feMergeNode in="SourceGraphic"></feMergeNode>
                                    </feMerge>
                                </filter>
                                <defs>
                                    <circle id="image-SVGID_1_" cx="26.5" cy="26.5" r="25.5"></circle>
                                </defs>
                                <clipPath id="image-SVGID_2_">
                                    <use xlink:href="#image-SVGID_1_" overflow="visible"></use>
                                </clipPath>
                                <g clip-path="url(#image-SVGID_2_)">
                                    <path fill="#8333A3"
                                          d="M54.1 23.5H35.3v-2.4c0-1-.8-1.8-1.8-1.8H19.2c-.9 0-1.7.8-1.7 1.8v10.7c0 1 .8 1.8 1.8 1.8h14.2c.4 0 .8-.2 1.2-.4L42 48.8c6.7-3.6 12.1-13.2 12.1-25.3z"></path>
                                    <path fill="#702A8C"
                                          d="M33.6 33.6l-7-.1-10.6 18c4.4 2.4 17 4.5 27-2.6l-8.3-15.7c-.3.3-.7.4-1.1.4z"></path>
                                    <path fill="#9A37A3"
                                          d="M19.3 33.6c-1 0-1.8-.8-1.8-1.8l.1-1.5-18.7-.3c1.5 9.4 8.9 18.6 17.5 22l10.7-18.4h-7.8z"></path>
                                    <path fill="#CE64DE"
                                          d="M17.6 21.2c0-.9 1.1-1.7 2-1.8L11.7 4.2C6.4 7.1-.8 12.9-1.1 30.8l18.7-.1v-9.5z"></path>
                                    <path fill="#BF59CF"
                                          d="M19.3 19.4l9.5.4 9.8-17.3C33.3-.7 21.4-3 10.7 4.6l8.6 14.8z"></path>
                                    <path fill="#AC44CF"
                                          d="M38.5 1.8L28.4 19.4h5.2c1 0 1.8.8 1.8 1.8l-.4 2.7 19.1-.1c-1-9.2-7.6-18.1-15.6-22z"></path>
                                </g>
                                <path fill="#F5F5F5" filter="url(#image-dropshadow)"
                                      d="M33.9 33.9H19.1c-1 0-1.9-.8-1.9-1.9V21c0-1 .8-1.9 1.9-1.9h14.8c1 0 1.9.8 1.9 1.9v11c-.1 1.1-.9 1.9-1.9 1.9zm-2.2-12c-1 0-1.8.8-1.8 1.8s.8 1.8 1.8 1.8 1.8-.8 1.8-1.8-.8-1.8-1.8-1.8zm1.9 8L28.9 27l-2.4 1.2-4.7-3.5-2.4 2.3v4.7h14.2v-1.8z"></path>
                            </svg>
                        </div>
                        <div class="col p-2 text-center rounded" >
                            <input type="file"
                                   id="imageCapture" name="imageCapture" room="{{ $room->id }}"
                                   capture
                                   style="position: absolute;cursor: pointer; top: 0; left: 0; width: 100%; height: 100%; opacity: 0;"
                                   accept="image/*,video/*" />
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 53 53" enable-background="new 0 0 53 53" width="53" style=" height: -webkit-fill-available; "><filter height="130%" id="camera-dropshadow"><feOffset dy="2" result="offsetblur"></feOffset><feComponentTransfer><feFuncA slope=".08" type="linear"></feFuncA></feComponentTransfer><feMerge><feMergeNode></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter><defs><circle id="camera-SVGID_1_" cx="26.5" cy="26.5" r="25.5"></circle></defs><clipPath id="camera-SVGID_2_"><use xlink:href="#camera-SVGID_1_" overflow="visible"></use></clipPath><g clip-path="url(#camera-SVGID_2_)"><path fill="#4E5DA9" d="M33.7 33.7l-6.9-.3-11.9 18.4c5.9 3.6 19.8 4.4 28.8-3.2L35 32.8c-.3.2-.8.9-1.3.9z"></path><path fill="#92C654" d="M19.2 33.7c-1 0-1.8-.8-1.8-1.8v-1.6l-19-.5c.1 12 8.7 20 17.4 23.5l11.3-19.5h-7.9z"></path><path fill="#FEC226" d="M17.4 21.1c0-.9 1-1.8 1.9-1.9L10.9 4.1C4.2 7.1-1.8 16.9-1.7 30.9h19.1v-9.8z"></path><path fill="#F47B34" d="M19.2 19.3l9.2.4L39.6 1.8C36.4-.7 20.9-4.6 10.1 3.4l9.1 15.9z"></path><path fill="#DE5144" d="M39 .8L28.4 19.3h5.3c1 0 1.8.8 1.8 1.8l-.3 3.1h19.5C54.2 12.6 47.2 4.8 39 .8z"></path><path fill="#5D84C3" d="M54.7 23.5H35.5v-2.4c0-1-.8-1.8-1.8-1.8H19.1c-.9 0-1.7.8-1.7 1.8V32c0 1 .8 1.8 1.8 1.8h14.5c.4 0 .8-.2 1.2-.4l8.4 15.7c11.5-8.2 11.5-24.5 11.4-25.6z"></path></g><path fill="#F5F5F5" filter="url(#camera-dropshadow)" d="M33.8 34H18c-.9 0-1.6-.7-1.6-1.6v-11c0-.3.2-.7.4-.9l2.2-2.4c.2-.2.6-.4.9-.4h2.6c.3 0 .7.2.9.4l1.4 1.5h9c.9 0 1.6.7 1.6 1.6v11.2c0 .9-.7 1.6-1.6 1.6zm-7.9-11.9c-2.6 0-4.7 2.1-4.7 4.7s2.1 4.7 4.7 4.7 4.7-2.1 4.7-4.7-2.1-4.7-4.7-4.7zm0 8c-1.8 0-3.3-1.5-3.3-3.3s1.5-3.3 3.3-3.3 3.3 1.5 3.3 3.3-1.5 3.3-3.3 3.3z"></path></svg>
                        </div>
                        <div class="col p-2 text-center rounded">
                            <input type="file"
                                   room="{{ $room->id }}"
                                   name="doc"
                                   style="position: absolute;cursor: pointer; top: 0; left: 0; width: 100%; height: 100%; opacity: 0;"
                                   accept="application/msword,text/plain, application/pdf" />
                            <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 53 53" enable-background="new 0 0 53 53" width="53" style=" height: -webkit-fill-available; "><filter height="130%" id="document-dropshadow"><feOffset dy="2" result="offsetblur"></feOffset><feComponentTransfer><feFuncA slope=".08" type="linear"></feFuncA></feComponentTransfer><feMerge><feMergeNode></feMergeNode><feMergeNode in="SourceGraphic"></feMergeNode></feMerge></filter><defs><circle id="document-SVGID_1_" cx="26.5" cy="26.5" r="25.5"></circle></defs><clipPath id="document-SVGID_2_"><use xlink:href="#document-SVGID_1_" overflow="visible"></use></clipPath><g clip-path="url(#document-SVGID_2_)"><path fill="#5157AE" d="M26.5-1.1C11.9-1.1-1.1 5.6-1.1 27.6h55.2c-.1-19-13-28.7-27.6-28.7z"></path><path fill="#5F66CD" d="M53 26.5H-1.1c0 14.6 13 27.6 27.6 27.6s27.6-13 27.6-27.6H53z"></path></g><path fill="#F5F5F5" filter="url(#document-dropshadow)" d="M21.4 16.3c-1.1 0-2 .9-2 2v15.6c0 1.1.9 2 2 2h11.7c1.1 0 2-.9 2-2V22.1l-5.9-5.9-7.8.1zm6.8 6.1v-4.7l5.4 5.4h-4.8c-.4 0-.6-.3-.6-.7z"></path></svg>
                        </div>

                        <div class="col p-2 text-center rounded"style="cursor: pointer;"
                                onclick="navigator.geolocation.getCurrentPosition(GEOsuccess, GEOerror, GEOoptions)"
                                class="col p-2 rounded m-2  maplink">
                            <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                  preserveAspectRatio="xMidYMid meet" viewBox="0 0 53 53" width="53"style=" height: -webkit-fill-available; ">
                                <defs><path d="M53 26.5C53 41.13 41.13 53 26.5 53C11.87 53 0 41.13 0 26.5C0 11.87 11.87 0 26.5 0C41.13 0 53 11.87 53 26.5Z" id="b2UOMwSNzE"></path><path d="M33.39 45.7L34.83 47.39L36.12 48.94L37.26 50.35L37.41 50.54L36.73 50.84L35.55 51.28L34.35 51.68L33.13 52.01L31.88 52.29L30.62 52.51L29.33 52.67L28.03 52.77L26.7 52.8L25.38 52.77L24.08 52.67L22.79 52.51L21.52 52.29L20.28 52.01L19.05 51.68L18.28 51.42L30.05 41.9L31.8 43.87L33.39 45.7Z" id="a8OVs6HEzw"></path><path d="M51.27 17.3L51.66 18.5L52 19.72L52.28 20.97L52.5 22.24L52.63 23.29L18.27 51.41L17.44 51.13L16.27 50.69L15.12 50.19L14 49.63L12.92 49.03L12.05 48.5L50.72 15.9L50.82 16.13L51.27 17.3Z" id="a3wFg3JosT"></path><path d="M52.87 24.32L52.97 25.64L53 26.96L52.97 28.28L52.87 29.58L52.71 30.85L52.49 32.1L52.21 33.33L51.88 34.52L51.48 35.69L51.04 36.83L50.54 37.95L49.98 39.03L49.38 40.07L48.73 41.09L48.03 42.06L47.29 43.01L46.5 43.91L45.67 44.78L44.79 45.61L43.88 46.39L42.93 47.14L42.66 47.33L34.76 37.94L52.54 22.01L52.71 23.02L52.87 24.32Z" id="c1oAEIe45"></path><path d="M26.34 13.72L26.72 13.75L27.1 13.8L27.47 13.87L27.84 13.95L28.2 14.04L28.56 14.14L28.91 14.26L29.25 14.39L29.59 14.53L29.92 14.68L30.24 14.85L30.56 15.02L30.86 15.21L31.16 15.41L31.45 15.62L31.73 15.83L32 16.06L32.27 16.3L32.52 16.55L32.76 16.8L32.99 17.07L33.21 17.34L33.42 17.62L33.62 17.91L33.81 18.2L33.99 18.51L34.15 18.82L34.3 19.13L34.44 19.46L34.56 19.79L34.67 20.12L34.77 20.46L34.85 20.81L34.92 21.16L34.97 21.52L35.01 21.88L35.04 22.24L35.04 22.61L35.04 22.98L35.01 23.34L34.97 23.7L34.92 24.06L34.85 24.42L34.77 24.78L34.67 25.13L34.56 25.49L34.44 25.84L34.3 26.2L34.15 26.55L33.99 26.91L33.81 27.27L33.62 27.63L33.42 27.99L33.21 28.36L32.99 28.73L32.76 29.1L32.52 29.47L32.27 29.86L32 30.24L31.73 30.63L31.45 31.03L31.16 31.43L30.86 31.84L30.56 32.26L30.24 32.68L29.92 33.11L29.59 33.55L29.25 34L28.91 34.45L28.56 34.92L28.2 35.4L27.84 35.88L27.47 36.38L27.1 36.89L26.72 37.41L26.34 37.94L25.95 38.48L25.56 39.04L25.17 38.48L24.78 37.94L24.4 37.41L24.02 36.89L23.65 36.38L23.28 35.88L22.92 35.4L22.56 34.92L22.21 34.45L21.87 34L21.53 33.55L21.2 33.11L20.88 32.68L20.56 32.26L20.25 31.84L19.96 31.43L19.67 31.03L19.38 30.63L19.11 30.24L18.85 29.86L18.6 29.47L18.35 29.1L18.12 28.73L17.9 28.36L17.69 27.99L17.49 27.63L17.31 27.27L17.13 26.91L16.97 26.55L16.82 26.2L16.68 25.84L16.55 25.49L16.44 25.13L16.35 24.78L16.26 24.42L16.2 24.06L16.14 23.7L16.1 23.34L16.08 22.98L16.07 22.61L16.08 22.24L16.1 21.88L16.14 21.52L16.2 21.16L16.26 20.81L16.35 20.46L16.44 20.12L16.55 19.79L16.68 19.46L16.82 19.13L16.97 18.82L17.13 18.51L17.31 18.2L17.49 17.91L17.69 17.62L17.9 17.34L18.12 17.07L18.35 16.8L18.6 16.55L18.85 16.3L19.11 16.06L19.38 15.83L19.67 15.62L19.96 15.41L20.25 15.21L20.56 15.02L20.88 14.85L21.2 14.68L21.53 14.53L21.87 14.39L22.21 14.26L22.56 14.14L22.92 14.04L23.28 13.95L23.65 13.87L24.02 13.8L24.4 13.75L24.78 13.72L25.17 13.69L25.56 13.69L25.95 13.69L26.34 13.72ZM25.19 17.93L25.01 17.94L24.83 17.97L24.65 18L24.48 18.03L24.31 18.08L24.14 18.13L23.97 18.18L23.81 18.24L23.65 18.31L23.49 18.38L23.34 18.46L23.19 18.55L23.05 18.63L22.9 18.73L22.77 18.83L22.63 18.93L22.5 19.04L22.38 19.15L22.26 19.27L22.15 19.39L22.04 19.51L21.93 19.64L21.83 19.78L21.74 19.91L21.65 20.05L21.57 20.2L21.49 20.34L21.42 20.49L21.35 20.65L21.29 20.8L21.24 20.96L21.19 21.12L21.16 21.29L21.12 21.45L21.1 21.62L21.08 21.79L21.07 21.96L21.06 22.14L21.07 22.31L21.08 22.48L21.1 22.66L21.12 22.82L21.16 22.99L21.19 23.15L21.24 23.31L21.29 23.47L21.35 23.63L21.42 23.78L21.49 23.93L21.57 24.08L21.65 24.22L21.74 24.36L21.83 24.5L21.93 24.63L22.04 24.76L22.15 24.89L22.26 25.01L22.38 25.13L22.5 25.24L22.63 25.35L22.77 25.45L22.9 25.55L23.05 25.64L23.19 25.73L23.34 25.81L23.49 25.89L23.65 25.96L23.81 26.03L23.97 26.09L24.14 26.15L24.31 26.2L24.48 26.24L24.65 26.28L24.83 26.31L25.01 26.33L25.19 26.35L25.37 26.36L25.56 26.36L25.74 26.36L25.93 26.35L26.11 26.33L26.29 26.31L26.46 26.28L26.64 26.24L26.81 26.2L26.98 26.15L27.14 26.09L27.31 26.03L27.47 25.96L27.62 25.89L27.78 25.81L27.93 25.73L28.07 25.64L28.21 25.55L28.35 25.45L28.48 25.35L28.61 25.24L28.74 25.13L28.86 25.01L28.97 24.89L29.08 24.76L29.18 24.63L29.28 24.5L29.38 24.36L29.47 24.22L29.55 24.08L29.63 23.93L29.7 23.78L29.76 23.63L29.82 23.47L29.88 23.31L29.92 23.15L29.96 22.99L29.99 22.82L30.02 22.66L30.04 22.48L30.05 22.31L30.05 22.14L30.05 21.96L30.04 21.79L30.02 21.62L29.99 21.45L29.96 21.29L29.92 21.12L29.88 20.96L29.82 20.8L29.76 20.65L29.7 20.49L29.63 20.34L29.55 20.2L29.47 20.05L29.38 19.91L29.28 19.78L29.18 19.64L29.08 19.51L28.97 19.39L28.86 19.27L28.74 19.15L28.61 19.04L28.48 18.93L28.35 18.83L28.21 18.73L28.07 18.63L27.93 18.55L27.78 18.46L27.62 18.38L27.47 18.31L27.31 18.24L27.14 18.18L26.98 18.13L26.81 18.08L26.64 18.03L26.46 18L26.29 17.97L26.11 17.94L25.93 17.93L25.74 17.92L25.56 17.91L25.37 17.92L25.19 17.93Z" id="ct9qq3EnM"></path></defs><g><g><g><use xlink:href="#b2UOMwSNzE" opacity="1" fill="#1aa260" fill-opacity="1"></use></g><g><use xlink:href="#a8OVs6HEzw" opacity="1" fill="#3e8df4" fill-opacity="1"></use></g><g><use xlink:href="#a3wFg3JosT" opacity="1" fill="#ffdf51" fill-opacity="1"></use></g><g><use xlink:href="#c1oAEIe45" opacity="1" fill="#afafaf" fill-opacity="1"></use></g><g><use xlink:href="#ct9qq3EnM" opacity="1" fill="#ffffff" fill-opacity="1"></use></g></g></g></svg>
                        </div>

{{--                        <div class="col p-2 text-center rounded" style="cursor: pointer;">--}}
{{--                            <svg width="53" xmlns="http://www.w3.org/2000/svg"--}}
{{--                                 style=" height: -webkit-fill-available;"--}}
{{--                                 viewBox="0 0 53 53">--}}
{{--                                <g>--}}
{{--                                    <ellipse stroke="null" fill="#840606" stroke-width="null" cx="26.223165" cy="26.808246" id="svg_2" rx="26.109804" ry="26.109804"/>--}}
{{--                                    <path stroke="null" fill="#ffffff" d="m13.8963,31.447821c-0.720687,0.720687 -1.126074,1.69842 -1.126074,2.718192l0,2.732005l-1.921832,3.363207l1.921832,1.921832l3.363207,-1.921832l2.732005,0c1.019171,0 1.996904,-0.404786 2.717591,-1.125473l7.605652,-7.60445l-7.687329,-7.687329l-7.605051,7.603851l-0.000001,-0.000002zm26.012603,-18.325273c-2.250346,-2.252148 -5.902428,-2.252148 -8.152774,0l-4.629814,4.629814l-0.786751,-0.786751c-0.566941,-0.566941 -1.480412,-0.559133 -2.038344,0l-2.460546,2.460546c-0.562737,0.562737 -0.562737,1.475607 0,2.038344l9.725673,9.725673c0.566941,0.566941 1.480412,0.559133 2.038344,0l2.460546,-2.459946c0.562737,-0.562737 0.562737,-1.475607 0,-2.038344l-0.786751,-0.786751l4.629814,-4.629814c2.252747,-2.250946 2.252747,-5.901227 0.000601,-8.152774l0.000001,0.000001z" id="svg_1"/>--}}
{{--                                </g>--}}
{{--                            </svg>--}}

{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Picker -->
<div class="modal fade" id="openPicker" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog animated fadeIn "
         style="position:fixed;right: 0;left: auto;/* height: fit-content; */bottom:0;top: calc(100% - 445px);">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid">
                    <link href="{{asset('css/WheelColorPicker/WheelColorPicker.css')}}" rel="stylesheet">

                    <div class="container_color_picker">
                        <div class="resize"></div>
                        <div class="picking_color">
                            <div class="hue" id="hue">
                                <div class="pointer" id="hue_pointer" style="top:0;"></div>
                            </div>
                            <div class="saturation">
                                <div class="bw_g"></div>
                                <div class="pointer" id="sat_pointer" style="top:0;left:0;"></div>
                            </div>
                        </div>
                        <div class="switch-colors-system">
                            <span class="switch left"></span>
                            <span class="switch right"></span>
                            <div class="colors-system">
                                <span style="opacity: 1;">HEX</span>
                                <span style="opacity: 0;">RGB</span>
                                <span style="opacity: 0;">HSL</span>
                            </div>
                        </div>
                        <div class="result" id="result">#FFFFFF</div>
                        <div class="copied">Copied</div>
                        <input type="text" class="color" value="#FFFFFF">
                    </div>

                    <script src="{{ asset('js/WheelColorPicker/WheelColorPicker.js') }}"></script>
                </div>
            </div>
        </div>
    </div>
</div>



@include('chat_files.footer')
