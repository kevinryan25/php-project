var subjects = require('./data/subjects.json');

SQL = "INSERT INTO subjects (name) VALUES ";
var i = 0;
subjects.forEach((e)=>{
    const name = e;
    SQL+= ((i++ > 0)?',':'') + "(\""+name+"\")\n";
})
SQL+= ";";
console.log(SQL);