
function printData(){
	var myStyle = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />';
	var divToPrint=document.getElementById("clients-list");
   newWin= window.open("");
   newWin.document.write(myStyle+divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

