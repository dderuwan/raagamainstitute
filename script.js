function chengeview() {
  var signInBox = document.getElementById("signInBox");
  var signUpBox = document.getElementById("signUpBox");

  signInBox.classList.toggle("d-none");
  signUpBox.classList.toggle("d-none");
}

function signUp() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var email = document.getElementById("email");
  var password = document.getElementById("password");
  var mobile = document.getElementById("mobile");
  var gender = document.getElementById("gender");

  var f = new FormData();
  f.append("fname", fname.value);
  f.append("lname", lname.value);
  f.append("email", email.value);
  f.append("password", password.value);
  f.append("mobile", mobile.value);
  f.append("gender", gender.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;

      if (text == "success") {
        fname.value = "";
        lname.value = "";
        email.value = "";
        password.value = "";
        mobile.value = "";
        document.getElementById("msg").innerHTML = "";

        chengeview();
      } else {
        document.getElementById("msg").innerHTML = text;
      }
    }
  };
  r.open("POST", "signUpProcess.php", true);
  r.send(f);
}

function signIn() {
  var email = document.getElementById("email2");
  var password = document.getElementById("password2");
  var remember = document.getElementById("remember");
  //alert(remember.checked);

  var from = new FormData();
  from.append("email", email.value);
  from.append("password", password.value);
  from.append("remember", remember.checked);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "home.php";
      } else {
        document.getElementById("msg2").innerHTML = t;
      }
    }
  };

  r.open("POST", "signInProcess.php", true);
  r.send(from);
}

var bm;

function forgotPassword() {
  var email = document.getElementById("email2");

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      if (text == "Success") {
        alert("varification email sent.please check your inbox.");
        var m = document.getElementById("forgetPasswordModal");
        bm = new bootstrap.Modal(m);
        bm.show();
      } else {
        alert(text);
      }
    }
  };
  r.open("GET", "forgotPasswordprocess.php?e=" + email.value, true);
  r.send();
}

function showPassword1() {
  var np = document.getElementById("np");
  var npb = document.getElementById("npb");
  if (npb.innerHTML == "show") {
    np.type = "text";
    npb.innerHTML = "Hide";
  } else {
    np.type = "password";
    npb.innerHTML = "show";
  }
}

function showPassword2() {
  var np = document.getElementById("rnp");
  var npb = document.getElementById("rnpb");
  if (npb.innerHTML == "show") {
    np.type = "text";
    npb.innerHTML = "Hide";
  } else {
    np.type = "password";
    npb.innerHTML = "show";
  }
}

function resetPassword() {
  var e = document.getElementById("email2");
  var np = document.getElementById("np");
  var rnp = document.getElementById("rnp");
  var vc = document.getElementById("vc");

  var from = new FormData();
  from.append("e", e.value);
  from.append("np", np.value);
  from.append("rnp", rnp.value);
  from.append("vc", vc.value);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      if (text == "success") {
        alert("password reset Success");
        bm.hide();
      } else {
        alert(text);
      }
    }
  };

  r.open("POST", "resetPassword.php", true);
  r.send(from);
}

//

function goToAddProduct() {
  window.location = "addproduct.php";
}

// add product

function chengeimg() {
  var image = document.getElementById("imauploader");
  var view = document.getElementById("prev");

  image.onchange = function () {
    var file = this.files[0];
    var url = window.URL.createObjectURL(file);

    view.src = url;
  };
}

function addProduct() {
  var category = document.getElementById("ca");
  var brand = document.getElementById("br");
  var model = document.getElementById("mo");
  var title = document.getElementById("ti");

  var condition;

  if (document.getElementById("bn").checked) {
    condition = "1";
  } else if (document.getElementById("us").checked) {
    condition = "2";
  }

  var colour;

  if (document.getElementById("clr1").checked) {
    colour = "1";
  } else if (document.getElementById("clr2").checked) {
    colour = "2";
  } else if (document.getElementById("clr3").checked) {
    colour = "3";
  } else if (document.getElementById("clr4").checked) {
    colour = "4";
  } else if (document.getElementById("clr5").checked) {
    colour = "5";
  } else if (document.getElementById("clr6").checked) {
    colour = "6";
  }

  var qty = document.getElementById("qty");
  var price = document.getElementById("cost");
  var delevery_within_colombo = document.getElementById("dwc");
  var delevery_outof_colombo = document.getElementById("doc");
  var description = document.getElementById("desc");
  var image = document.getElementById("imauploader");

  //alert(category.value);
  //alert(brand.value);
  //alert(model.value);
  //alert(title.value);
  //alert(condition);
  //alert(colour);
  //alert(qty.value);
  //alert(price.value);
  //alert(delevery_within_colombo.value);
  //alert(delevery_outof_colombo.value);
  //alert(description.value);
  //alert(image.value);

  var from = new FormData();
  from.append("c", category.value);
  from.append("b", brand.value);
  from.append("m", model.value);
  from.append("t", title.value);
  from.append("co", condition);
  from.append("col", colour);
  from.append("qty", qty.value);
  from.append("p", price.value);
  from.append("dwc", delevery_within_colombo.value);
  from.append("doc", delevery_outof_colombo.value);
  from.append("desc", description.value);
  from.append("img", image.files[0]);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      alert(text);
    }
  };

  r.open("POST", "addProductProcess.php", true);
  r.send(from);
}

//home

function signout() {
  alert("are you sure?");
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    var text = r.responseText;

    if (text == "success") {
      window.location = "index.php";
    }
  };

  r.open("GET", "signout.php", true);
  r.send();
}

//home

//add product

function chengeproductview() {
  var add = document.getElementById("addproductbox");
  var update = document.getElementById("updateproductbox");

  add.classList.toggle("d-none");
  update.classList.toggle("d-none");
}

//add product

//userProfile
function updateProfile() {
  var fname = document.getElementById("fname");
  var lname = document.getElementById("lname");
  var mobile = document.getElementById("mobile");
  var line1 = document.getElementById("line1");
  var line2 = document.getElementById("line2");
  var city = document.getElementById("city");
  var img = document.getElementById("profileimg");

  //alert(fname.value);
  //alert(lname.value);
  //alert(mobile.value);
  //alert(line1.value);
  //alert(line2.value);
  //alert(city.value);
  //alert(img.value);

  var f = new FormData();
  f.append("f", fname.value);
  f.append("l", lname.value);
  f.append("m", mobile.value);
  f.append("a1", line1.value);
  f.append("a2", line2.value);
  f.append("c", city.value);
  f.append("i", img.files[0]);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  };

  r.open("POST", "updateProfileProccess.php", true);
  r.send(f);
}
//userProfile

// sellerproductview

function chengeStatus(id) {
  //alert(id);
  //alert("ok");

  var productid = id;
  var statuscheck = document.getElementById("check");
  var checklabel = document.getElementById("checklabel" + productid);

  var status;

  //if (statuscheck.checked) {
  //status = 1;

  //} else {
  //status = 0;
  //}

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
      if (t == "Deactivated") {
        checklabel.innerHTML = "Make your Product Active";
      } else if (t == "Activated") {
        checklabel.innerHTML = "Make your Product Deactive";
      }
    }
  };

  r.open("GET", "statusChengeProcess.php?p=" + productid, true);
  r.send();
}
//delete model
function deleteModel(id) {
  var dm = document.getElementById("deleteModal" + id);
  k = new bootstrap.Modal(dm);
  k.show();
}
//delete model

function deleteProduct(id) {
  var prodctid = id;

  var request = new XMLHttpRequest();

  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var t = request.responseText;
      if (t == "success") {
        k.hide();
      }
    }
  };

  request.open("GET", "deleteproductprocess.php?id=" + prodctid, true);
  request.send();
}

function addfilter() {
  var search = document.getElementById("s");

  var age;

  if (document.getElementById("n").checked) {
    age = 1;
  } else if (document.getElementById("o").checked) {
    age = 2;
  } else {
    age = 0;
  }

  var qty;

  if (document.getElementById("l").checked) {
    qty = 1;
  } else if (document.getElementById("h").checked) {
    qty = 2;
  } else {
    qty = 0;
  }

  var condition;

  if (document.getElementById("b").checked) {
    condition = 1;
  } else if (document.getElementById("u").checked) {
    condition = 2;
  } else {
    condition = 0;
  }

  //alert(search.value);
  //alert(age);
  //alert(qty);
  //alert(condition);

  var f = new FormData();
  f.append("s", search.value);
  f.append("a", age);
  f.append("q", qty);
  f.append("c", condition);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      //alert(t);
      var arr = JSON.parse(t);
      for (var i = 0; i < arr.length; i++) {
        var row = arr[i];
        alert(row["title"]);
      }
    }
  };
  r.open("POST", "filterProcess.php", true);
  r.send(f);
}

// sellerproductview

// update product

function searchToUpdate() {
  var id = document.getElementById("searchToUpdate").value;
  var title = document.getElementById("ti");

  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      alert(text);

      var object = JSON.parse(text);
      alert(object["title"]);
      title.value = object["title"];
    }
  };
  request.open("GET", "searchToUpdateProcess.php?id=" + id, true);
  request.send();
}

// update product

//send id to update

function sendid(id) {
  var id = id;
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      //alert(t);

      if (t == "success") {
        //alert("ok");
        window.location = "updateProduct.php";
      }
    }
  };

  r.open("GET", "sendProductProcess.php?id=" + id, true);
  r.send();
}

//send id to update

//update product

function productUpload() {
  var title = document.getElementById("ti");
  var qty = document.getElementById("qty");
  var delevery_within_colombo = document.getElementById("dwc");
  var delevery_outof_colombo = document.getElementById("doc");
  var description = document.getElementById("desc");
  var image = document.getElementById("imauploader");

  //alert(ti.value);
  //alert(qty.value);
  //alert(delevery_within_colombo.value);
  //alert(delevery_outof_colombo.value);
  //alert(description.value);
  //alert(image.value);

  var form = new FormData();
  form.append("t", title.value);
  form.append("qty", qty.value);
  form.append("dwc", delevery_within_colombo.value);
  form.append("doc", delevery_outof_colombo.value);
  form.append("desc", description.value);
  form.append("img", image.files[0]);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      alert(text);
    }
  };

  r.open("POST", "updateProductProcess.php", true);
  r.send(form);
}

//update product

//single Product View
function loadminimg() {
  alert("ok");

  var img = document.getElementById("pimg" + pid).src;
  var mainimg = document.getElementById("maining");
  mainimg.style.backgroundImage = "url(" + img + ")";

  //alert(img);
}
//qty update
function qty_inc(qty) {
  var pqty = qty;
  var input = document.getElementById("qtyinput");

  if (input.value < qty) {
    var newvalue = parseInt(input.value) + 1;
    input.value = newvalue.toString();
  } else {
    alert("maximen quantity count has been achieved.");
  }
}

function qty_dec() {
  var input = document.getElementById("qtyinput");

  if (input.value > 1) {
    var newvalue = parseInt(input.value) - 1;

    input.value = newvalue.toString();
  } else {
    alert("Minimum quantity count has been achieved.");
  }
}
//qty update
//single product view

// home
// basic search

function basicSearch(x) {
  var page = x;
  var searchText = document.getElementById("basic_search_text").value;
  var searchSelect = document.getElementById("basic_search_category").value;
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "empty") {
        window.location = "home.php";
      } else {
        document.getElementById("product_view_div").innerHTML = t;
      }
    }
  };

  r.open(
    "GET",
    "basicSearchProccess.php?t=" +
      searchText +
      "&s=" +
      searchSelect +
      "&p=" +
      page,
    true
  );
  r.send();
}

// addTowatchlist
function addTowatchlist(id) {
  var pid = id;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "watchlist.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addToWatchlistProcess.php?id=" + pid, true);
  r.send();
}
// home

//watchlist

function deletefromwatchlist(id) {
  //alert(id);

  var wid = id;
  var request = new XMLHttpRequest();
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      var text = request.responseText;
      //alert(text);
      if (text == "success") {
        window.location = "watchlist.php";
      } else {
        alert(t);
      }
    }
  };

  request.open("GET", "removewatchlistitemprocess.php?id=" + wid, true);
  request.send();
}

//watchlist

//home addtocart

function addToCart(id) {
  var qtytxt = document.getElementById("qtytxt" + id).value;
  var pid = id;

  //alert(qtytxt);
  //alert(pid);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        window.location = "cart.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "addToCartProcess.php?id=" + pid + "&txt=" + qtytxt, true);
  r.send();
}

//home

// deleteFromCart

function deleteFromCart(id) {
  var cid = id;
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {
        window.location = "cart.php";
      }
    }
  };
  r.open("GET", "deleteFromCardProcess.php?id=" + cid, true);
  r.send();
}

// deleteFromCart

//paynow

function paynow(id) {
  //alert(id);
  var qty = document.getElementById("qtyinput").value;
  //alert(qty);
  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      var obj = JSON.parse(t);

      var mail = obj["email"];
      var amount = obj["amount"];

      if (t == "a") {
        alert("Please Sign in first.");
        window.location = "index.php";
      } else if (t == "b") {
        alert("Please Update your profile First.");
        window.location = "userprofile.php";
      } else {
        // Called when user completed the payment. It can be a successful payment or failure
        payhere.onCompleted = function onCompleted(orderId) {
          console.log("Payment completed. OrderID:" + orderId);
          saveInvoice(orderId, id, mail, amount, qty);
          //Note: validate the payment and show success or failure page to the customer
        };

        // Called when user closes the payment without completing
        payhere.onDismissed = function onDismissed() {
          //Note: Prompt user to pay again or show an error page
          console.log("Payment dismissed");
        };

        // Called when error happens when initializing payment such as invalid parameters
        payhere.onError = function onError(error) {
          // Note: show an error page
          console.log("Error:" + error);
        };

        // Put the payment variables here
        var payment = {
          sandbox: true,
          merchant_id: "1217932", // Replace your Merchant ID
          return_url: "http://localhost/eshop/singleProductVeiw.php?id=" + id, // Important
          cancel_url: "http://localhost/eshop/singleProductVeiw.php?id=" + id, // Important
          notify_url: "http://sample.com/notify",
          order_id: obj["id"],
          items: obj["item"],
          amount: amount + ".00",
          currency: "LKR",
          first_name: obj["fname"],
          last_name: obj["lname"],
          email: mail,
          phone: obj["mobile"],
          address: obj["address"],
          city: obj["city"],
          country: "Sri Lanka",
          delivery_address: "No. 46, Galle road, Kalutara South",
          delivery_city: "Kalutara",
          delivery_country: "Sri Lanka",
          custom_1: "",
          custom_2: "",
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked

        payhere.startPayment(payment);
      }
    }
  };

  r.open("GET", "buynowprocess.php?id=" + id + "&qty=" + qty, true);
  r.send();
}

function saveInvoice(orderId, id, mail, amount, qty) {
  //alert("okkk");
  var orderid = orderId;
  var pid = id;
  var email = mail;
  var total = amount;
  var pqty = qty;

  //alert(orderid);
  //alert(pid);
  //alert(email);
  //alert(total);
  //alert(pqty);

  var f = new FormData();
  f.append("oid", orderid);
  f.append("pid", pid);
  f.append("email", email);
  f.append("total", total);
  f.append("pqty", pqty);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "1") {
        window.location = "invoice.php?id=" + orderid;
      }
    }
  };
  r.open("POST", "saveInvoice.php", true);
  r.send(f);
}

//paynow

//cart detail model

function detailsmodel(id) {
  alert(id);
}

function printDiv() {
  var restorepage = document.body.innerHTML;
  var page = document.getElementById("GFG").innerHTML;
  document.body.innerHTML = page;
  window.print();
  document.body.innerHTML = restorepage;
}

// feedback

function feedback(id) {
  var feedmodel = document.getElementById("feedbackModal" + id);
  k = new bootstrap.Modal(feedmodel);
  k.show();
}

//feedback

//savefeedback

function savefeedback(id) {
  var pid = id;
  var feedtxt = document.getElementById("feedtxt").value;

  var f = new FormData();
  f.append("i", pid);
  f.append("ft", feedtxt);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == 1) {
        k.hide();
      }
    }
  };

  r.open("POST", "saveFeedbackProcess.php", true);
  r.send(f);
}

//savefeedback

//admin sign in

function adminverification() {
  var e = document.getElementById("e").value;

  var f = new FormData();
  f.append("e", e);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {
        var verificationmodel = document.getElementById("varificationmodel");
        k = new bootstrap.Modal(verificationmodel);
        k.show();
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "adminverificationprocess.php", true);
  r.send(f);
}

function varify() {
  var verificationcode = document.getElementById("v").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success") {
        k.hide();
        window.location = "adminpanel.php";
      } else {
        alert(t);
      }
    }
  };

  r.open("GET", "verificationprocess.php?v=" + verificationcode, true);
  r.send();
}

//admin sign in

//manage users
function blockuser(email) {
  //alert("ok");
  var mail = email;
  var blockbtn = document.getElementById("blockbtn" + mail);

  var f = new FormData();
  f.append("e", mail);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "Success1") {
        window.location = "manageusers.php";
        blockbtn.className = "btn btn-success";
        blockbtn.innerHTML = "Unblock";
      } else if (t == "Success2") {
        window.location = "manageusers.php";
        blockbtn.className = "btn btn-danger";
        blockbtn.innerHTML = "Block";
      }
    }
  };

  r.open("POST", "userBlockProcess.php", true);
  r.send(f);
}

function searchUser() {
  var text = document.getElementById("searchtxt").value;

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success") {
        window.location = "manageusers.php";
      } else {
        alert(t);
      }
    }
  };
  r.open("GET", "searchuser.php?s=" + text, true);
  r.send();
}

//manage users

//advanceSearch

function advanceSearch() {
  //alert("ok");

  var keyword = document.getElementById("k").value;

  var category = document.getElementById("c").value;

  var brand = document.getElementById("b").value;

  var model = document.getElementById("m").value;

  var condition = document.getElementById("con").value;

  var color = document.getElementById("clr").value;

  var pricefrom = document.getElementById("pf").value;

  var priceto = document.getElementById("pt").value;

  var f = new FormData();
  f.append("k", keyword);
  f.append("c", category);
  f.append("b", brand);
  f.append("m", model);
  f.append("con", condition);
  f.append("clr", color);
  f.append("pf", pricefrom);
  f.append("pt", priceto);

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  };
  r.open("POST", "advanceSearchProcess.php", true);
  r.send(f);
}

//dailyselling

function dailyselling() {
  var from = document.getElementById("fromdate").value;
  var to = document.getElementById("todate").value;
  var link = document.getElementById("historylink");

  link.href = "productsellinghistory.php?f=" + from + "&t=" + to;
}

//dailyselling

//viewmsgmodal

function viewmsgmodal() {
  var pop = document.getElementById("msmodal");

  k = new bootstrap.Modal(pop);
  k.show();
}

//viewmsgmodal

function addnewmodel() {
  var pop = document.getElementById("addnewmodal");

  k = new bootstrap.Modal(pop);
  k.show();
}

function savecategory() {
  var txt = document.getElementById("categorytxt").value;
  //alert(txt);
  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      alert(t);
    }
  };
  r.open("GET", "addNewCategoryProcess.php?t=" + txt, true);
  r.send();
}

//msg send
// sendmessage

function sendmessage(mail) {
  var email = mail;
  var msgtxt = document.getElementById("msgtxt").value;
  //alert(email);
  //alert(msgtxt);

  var f = new FormData();
  f.append("e", email);
  f.append("t", msgtxt);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      if (t == "success") {
        alert("Message Sent Successfully");
      } else {
        alert(t);
      }
    }
  };

  r.open("POST", "sendmessageprocess.php", true);
  r.send(f);
}

// refresher

function refresher(email) {
  setInterval(refreshmsgare(email), 500);
  setInterval(refreshrecentarea, 500);
}

// refres msg view area

function refreshmsgare(mail) {
  var chatrow = document.getElementById("chatrow");
  //alert(chatrow);

  var f = new FormData();
  f.append("e", mail);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;

      chatrow.innerHTML = t;
    }
  };

  r.open("POST", "refreshmsgareaprocess.php", true);
  r.send(f);
}

// refreshrecentarea

function refreshrecentarea() {
  var rcv = document.getElementById("rcv");
  //alert(rcv.value);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      rcv.innerHTML = t;
    }
  };

  r.open("POST", "refreshrecentareaprocess.php", true);
  r.send();
}

//msg send

//block poduct

function blockproduct(id) {
  var id = id;
  var blockbtn = document.getElementById("blockbtn" + id);

  var f = new FormData();
  f.append("id", id);

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "success1") {
        window.location = "manageproduct.php";
        blockbtn.className = "btn btn-success";
        blockbtn.innerHTML = "Unblock";
      } else if (t == "success2") {
        window.location = "manageproduct.php";
        blockbtn.className = "btn btn-danger";
        blockbtn.innerHTML = "Block";
      }
    }
  };

  r.open("POST", "productBlockProcess.php", true);
  r.send(f);
}

function addnewmodal() {
  var pop = document.getElementById("addnewmodal");

  k = new bootstrap.Modal(pop);
  k.show();
}

function savecategory() {
  var txt = document.getElementById("categorytxt").value;

  var r = new XMLHttpRequest();

  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var t = r.responseText;
      if (t == "sucess") {
        k.hide();
        alert("Category saved successfully.");
        window.location = "manageproduct.php";
      }
    }
  };

  r.open("GET", "addNewcategoryProcess.php?t=" + txt, true);
  r.send();
}

function singleviewmodal(id) {
  var pop = document.getElementById("singleproductview" + id);

  k = new bootstrap.Modal(pop);
  k.show();
}

//advancedSearch

function advancedSearch(x) {
  // alert(x);
  // var x = 1;
  var s = document.getElementById("s1").value;
  var ca = document.getElementById("ca1").value;
  var br = document.getElementById("br1").value;
  var mo = document.getElementById("mo1").value;
  var co = document.getElementById("co1").value;
  var col = document.getElementById("col1").value;
  var prif = document.getElementById("prif1").value;
  var prit = document.getElementById("prit2").value;
  var sort = document.getElementById("sort").value;

  // alert(s);
  // alert(ca);
  // alert(br);
  // alert(mo);
  // alert(co);
  // alert(col);
  // alert(prif);
  // alert(prit);

  var form = new FormData();
  form.append("page", x);
  form.append("s", s);
  form.append("c", ca);
  form.append("b", br);
  form.append("m", mo);
  form.append("co", co);
  form.append("col", col);
  form.append("prif", prif);
  form.append("prit", prit);
  form.append("sort", sort);

  var r = new XMLHttpRequest();
  r.onreadystatechange = function () {
    if (r.readyState == 4) {
      var text = r.responseText;
      //
      document.getElementById("filter").innerHTML = text;
    }
  };
  r.open("POST", "advancedSearchpro.php", true);
  r.send(form);
}

//advancedSearch

//cart go

function cartGo() {
  window.location = "cart.php";
}
