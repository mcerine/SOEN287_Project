function expand() {
  var x = document.getElementById("expand");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

  
  var y = document.getElementById("reverse");
  if (y.innerHTML === "Detailed Description ▼") {
    y.innerHTML = "Detailed Description ▲";
  } else {
    y.innerHTML = "Detailed Description ▼";
  }
}

function icedcoffee() {
	var icedcoffee = document.getElementById("ic").value;
	localStorage.setItem("ic",icedcoffee);
	var totalprice = 0.99 * icedcoffee;
	localStorage.setItem("tp",totalprice.toFixed(2));
}

  
var subtractFromCart = document.getElementsByClassName("subtract")
var addToCart = document.getElementsByClassName("add")
var deleteFromCart = document.getElementsByClassName("delete")
console.log(subtractFromCart)
console.log(addToCart)
console.log(deleteFromCart)

for(var i=0; i<deleteFromCart.length; i++){
    var button = deleteFromCart[i]
    button.addEventListener("click", function(event){
        var buttonClicked = event.target
        var row =buttonClicked.parentNode.parentNode.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateSubtotal()
    })
}

for(var i=0; i<subtractFromCart.length; i++){
    var button = subtractFromCart[i]
    button.addEventListener("click", function(event){
        var buttonClicked = event.target 
        var tdQuantity = parseFloat((this).parentElement.parentElement.childNodes[2].innerText)
        var quantityWrite=(this).parentElement.parentElement.childNodes[2]
        if (tdQuantity==0){
            return
        }
        else {
            tdQuantity--
            quantityWrite.innerText=tdQuantity
            updateSubtotal()
        }
    })

}

for(var i=0; i<addToCart.length; i++){
    var button = addToCart[i]
    button.addEventListener("click", function(event){
        var buttonClicked = event.target 
        var tdQuantity = parseFloat((this).parentElement.parentElement.childNodes[2].innerText)
        var quantityWrite=(this).parentElement.parentElement.childNodes[2]
        if (tdQuantity==6){
          return
      }
      else {
        tdQuantity++
        quantityWrite.innerText=tdQuantity
        updateSubtotal()
      }
            
    })

}

function updateSubtotal(){
    var itemPrice = document.getElementsByClassName("costperitem")
    var itemQuantity = document.getElementsByClassName("itemquantity")
    var itemSubtotal = document.getElementsByClassName("price")
    var subtotal = 0
    for (var i=0; i<itemPrice.length;i++){
        itemPrice[i]
        itemQuantity[i]
        var tempPrice = parseFloat(itemPrice[i].innerText.replace(/[^\d.-]/g,""))
        var tempQuantity = parseFloat(itemQuantity[i].innerText)
        itemSubtotal[i].innerText="$"+(tempPrice*tempQuantity).toFixed(2)
        subtotal =subtotal+ (tempPrice*tempQuantity)
    }
    document.getElementsByClassName("cartsubtotal")[0].innerText="$"+subtotal.toFixed(2)
    document.getElementsByClassName("cartgst")[0].innerText="$"+(subtotal*0.05).toFixed(2)
    document.getElementsByClassName("cartqst")[0].innerText="$"+(subtotal*0.1).toFixed(2)
    document.getElementsByClassName("carttotal")[0].innerText="$"+(subtotal*1.15).toFixed(2)
}

document.getElementsByClassName("continueShopping")[0].onclick = function(){
location.href="index.html"
}
