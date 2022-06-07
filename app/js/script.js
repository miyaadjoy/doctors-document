const toggleButton=document.querySelector('#toggleButton');

const mobileMenu=document.querySelector('.header__mmenu');


toggleButton.addEventListener('click', function()
{
    if(mobileMenu.classList.contains('visible'))
    {//close hamburger menu
        mobileMenu.classList.remove('visible');
       
        

    }

    else
    {//open hamburger menu
        mobileMenu.classList.add('visible');

        
        

    }



});