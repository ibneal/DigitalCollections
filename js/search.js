function search() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search");
    filter = input.value.toUpperCase();
    table = document.getElementById("results");
    tr = table.getElementsByTagName("tr");
    th = table.getElementsByTagName("th");

    // Loop through all table rows, and hide those who don't match the search query
    for (i=1;i<tr.length;i++){
        count=0;
        for (j=0;j<th.length;j++){
            td = tr[i].getElementsByTagName("td")[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    count=count+1;
                }
            }
        }
        if(count==0){
            row=tr[i].id;
            document.getElementById(row).style.display= "none";
        }
        else{
            row=tr[i].id;
            document.getElementById(row).style.display = "";
        }
    }
}