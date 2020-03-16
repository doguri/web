function subclear() {
  document.getElementById("ip").value="";
  document.getElementById("num").value="";
  document.getElementById("status").innerHTML="&nbsp;";
}

function subSetStatus(s) {
  document.getElementById('status').innerHTML=s;
}
