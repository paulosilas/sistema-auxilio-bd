function valida() {
	var x=document.getElementsByTagName("input");
	var i=0;
	var c=new Array();
	a=0;
	for (i=0;i<=x.length - 1;i++) {
		if (x[i].type=="checkbox" && x[i].id=="id_checkbox") {
			c[a] = x[i];
			a++;
		}
	}
	i=0;
	var checked = false;
	for (i=0;i<=c.length-1;i++) {
		if (c[i].checked==true) {
			checked = true;
			break;
		}
	}
	if (!checked) {
		alert("Escolha pelo menos um dos checkbox.");
		return false;
	}else if (confirm("Quer continuar?")) {
		return true;
	}else{
		return false;
	}
}