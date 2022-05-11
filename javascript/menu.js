/**Makes sure that the document is loaded before accessing the different elements.*/
if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

function ready() {
    let removeCartItemButtons = document.getElementsByClassName('btn-danger');
    for (let i = 0; i < removeCartItemButtons.length; i++) {
        let button = removeCartItemButtons[i];
        button.addEventListener('click', removeCartItem);
    }

    let quantityInputs = document.getElementsByClassName('cart-quantity-input');
    for(let i = 0; i < quantityInputs.length; i++){
        let input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }

    let addToCartButtons = document.getElementsByClassName('add-to-cart');
    for (let i = 0; i < addToCartButtons.length; i++){
        let button = addToCartButtons[i];
        button.addEventListener('click', addToCartClicked);
    }

    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked);
}

function removeCartItem(event){
    let clickedButton = event.target;
    clickedButton.parentElement.parentElement.remove();
    updateCartTotal();
}

function quantityChanged(event){
    let input = event.target;
    if(isNaN(input.value) || input.value <= 0){
        input.value = 1;
    }
    updateCartTotal();
}
/**Removes the cart items after clicking the 'PURCHASE' button.*/
function purchaseClicked() {
    alert("Thank you for your purchase.");
    let cartItems = document.getElementsByClassName('cart-items')[0];
    while(cartItems.hasChildNodes()){
      cartItems.removeChild(cartItems.firstChild);  
    }
    updateCartTotal();
}

function addToCartClicked(event){
    let button = event.target;
    let foodItem = button.parentElement.parentElement;
    let title = foodItem.getElementsByClassName('title')[0].innerText;
    let price = foodItem.getElementsByClassName('price')[0].innerText;
    let imageSrc = foodItem.getElementsByClassName('item-image')[0].src
    console.log(`${title} ${price}`);
    addItemToCart(title, price, imageSrc);
    updateCartTotal(); /**Make out total to update correspondingly after addition of a food item. */
}

function addItemToCart(title, price, imageSrc) {
    let cartRow = document.createElement('div');
    cartRow.classList.add('cart-row');
    let cartItems = document.getElementsByClassName('cart-items')[0];
    let cartItemNames = cartItems.getElementsByClassName('cart-item-title');
    for(let i = 0; i < cartItemNames.length; i++){
        if(cartItemNames[i].innerText == title){
            alert("This item is already added to the cart");
            return; 
            /**The return statement makes sure that this function ends 
             * and no food-item is added more than one - into the cart
            */
        }
    }
    /**The variable below (with the html), makes it easy to style the 
     * elements added to the cart - the cart rows.
     */
    let cartRowContents = `
    <div class="cart-item cart-column">
        <img src="${imageSrc}" alt="Strawberry smoothie" class="cart-item-image" width="100" height="100">
        <span class="cart-item-title">${title}</span>
    </div>
    <span class="cart-price cart-column">${price}</span>
    <div class="cart-quantity cart-column">
        <input class="cart-quantity-input" type="number" name="quantity" id="" value="1">
        <button class="btn btn-danger" type="button">REMOVE</button>
    </div>
    `
    cartRow.innerHTML = cartRowContents;
    cartItems.append(cartRow);
    /**Now for the user to be able to remove an added item from the cart by clicking on the 'REMOVE' button 
     * and make the input element responsive too - for the added elements.
    */
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem);
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)
}
/**Updates the total price displayed. */
function updateCartTotal(){
    let cartItemContainer = document.getElementsByClassName('cart-items')[0];
    let cartRows = cartItemContainer.getElementsByClassName('cart-row');

    let total = 0;
    for(let i = 0; i < cartRows.length; i++){
        let cartRow = cartRows[i];
        let priceElement = cartRow.getElementsByClassName('cart-price')[0];
        let quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0];
        
        let price = parseFloat(priceElement.innerText.replace('KES', ''));
        let quantity = quantityElement.value;
        total = total + (price * quantity);
    }
    document.getElementsByClassName('cart-total-price')[0].innerText = `KES ${total}`;
}