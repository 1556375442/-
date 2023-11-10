"use strict";

function _readOnlyError(name) { throw new Error("\"" + name + "\" is read-only"); }

var http = require('http');

var handleRouter = function handleRouter(req, res) {
  var method = req.method;
  var url = req.url;
  var path = url.split('?')[0];

  if (method === 'POST' && path === 'api/data') {
    return {
      msg: 'zheshi'
    };
  }
};

var serverHandle = function serverHandle(req, res) {
  res.setHeader('Content-type', 'application/json');
  var data = handleRouter = (_readOnlyError("handleRouter"), (req, res));

  if (data) {
    res.end(JSON.stringify(data));
    return;
  }

  res.writeHead(404, {
    'content-type': 'text/plain'
  });
  res.write('404 not found');
  res.end();
};

var server = http.createServer(serverHandle);
server.listen(3000);