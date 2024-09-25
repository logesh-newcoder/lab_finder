var a=document.getElementById("show");

var deleteButton=document.getElementById("right");

deleteButton.style.display = "none"; 



var a1=document.getElementById("arowa");

var a2=document.getElementById("arowb");

var a3=document.getElementById("arowc");

var a4=document.getElementById("arowd");

var a5=document.getElementById("arowe");



var b1=document.getElementById("browa");

var b2=document.getElementById("browb");

var b3=document.getElementById("browc");

var b4=document.getElementById("browd");

var b5=document.getElementById("browe");



var c1=document.getElementById("crowa");

var c2=document.getElementById("crowb");

var c3=document.getElementById("crowc");

var c4=document.getElementById("crowd");

var c5=document.getElementById("crowe");



var d1=document.getElementById("drowd");

var d2=document.getElementById("drowd");

var d3=document.getElementById("drowd");

var d4=document.getElementById("drowd");

var d5=document.getElementById("drowd");



var e1=document.getElementById("erowa");

var e2=document.getElementById("erowb");

var e3=document.getElementById("erowc");

var e4=document.getElementById("erowd");

var e5=document.getElementById("erowe");



var f1=document.getElementById("frowa");

var f2=document.getElementById("frowb");

var f3=document.getElementById("frowc");

var f4=document.getElementById("frowd");

var f5=document.getElementById("frowe");





function arowa(){

    deliver(a1);

}

function arowb(){

    deliver(a2);

}

function arowc(){

    deliver(a3);

}

function arowd(){

    deliver(a4);

}

function arowe(){

    deliver(a5);

}



function browa(){

    deliver(b1);

}

function browb(){

    deliver(b2);

}

function browc(){

    deliver(b3);

}

function browd(){

    deliver(b4);

}

function browe(){

    deliver(b5);

}



function crowa(){

    deliver(c1);

}

function crowb(){

    deliver(c2);

}

function crowc(){

    deliver(c3);

}

function crowd(){

    deliver(c4);

}

function crowe(){

    deliver(c5);

}



function drowa(){

    deliver(d1);

}

function drowb(){

    deliver(d2);

}

function drowc(){

    deliver(d3);

}

function drowd(){

    deliver(d4);

}

function drowe(){

    deliver(d5);

}



function erowa(){

    deliver(e1);

}

function erowb(){

    deliver(e2);

}

function erowc(){

    deliver(e3);

}

function erowd(){

    deliver(e4);

}

function erowe(){

    deliver(e5);

}



function frowa(){

    deliver(f1);

}

function frowb(){

    deliver(f2);

}

function frowc(){

    deliver(f3);

}

function frowd(){

    deliver(f4);

}

function frowe(){

    deliver(f5);

}



function deliver(content) {

    a.value = content.textContent; 

    deleteButton.style.display = "block";

}

function dele() {

    a.value="";

    deleteButton.style.display = "none"; 

    checkPassword();

}

function checkPassword(){

    var val = prompt("Please enter the password:");

    var pas = "edit";    

    if (val === pas) {

        console.log("edit");

        var text=prompt("");

        a.value=text;

        localStorage.setItem("content", text);

    } else {

        alert("Password is wrong");

    }

}

deleteButton.addEventListener("click", function(event) {

    event.preventDefault(); 

    deleteContent();

});



window.onload = function() {

    const storedContent = localStorage.getItem("content");

    if (storedContent) {

        content.value =storedContent;

        deleteButton.style.display = "block";

    };

};
