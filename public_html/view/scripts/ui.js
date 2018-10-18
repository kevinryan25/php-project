$(function(){
    $('.searchbar .control').focus(function(){
        $(this).parent().addClass('focus');
    })
    $('.searchbar .control').blur(function(){
        $(this).parent().removeClass('focus');
    })


    $('.resultsperpage').change(null, function(){
        var loc = window.location.href;
        window.location = loc.substr(0, loc.indexOf('?'))+"?shown="+this.value;
    })

    $('.searchbar .control').keyup(async function(){
        var q = this.value;
        var column = 'name';
        if(q.match(/^[0-9]+$/)){
            column = 'id';
        }
        var table = '';
        if(window.location.href.match(/\/teacher/)) table = 'teacher';
        if(window.location.href.match(/\/subject/)) table = 'subject';

        var salaryCell = "", hrsCell = "";
            var data = await search(q, column, table);
            if(q != ""){
                $('main table tbody>tr').each((i, e)=>{
                    $(e).hide();
                })
                $('.pagination, .row-count').hide();
            }else{
                $('.pagination, .row-count').show();
            }
            data = JSON.parse(data);
            // Show results via ajax
            data.forEach((e)=>{
                if(table == 'teacher') salaryCell = "<td>" +e.salary+" €/hr</td>  ";
                if(table == 'subject') hrsCell = "<td>"+e.hrs+" heures</td>"
                var tr = document.createElement('tr');
                tr.innerHTML = "<td><input type='checkbox' /></td>  \
                <td> "+e.id+"</td>   \
                <td> "+e.name+"</td>    \
                "+salaryCell+hrsCell+"         \
                <td class='controls'><button class='btn btn-tertiary btn-rounded'><i class='fas fa-trash-alt'></i></button> \
                <button class='btn btn-quaternary btn-rounded'><i class='fas fa-edit'></i></button><button class='btn btn-primary btn-rounded'> \
                <i class='fas fa-file-alt'></i></button></td>";

                $('main table tbody')[0].appendChild(tr);
            })
            
        
    })

})


