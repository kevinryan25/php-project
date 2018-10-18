var subjects = require('./data/subjects.json');

SQL = "USE phpProject;\
INSERT INTO subject (name, hrs) VALUES ";
var i = 0;
var hrsMin = 6; hrsMax = 24;
subjects.forEach((e)=>{
    const name = e;
    const hrs = hrsMin + Math.round((hrsMax - hrsMin) * Math.random());
    //const hrs = 4;
    SQL+= ((i++ > 0)?',':'') + "(\""+name+"\", \""+hrs+"\")\n";
})
SQL+= ";";
console.log(SQL);