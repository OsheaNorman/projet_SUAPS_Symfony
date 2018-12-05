var myVar = setInterval(myTimer, 1000);

function myTimer() {
    var d = new Date();
    var h = d.getHours();
    var m = d.getMinutes();
    var s = d.getSeconds();

    if( s >=0 && s <=9 )
        document.getElementById("secondes").innerHTML = '0' + s;
    else
        document.getElementById("secondes").innerHTML = s;

    if( m >=0 && m <=9 )
        document.getElementById("minutes").innerHTML = '0' + m;
    else
        document.getElementById("minutes").innerHTML = m;

    if( h >=0 && h <=9 )
        document.getElementById("hours").innerHTML = '0' + h;
    else
        document.getElementById("hours").innerHTML = h;
    
}