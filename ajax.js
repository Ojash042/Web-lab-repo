function search(){
    val = document.forms[0].elements[0].value
    console.log(val)
    if (val !== ""){
        const result_div = document.getElementById("search-results");
        result_div.innerHTML = ""

        const tableHeadings = ['UserId','UserName','FirstName','LastName', 'E-mail']

        const table = document.createElement('table');
        const thead = document.createElement('thead');
        table.appendChild(thead);
        const tbody = document.createElement('tbody');
        const trow = document.createElement('tr');
        for (i in tableHeadings){
            const cell = document.createElement('td');
            text = document.createTextNode(tableHeadings[i])
            cell.appendChild(text)
            trow.appendChild(cell);
        }

        thead.appendChild(trow);
        table.appendChild(thead);
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(this.readyState==4 && this.status==200){
                if (this.response!=="404"){
                    res = this.response.split('/')
                    const trow = document.createElement('tr');
                    for (i in res){
                        const cell = document.createElement('td');
                        text = document.createTextNode(res[i])
                        cell.appendChild(text)
                        trow.appendChild(cell)
                    }
                    tbody.appendChild(trow);
                    table.appendChild(tbody);
                    result_div.appendChild(table);
                }
                else{
                    result_div.innerHTML = "Error, User Not Found!"
                }
            }
        }
        xmlhttp.open("GET","test.php?q="+val,true);
        xmlhttp.send();
        
    }
    return false
}
