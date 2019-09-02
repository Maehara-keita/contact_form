let head = document.getElementById('head');
head.style.display= 'flex';
head.style.flexDirection = 'column';
head.style.paddingLeft = '275px';
head.style.paddingBottom = '40px';

head.style.border = '1px solid';
head.style.justifyContent = 'center';
head.style.backgroundColor = 'skyblue';
//head.style.alignContent = 'center';




let center = document.getElementsByClassName('center');
for(let i of center){
    i.style.justifyContent = 'center';

};


let bottum = document.getElementsByClassName('bottum');
bottum[0].style.marginLeft = '30px';
bottum[0].style.fontSize = '1000px';
