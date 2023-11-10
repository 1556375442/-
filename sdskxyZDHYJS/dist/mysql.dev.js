"use strict";

var mysql = require('mysql');

var con = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '12345678',
  database: 'battery'
});
con.connect();

function exec(sql) {
  con.query(sql);
} // const sql='select * from register;'


module.exports = {
  exec: exec
}; // con.end()