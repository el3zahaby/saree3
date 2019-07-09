'use strict';
const express = require('express');
const http = require('http');
const socket = require('socket.io');
const SocketServer = require('./socket');
class Server{
    constructor(){
        this.port = 5000;
        this.host = 'localhost';
        this.app = express();
        this.http = http.Server(this.app);
        this.socket = socket(this.http);
    }
    runServer(){
        new SocketServer(this.socket).socketconnection();
        this.http.listen(this.port,this.host,() =>{
        console.log("server running on " + this.port);
    });    
    }
}

const app = new Server();
app.runServer();
