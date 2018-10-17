
const firstnames = require('./data/firstnames.json');
const lastnames = require('./data/lastnames.json');

const getRandom = (array)=>{
    return array[Math.floor(Math.random()*array.length)];
}

String.prototype.capitalize = function(){
    return this[0].toUpperCase() + this.toLowerCase().substring(1);
}

var SQL = "USE phpProject; \nINSERT INTO teacher (name, salary) VALUES \n";

var i = 0; var length = 19;
var salaryMin = 15; var salaryMax = 30;
firstnames.forEach((e)=>{
    if(i >= length) return;
    const name = (e.capitalize()+" "+getRandom(lastnames));
    const salary = salaryMin + Math.round((salaryMax - salaryMin) * Math.random());
    SQL+= ((i++ > 0)?',':'') + "(\""+name+"\", "+salary+")\n";
})
SQL+= ";";

console.log(SQL);