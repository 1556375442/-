"use strict";

var _require = require('../mysql'),
    exec = _require.exec;

var newPara = function newPara() {
  var Para = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : {};
  var soc = Para.soc;
  var current = Para.current;
  var voltage = Para.voltage; // const paraname=Para.paraname
  // for( let key in req.query ){
  //     const sql=`insert into history (paraname,value) values('${key}','${req.query[key]}')`
  //     //遍历对象属性值
  //     // console.log(req.query[key])
  //     exec(sql)
  //   }
  // const sql=`insert into history (paraname,value )
  //             values('${paraname}','${value}',)`
  // return exec(sql).then(insertData=>{
  //     console.log('insertData is',insertData)
  //     return {
  //         id:insertData.insertId
  //     }
  // })
};

module.exports = {
  newPara: newPara
};