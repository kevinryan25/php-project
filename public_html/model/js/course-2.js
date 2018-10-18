var mixed = require('./data/mixed-subjects.json');
var subjects = require('./data/subjects.json')
console.log(mixed.length);

var courses = [];

var i = 0;

mixed.forEach((me)=>{
    var course = [];
    subjects.forEach((se)=>{
        var shortened = se.substr(0, se.length - 5).toLowerCase();
        var mixed = me.substr(0, me.length - 1).toLowerCase();
        if(mixed == shortened){
            course.push(se);
            i++;
        }
    })
    courses.push(course);
})



var years = ['2014', '2015', '2016', '2017', '2018'];
for(var i = 0; i < courses.length; i++){
    var course = courses[i];
    console.log(course);
    
}
