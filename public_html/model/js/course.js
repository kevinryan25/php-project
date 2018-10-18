var subjects = require("./data/subjects.json");

var mixed = [];
subjects.forEach((e)=>{
    var name = (e.substr(0, e.length - 5)).toLowerCase();
    if(mixed.indexOf(name) < 0) mixed.push(name); 
})


console.log(mixed);