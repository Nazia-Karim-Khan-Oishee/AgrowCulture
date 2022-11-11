let carts = document.querySelectorAll('.add-cart');
let products = [
    {
       name: "Tomato", 
       tag: "tomato",
       price: 135,
       incart: 0
    },
    
   {name: "Potato", 
    tag: "potato",
    price: 33,
    incart: 0
   }
];
for (let i=0;i<carts.length;i++)
{
    carts[i].addEventListener('click',()=>{
        cartNumbers(products[i]);
        totalCost(products[i]);
    })
}

function onLoadCartNumbers()
{
    let productNumbers=localStorage.getItem('cartNumbers');
    if(productNumbers)
    {
        document.querySelector('.cart span').textContent= productNumbers;
    }
}
function cartNumbers(product, action) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if( action ) {
        localStorage.setItem("cartNumbers", productNumbers - 1);
        document.querySelector('.cart span').textContent = productNumbers - 1;
        console.log("action running");
    } else if( productNumbers ) {
        localStorage.setItem("cartNumbers", productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;
    } else {
        localStorage.setItem("cartNumbers", 1);
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(product);
}
function setItems(product) {
    // let productNumbers = localStorage.getItem('cartNumbers');
    // productNumbers = parseInt(productNumbers);
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if(cartItems != null) {
        let currentProduct = product.tag;
    
        if( cartItems[currentProduct] == undefined ) {
            cartItems = {
                ...cartItems,
                [currentProduct]: product
            }
        } 
        cartItems[currentProduct].incart += 1;

    } else {
        product.incart = 1;
        cartItems = { 
            [product.tag]: product
        };
    }

    localStorage.setItem('productsInCart', JSON.stringify(cartItems));
}
function totalCost( product, action ) {
    let cart = localStorage.getItem("totalCost");

    if( action) {
        cart = parseInt(cart);

        localStorage.setItem("totalCost", cart - product.price);
    } else if(cart != null) {
        
        cart = parseInt(cart);
        localStorage.setItem("totalCost", cart + product.price);
    
    } else {
        localStorage.setItem("totalCost", product.price);
    }
}
function displayCart()
{
  let cartItems= localStorage.getItem("productsInCart");
  cartItems = JSON.parse(cartItems);
  let productContainer = document.querySelector(".products");
  let cartCost= localStorage.getItem('totalCost');
  console.log(cartItems);
  if(cartItems && productContainer)
  {
    productContainer.innerHTML = '';
    Object.values(cartItems).map(item =>{
        productContainer.innerHTML += 
        `
        <div class="container">
        <div class="product">
        <i class="fa-solid fa-circle-xmark"></i>
         <img src="${item.tag}.jpg">
        <span>${item.name}</span>
      </div> 
        <div class="price">${item.price}tk/kg</div>
        <div class="quantity">
        
        <ion-icon class="decrease" name="arrow-dropleft-circle"></ion-icon>
        <span>${item.incart}</span><ion-icon class="increase" name="arrow-dropright-circle"></ion-icon>
        </div>
        <div class="total">
        ${item.incart*item.price},00tk
        </div>
        </div>
        `
    });
    productContainer.innerHTML +=`
    <div class="basketTotalContainer">
    <h4 class="basketTotalTitle">
    Basket Total </h4>
    <h4 class="basketTotal">
    ${cartCost},00 </h4>tk`;
    productContainer.innerHTML +=`<a href="payment.html"><button class="button-68" role="button">CHECKOUT</button></a>`;

    
  }
deleteButtons();
manageQuantity();
}
function manageQuantity() {
    let decreaseButtons = document.querySelectorAll('.decrease');
    let increaseButtons = document.querySelectorAll('.increase');
    let currentQuantity = 0;
    let currentProduct = '';
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    for(let i=0; i < increaseButtons.length; i++) {
        decreaseButtons[i].addEventListener('click', () => {
            console.log(cartItems);
            currentQuantity = decreaseButtons[i].parentElement.querySelector('span').textContent;
            console.log(currentQuantity);
            currentProduct = decreaseButtons[i].parentElement.previousElementSibling.previousElementSibling.querySelector('span').textContent.toLocaleLowerCase().replace(/ /g,'').trim();
            console.log(currentProduct);

            if( cartItems[currentProduct].incart > 1 ) {
                cartItems[currentProduct].incart -= 1;
                cartNumbers(cartItems[currentProduct], "decrease");
                totalCost(cartItems[currentProduct], "decrease");
                localStorage.setItem('productsInCart', JSON.stringify(cartItems));
                displayCart();
                
            }
        });

        increaseButtons[i].addEventListener('click', () => {
            console.log(cartItems);
            currentQuantity = increaseButtons[i].parentElement.querySelector('span').textContent;
            console.log(currentQuantity);
            currentProduct = increaseButtons[i].parentElement.previousElementSibling.previousElementSibling.querySelector('span').textContent.toLocaleLowerCase().replace(/ /g,'').trim();
            console.log(currentProduct);

            cartItems[currentProduct].incart += 1;
            cartNumbers(cartItems[currentProduct]);
            totalCost(cartItems[currentProduct]);
            localStorage.setItem('productsInCart', JSON.stringify(cartItems));
            displayCart();
        });
    }
}
function deleteButtons()
{
    let deleteButtons = document.querySelectorAll('.product i');
    let productName;
    let productNumbers = localStorage.getItem('cartNumbers');
     let cartItems=localStorage.getItem('productsInCart');
     cartItems= JSON.parse(cartItems);
     let cartCost= localStorage.getItem('totalCost');

    for (let i=0;i<deleteButtons.length;i++)
    {
        deleteButtons[i].addEventListener('click',()=>
        {
           productName=deleteButtons[i].parentElement.textContent.trim().toLowerCase().replace(/ /g,'');
           console.log(productName);
           console.log("we have"+ productNumbers+"products in cart");
            localStorage.setItem('cartNumbers',productNumbers - cartItems[productName].incart );
            localStorage.setItem('totalCost', cartCost-(cartItems[productName].price*cartItems[productName].incart));
            delete cartItems[productName];
            localStorage.setItem('productsInCart',JSON.stringify(cartItems));
            displayCart();
            onLoadCartNumbers();
        });
    }
}

onLoadCartNumbers();
displayCart();
