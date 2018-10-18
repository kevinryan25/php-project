var mixed = require('./data/mixed-subjects.json');
var subjects = require('./data/subjects.json')
console.log(mixed.length);

var courses = [];

var i = 0;
mixed.forEach((me)=>{
    var course = [me];
    subjects.forEach((se)=>{
        var shortened = se.substr(0, se.length - 5).toLowerCase();
        var mixed = me.substr(0, me.length - 1);
        if(mixed == shortened){
            course.push(se);
            i++;
        }
    })
    courses.push(course);
})
console.log(courses);