
const fs = require('fs');

const firstnames = require('./data/firstnames.json');
const lastnames = require('./data/lastnames.json');

const getRandom = (array)=>{
    return array[Math.floor(Math.random()*array.length)];
}

String.prototype.capitalize = function(){
    return this[0].toUpperCase() + this.toLowerCase().substring(1);
}

var SQL = "INSERT INTO teacher (name) VALUES \n";

firstnames.forEach((e)=>{
    const name = (e.capitalize()+" "+getRandom(lastnames));
    SQL+= "(\""+name+"\")\n";
})
SQL+= ";";

console.log(SQL);