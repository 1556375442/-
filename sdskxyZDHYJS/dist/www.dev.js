"use strict";

var http = require('http');

var PORT = 3000;

var serverHandle = require('./app.js');

var server = http.createServer(serverHandle);
server.listen(80);