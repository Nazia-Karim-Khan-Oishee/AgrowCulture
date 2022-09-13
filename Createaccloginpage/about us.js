window.addEventListener('scroll',()=>{
let content= document.querySelector('.roww');
let contentPosition= content.getBoundingClientRect().top;
let screenPosition= window.innerHeight /1;
if(contentPosition<screenPosition)
{   //alert('hey man');
    content.classList.add('active');
}
else
{
    content.classList.remove('active');
}
});