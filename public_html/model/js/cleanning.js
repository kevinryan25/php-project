var subjects = require('./data/subjects.json');

var output = [];
subjects.forEach((e)=>{
    if(output.indexOf(e) < 0) output.push(e);
})
console.log(JSON.stringify(output));