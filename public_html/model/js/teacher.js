
const firstnames = require('./data/firstnames.json');
const lastnames = require('./data/lastnames.json');

const getRandom = (array)=>{
    return array[Math.floor(Math.random()*array.length)];
}

String.prototype.capitalize = function(){
    return this[0].toUpperCase() + this.toLowerCase().substring(1);
}

var SQL = "USE phpProject; \nINSERT INTO teacher (name) VALUES \n";

var i = 0;
firstnames.forEach((e)=>{
    const name = (e.capitalize()+" "+getRandom(lastnames));

    SQL+= ((i++ > 0)?',':'') + "(\""+name+"\")\n";

})
SQL+= ";";

console.log(SQL);