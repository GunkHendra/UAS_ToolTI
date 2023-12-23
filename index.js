var block_container = document.body;
var number =  7;

document.addEventListener("DOMContentLoaded", function(){    
    for (var i = 1; i <= number; i++){
        var block = document.createElement('div');
        block.className = 'block';
        block.id = "block" + i;
        block_container.appendChild(block);
    }
});

function login(){
    window.location.href = 'data.php';
}

function main_back(){
    window.location.href = "index.html";
}

function back(){
    window.location.href = "data.php";
}

function create(){
    window.location.href = "create.php";
}


