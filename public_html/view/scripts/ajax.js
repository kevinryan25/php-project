async function search(item, column, table){
    return new Promise(async(resolve)=>{
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(this.readyState === 4 && this.status == 200){
                $data = JSON.parse(this.responseText);
                console.log($data);
                resolve(this.responseText);
            }
        }
        console.log('/controller/search.php?q='+item+'&column='+column+'&table='+table)
        xhr.open('GET', '/controller/search.php?q='+item+'&column='+column+'&table='+table)
        xhr.send(null);
    })
}