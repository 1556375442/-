"use strict";

var _require = require('./addPara.js'),
    newPara = _require.newPara;

var _require2 = require('../mysql'),
    exec = _require2.exec;

var _require3 = require('../resModel'),
    SuccessModel = _require3.SuccessModel,
    ErrorModel = _require3.ErrorModel;

var handleRouter = function handleRouter(req, res) {
  var method = req.method;

  if (method === 'GET' && req.path === '/sdskxyZDHYJS/fourth.php') {
    console.log(req.query); // Object.keys(req.query).forEach(key => {
    //     // console.log(key)
    //   })

    for (var key in req.query) {
      //遍历对象属性
      console.log(key);
      var sql = "insert into history (paraname,value) values('".concat(key, "','").concat(req.query[key], "')"); //遍历对象属性值
      // console.log(req.query[key])

      exec(sql);
    }

    return;
  }

  if (method === 'POST' && req.path === '/api/bat/add') {
    console.log(req.body); // const result=newPara(req.body)     
  }
};

module.exports = handleRouter;