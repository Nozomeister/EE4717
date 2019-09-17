var name_list = new Array("Al", "Betty", "Kasper" , "Michael", "Roberto", "Zimbo");
var new_name, index, last;
//loop to get a new name and insert it
while (new_name = prompt("Please type a new name", "")){
    last = name_list.length - 1;
    //loop to find the place for the new name
    while(last >= 0 && name_list[last] > new_name){
        name_list[last+1] = name_list[last];
        last --;
    }

//insert the new name into its spot in the array
    name_list[last + 1] = new_name;

//display the array

    document.write("<p><b>The new name list is:</b> ", "<br>");
    for (index = 0; index < name_list.length; index++){
        document.write(name_list[index], "<br>");
    }
    document.write("</p>");
}

