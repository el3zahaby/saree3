'use strict';
class SocketServer{
    constructor(socket){
        this.io = socket;
        this.online = [];
    
    }
    ioConfig(){
        this.io.use((socket,next)=>{
            socket['id'] = 'element_' + socket.handshake.query.userid;
            socket['friendlist'] = socket.handshake.query.list.split(',');
            next();
        });
    };
    socketconnection(){
        this.ioConfig();
        this.io.on('connection',(socket)=>{
            console.log('io is start');
            this.online = Object.keys(this.io.sockets.sockets);
            this.disconnection(socket);
           this.sendmessage(socket);
            socket.on('report_block_status',(data)=>{
                var friend_list = socket.friendlist;
            if(friend_list.indexOf(data.element) != -1 && this.online.indexOf(data.element) != -1){
                this.io.sockets.connected[data.element].emit('back_report_block_status',{
                    room_status : data.room_status,
                    room : data.room
                });
                
                
            }
            });
        });
    }
   
    disconnection(socket){
          socket.on('disconnect',(data )=> {
              console.log( 'Disconnected' );

              var index = this.online.indexOf(socket.id);
            if (index > -1) {
              this.online.splice(index, 1);
            }
              console.log(this.online);
           
        });
    }
    sendmessage(socket){
        socket.on('share',(data)=>{
            console.log(data);
            var friend_list = socket.friendlist;
            if(friend_list.indexOf(data.element) != -1 && this.online.indexOf(data.element) != -1){
                this.io.sockets.connected[data.element].emit('backshare',{
                   message: data.message,
                    room:data.room,
                    file:data.file
                });
                if (data.file == 'yes'){
                    socket.disconnect();
                    socket.on("disconnect",function () {

                    });
                }
                
            }
            
        });
    }
}
module.exports = SocketServer;
