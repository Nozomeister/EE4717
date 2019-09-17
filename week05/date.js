alert("Start date.js");
    var today = new Date(); //declare a new object
    var dateString = today.toLocaleDateString();
    var day = today.getDay();
    var month = today.getMonth();
    var year = today.getFullYear();
    var timeMilliseconds = today.getTime();
    var hour = today.getHours();
    var minute = today.getMinutes();
    var second = today.getSeconds();
    var milliseconds = today.getMilliseconds();
//fetching the various parts of the date

//display the parts of the date
document.write("Date: " + dateString + "<br>",
                "Day: " + day + "<br>",
                "Month: " + month + "<br>",
                "Year: "+ year + "<br>",
                "Time in milliseconds: " + timeMilliseconds + "<br>",
                "Hour: " + hour + "<br>",
                "Minute: " + minute + "<br>",
                "Second: " + second + "<br>",
                "Milliseconds: " + milliseconds + "<br>");

//time a loop
var dum1 = 1.00149265, product = 1;
var start = new Date();
for (var count = 0; count < 10000; count++)
    porduct = product + 1.000002 * dum1 /1.00001;

var end = new Date();
var diff = end.getTime() - start.getTime();
document.write("<br> The loop took " + diff + " milliseconds <br>");
