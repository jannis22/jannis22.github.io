var ShoppingCart = (function($) {
  "use strict";
  
  // Cahce necesarry DOM Elements
  var productsEl = document.querySelector(".products"),
      cartEl =     document.querySelector(".shopping-cart-list"),
      productQuantityEl = document.querySelector(".product-quantity"),
      emptyCartEl = document.querySelector(".empty-cart-btn"),
      cartCheckoutEl = document.querySelector(".cart-checkout"),
      totalPriceEl = document.querySelector(".total-price");
  
  // Fake JSON data array here should be API call
  var products = [
    {
      id: 0,
      name: "Bollerwagen „Maxi“ aus Holz und Metall, mit Gummibereifung",
      description: "Ein Ausflug der ist lustig, ein Ausflug der ist schön! Mit diesem wunderbaren Bollerwagen Maxi aus Holz geht es nicht nur über Stock und Stein, sondern auch ganz bequem zu größeren Einkäufen. Er bietet sogar Platz für zwei nebeneinander stehende Getränkekisten, damit die Picknickgesellschaft auch ausreichend versorgt ist.",
      imageUrl: "https://jannis22.github.io/img/718bqVfg11L._SL1500_.jpg",
      price: 99,
    },
    {
      id: 1,
      name: "Feiyue Classic Weiß Kung Fu Parkour Wushu",
      description: "Ursprünglich für den Kampfsport konzipiert, wurden diese Sneaker / Canvas-Schuhe zu einer perfekten Wahl für Ihre alltäglichen Bedürfnisse. Das Modell verfügt über eine 100% flexible Gummiharzsohle für breite und komfortable Bewegungen. Seit fast 100 Jahren manuell hergestellt.",
      imageUrl: "https://jannis22.github.io/img/51c5neB+suL._SL1100_.jpg",
      price: 149,
    },
    {
      id: 2,
      name: "Enuff Logo Stain Skateboard Komplettboard",
      description: "Das Enuff Skateboard kommt mit robusten Achsen und härteren Bushings, welches für mehr Fahrstabilität sorgt. Das Enuff Logo Stain Deck besteht zu 100% aus Kanadischem Ahorn und wurde heiß mit American Stiff-Glue verleimt.",
      imageUrl: "https://jannis22.github.io/img/enuff-logo-stain-complete-skateboard-c2.jpg",
      price: 249,
    },
    {
      id: 3,
      name: "Lixada Schwebende Schuh",
      description: "Der Hover-Schuh verfügt über einen 250-W-Motor in jedem Rad, der bei voller Geschwindigkeit bis zu 10 km mit einer Höchstgeschwindigkeit von 12 km / h fahren kann. Die Fußplatten sind rutschfest und können ein Maximalgewicht von 130kg tragen. Die kompakte Größe und das geringe Gewicht machen die Schuhe sehr bequem überall hin mitzunehmen.",
      imageUrl: "https://jannis22.github.io/img/614LOfvt-CL._SL1000_.jpg",
      price: 999,
    },
    {
      id: 4,
      name: "E-Bike",
      description: "Das Genesis Transformer Electric Bike macht das Radfahren einfach. Erreichen Sie Ihre Ziele mit einer Geschwindigkeit von bis zu 30 km / h und bis zu 24 km / h. Dank seines leichten Rahmens aus Aluminiumlegierung ist dieses faltbare Elektrofahrrad leicht zu transportieren und aufzubewahren.",
      imageUrl: "https://jannis22.github.io/img/Transformer-Orange-2.jpg",
      price: 599
    }
  ],
      productsInCart = [];
  
  // Pretty much self explanatory function. NOTE: Here I have used template strings (ES6 Feature)
  var generateProductList = function() {
    products.forEach(function(item) {
      var productEl = document.createElement("div");
      productEl.className = "product";
      productEl.innerHTML = `<div class="product-image">
                                <img src="${item.imageUrl}" alt="${item.name}">
                             </div>
                             <div class="product-name"><span>Produkt:</span> ${item.name}</div>
                             <div class="product-description"><span>Beschreibung:</span> ${item.description}</div>
                             <div class="product-price"><span>Preis:</span> ${item.price} €</div>
                             <div class="product-add-to-cart">
                               <a href="#0" class="button see-more">Mehr Details</a>
                               <a href="#0" class="button add-to-cart" data-id=${item.id}>Zum Warenkorb</a>
                             </div>
                          </div>
`;
                             
productsEl.appendChild(productEl);
    });
  }
  
  // Like one before and I have also used ES6 template strings
  var generateCartList = function() {
    
    cartEl.innerHTML = "";
    
    productsInCart.forEach(function(item) {
      var li = document.createElement("li");
      li.innerHTML = `${item.quantity} ${item.product.name} - €${item.product.price * item.quantity}`;
      cartEl.appendChild(li);
    });
    
    productQuantityEl.innerHTML = productsInCart.length;
    
    generateCartButtons()
  }
  
  
  // Function that generates Empty Cart and Checkout buttons based on condition that checks if productsInCart array is empty
  var generateCartButtons = function() {
    if(productsInCart.length > 0) {
      emptyCartEl.style.display = "block";
      cartCheckoutEl.style.display = "block"
      totalPriceEl.innerHTML = "€ " + calculateTotalPrice();
    } else {
      emptyCartEl.style.display = "none";
      cartCheckoutEl.style.display = "none";
    }
  }
  
  // Setting up listeners for click event on all products and Empty Cart button as well
  var setupListeners = function() {
    productsEl.addEventListener("click", function(event) {
      var el = event.target;
      if(el.classList.contains("add-to-cart")) {
       var elId = el.dataset.id;
       addToCart(elId);
      }
    });
    
    emptyCartEl.addEventListener("click", function(event) {
      if(confirm("Bist du dir sicher?")) {
        productsInCart = [];
      }
      generateCartList();
    });
  }
  
  // Adds new items or updates existing one in productsInCart array
  var addToCart = function(id) {
    var obj = products[id];
    if(productsInCart.length === 0 || productFound(obj.id) === undefined) {
      productsInCart.push({product: obj, quantity: 1});
    } else {
      productsInCart.forEach(function(item) {
        if(item.product.id === obj.id) {
          item.quantity++;
        }
      });
    }
    generateCartList();
  }
  
  
  // This function checks if project is already in productsInCart array
  var productFound = function(productId) {
    return productsInCart.find(function(item) {
      return item.product.id === productId;
    });
  }

  var calculateTotalPrice = function() {
    return productsInCart.reduce(function(total, item) {
      return total + (item.product.price *  item.quantity);
    }, 0);
  }
  
  // This functon starts the whole application
  var init = function() {
    generateProductList();
    setupListeners();
  }
  
  // Exposes just init function to public, everything else is private
  return {
    init: init
  };
  
  // I have included jQuery although I haven't used it
})(jQuery);

ShoppingCart.init();