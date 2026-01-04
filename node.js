let pro = document.getElementById("products");

const requestOptions = {
  method: "GET",
  redirect: "follow",
};

fetch("http://localhost/ninthDay/getProduct.php", requestOptions)
  .then((response) => response.json())
  .then((result) => {
    console.log(result);
    renderProducts(result);
  })
  .catch((error) => console.error(error));

function renderProducts(result) {
  result.forEach((timeProduct) => {
    pro.innerHTML += `
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="my-product-card">
                    <img src="${timeProduct.images}" alt="full image" width="300px">
                    <div class="product-name">
                        <h3 style="color: rgb(241, 128, 8);">${timeProduct.name}</h3>
                    </div>
                    <div class="product-description">
                        <p>${timeProduct.description}</p>
                    </div>
                    <div class="product-volume">
                        <h4 style="font-size: 17px;">${timeProduct.volume}</h4>
                    </div>
                    <div class="product-price">
                        <h3>${timeProduct.price}
                            <img src="images/Saudi_Riyal_Symbol-1-3.png" alt='full'
                                style="width:20px; height:auto; vertical-align: middle; ">
                            </h3>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-secondary add-to-cart"
                        data-id="${timeProduct.id}"
                        data-name="${timeProduct.name}"
                        data-price="${timeProduct.price}"
                        data-image="${timeProduct.images}">اشترِ الآن</button>   
                    </div>
                </div>
            </div>`;
  });
}

const addToCartButtons = document.querySelectorAll(".add-to-cart");
const cartCountSpan = document.getElementById("cart-count");

let cartItems = JSON.parse(localStorage.getItem("cart")) || [];

function updateCartCount() {
  let totalQuantity = cartItems.reduce((sum, item) => sum + (item.quantity || 1),0);
  cartCountSpan.textContent = totalQuantity;
}

updateCartCount();

document.getElementById("products").addEventListener("click", function(e) {
    if(e.target.classList.contains("add-to-cart")){
        console.log("زر تم الضغط عليه:", e.target);
        
        const button = e.target;
        const name = button.dataset.name;
        const price = button.dataset.price;
        const image = button.dataset.image;

        const existingIndex = cartItems.findIndex((item) => item.name === name);

        if (existingIndex > -1) {
            cartItems[existingIndex].quantity =
            (cartItems[existingIndex].quantity || 1) + 1;
        } else {
            cartItems.push({ name, price, image, quantity: 1 });
        }

        localStorage.setItem("cart", JSON.stringify(cartItems));
        updateCartCount();

        const toast = document.getElementById("add-toast");
        if (toast) {
            toast.innerHTML = "🛒✨ تمت إضافة المنتج!";
            toast.style.display = "block";
            setTimeout(() => {
                toast.style.display = "none";
            }, 2000);
        }
    }
});