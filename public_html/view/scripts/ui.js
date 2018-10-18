let table;
$(function(){

    if(window.location.href.match(/\/teacher/)) table = 'teacher';
    if(window.location.href.match(/\/subject/)) table = 'subject';


    /*
        Searchbar
    */
    $('.searchbar .control').focus(function(){
        $(this).parent().addClass('focus');
    })
    $('.searchbar .control').blur(function(){
        $(this).parent().removeClass('focus');
    })

    /*
        Results per page select element
    */
    $('.resultsperpage').change(null, function(){
        var loc = window.location.href;
        window.location = loc.substr(0, loc.indexOf('?'))+"?shown="+this.value;
    })

    /*
        AJAX Search
    */
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

    /*
        Update form
    */
    
    $('table button.edit').click(function(){
        $tr = $(this).parent().parent();
        switchUpdateForm($tr);
        
    });

})

const switchUpdateForm = ($tr)=>{
    $nameInputTD = $(document.createElement('td')).addClass('name');
        $salaryInputTD = $(document.createElement('td')).addClass('salary');
        $controlsTD = $(document.createElement('td')).addClass('controls');
        $nameInput = $(document.createElement('input')).addClass('control background-light').attr('type', 'text');
        $salaryInput = $(document.createElement('input')).addClass('control background-light').attr('type', 'number');

        const id = $tr.children('.id').text();
        const name = $tr.children('.name').text();
        let salary, hrs;
        if(table === 'teacher')
            salary = $tr.children('.salary').text();
        else if(table === 'subject')
            hrs = $tr.children('.hrs').text();

        $nameInput.val(name)
        $salaryInput.val(salary)

        $btn = $(document.createElement('button')).addClass('btn btn-quaternary btn-rounded');
        $i = $(document.createElement('i')).addClass('fas fa-arrow-right');

        $btn[0].ref = {
            $nameInput: $nameInput,
            $salaryInput: $salaryInput
        }
        

        var i = 0;
        $tr.children().each((i, e)=>{
            if(i++ > 1)
                $(e).hide();
        })

        $tr.append($nameInputTD.append($nameInput));
        $tr.append($salaryInputTD.append($salaryInput));
        $tr.append($controlsTD.append($btn.append($i)));

        $btn.$nameInput = $nameInput;
        $btn.click(function(e){

            $tr = $(this).parent().parent();
            let id = $tr.children('.id').text();
            let name = $tr.children('.name input');
            let hrs = $tr.children('.salary input').val()

            var url = "/controller/update.php?table="+table+"&id="+id;
            if(table === 'teacher'){
                url+= "&name="+$(this.ref.$nameInput).val();
                url+= "&salary="+$(this.ref.$salaryInput).val();
            }
            window.location = (url)
        })
}
