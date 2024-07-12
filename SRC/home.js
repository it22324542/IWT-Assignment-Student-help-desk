
function slide(data){
    if(data === 'pic1')
    {
        document.getElementById("image").src = "./img/student1.jpg";
    }
    else if(data === 'pic2')
    {
        document.getElementById("image").src = "./img/student2.jpg";
    }
    else if(data === 'pic3')
    {
        document.getElementById("image").src = "./img/pic3.jpg";
    }
    else if(data === 'pic4')
    {
        document.getElementById("image").src = "./img/student3.jpg";
    }
}