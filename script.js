function task4(){
        let img = document.createElement("img");
            img.src = "flower2.png";
            var src = document.getElementById("new_element");
            src.appendChild(img);
}


function task5(){
        let spans = document.getElementById("rainbow").querySelectorAll(".element");// fill with proper code
                let colors = ["red", "orange", "yellow", "green", "blue", "purple", "pink"];
                for (var i = spans.length - 1; i >= 0; i--) {
                    spans[i].style.color = colors[i];
                }// fill with proper code
}

function task6(){
        
        var changeSrc = function(image) {
                let filename = image.target.src.replace(/^.*[\\\/]/, '');
                if (filename=="flower1.png"){
                        image.target.src = "flower2.png";
                }else{
                        image.target.src = "flower1.png";
                }
        };
        document.getElementById("event").addEventListener("mouseover", changeSrc);
}

function addItem(){
    var check = document.getElementById("important");
    var check2 = document.getElementById("grocerie");

    var ul = document.getElementById("liste");
    var item = document.getElementById("item");
    var li = document.createElement("li");
    li.setAttribute('id',item.value);
    li.appendChild(document.createTextNode(item.value));
    ul.appendChild(li);
    if(check.checked) {
         li.style.color = 'red';
    }
    if(check2.checked){
        li.style["text-decoration"] = 'underline';
    }
}

function removeItem(){
    var ul = document.getElementById("liste");
    var item2 = document.getElementById("item2");
    var element = document.getElementById(item2.value);
    ul.removeChild(element);
}

function init(){
        task4();
        task5();
        task6();
}