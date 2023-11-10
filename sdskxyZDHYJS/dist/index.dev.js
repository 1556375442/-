"use strict";

var http = require('http');

var _require = require('../mysql'),
    exec = _require.exec; // const querystring=require('querystring')
// const server=http.createServer((req,res)=>{
//     // res.writeHead(200,{'content-type':'text/html'})
//     // res.end('<h1>hello world</h1>')
//     console.log('method',req.method)
//     const url=req.url
//     console.log('url:',url)
//     req.query=querystring.parse(url.split('?')[1])
//     console.log('query:',req.query)
//     res.end(
//         JSON.stringify(req.query)
//     )
// })
// const server=http.createServer((req,res)=>{
// if(req.method==='POST'){
//     console.log('req content-type:',req.headers['content-type'])
//     let postData=''
//     req.on('data',chunk=>{
//         postData+=chunk.toString()
//     })
//     req.on('end',()=>{
//         console.log('postData:',postData)
//         res.end('hello world!')
//     })
// }
// })


var querystring = require('querystring');

var server = http.createServer(function (req, res) {
  var method = req.method;
  var url = req.url;
  var path = url.split('?')[0];
  var query = querystring.parse(url.split('?')[1]); //设置返回格式为json

  res.setHeader('Content-type', 'application/json'); // resizeBy.end('....')
  //返回数据

  var resData = {
    method: method,
    url: url,
    path: path,
    query: query
  };

  if (method == 'GET') {
    res.end(JSON.stringify(resData));
  }

  if (req.method === 'POST') {
    // console.log('req content-type:',req.headers['content-type'])
    var postData = '';
    req.on('data', function (chunk) {
      postData += chunk.toString();
    });
    req.on('end', function () {
      resData.postData = postData; // console.log('postData:',postData)
      // res.end('hello world!')

      res.end(JSON.stringify(resData));
    });
  }
});
server.listen(80);
console.log('ok');