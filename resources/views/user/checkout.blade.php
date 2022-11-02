@extends('user.layout')
@section('title')
Checkout
@endsection
@section('link')
<link rel="stylesheet" href="{{ asset('admin-assets/dist/css/checkout.css') }}" />
@endsection
@section('content')
<section class="checkout container-lg my-4 my-lg-5" ng-controller="CheckoutCtrl">
  <div class="modal fade" id="OrderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Order successfully</h5>
            <a href="#/!" class="btn-close" onClick="$('.modal').modal('hide')" aria-label="Close"></a>
          </div>
          <div class="modal-body">
              Thanks for your order. It will be deliveried to you around 2-4 days.
          </div>
          <div class="modal-footer">
            <a href="#/!" class="btn btn-secondary" onClick="$('.modal').modal('hide')">Close</a>
          </div>
        </div>
      </div>
    </div>
  <div class="row">
      <div class="col-lg-4 order-summary p-3">
          <h2>Order Summary</h2>
          <div class="product-info">
              <div class="product-info p-2 p-lg-4 d-flex align-items-center justify-content-between" >
                  <img src="/admin-assets/dist/img/product/{{$pro->img_url}}" alt="">
                  <div class="product-detail px-2 px-md-3">
                      <p class="mb-1 mb-md-2">{{$pro->name}}</p>
                      <div class="quantity mb-1 mb-md-2">
                          <p>x <b>6</b></p>
                      </div>
                      <div class="price">
                          <div class="new-price">$<b> 16</b></div>
                          <div class="old-price">$<b> 26</b></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="product-calculate mb-3">
              <div class="d-flex justify-content-between">
                  <p class="title">Subtotal</p>
                  <p class="result">$ <b>16</b></p>
              </div>
              <div class="d-flex justify-content-between">
                  <p class="tax">Tax</p>
                  <p class="result">10% x <b>16</b></p>
              </div>
              <div class="d-flex justify-content-between">
                  <p class="title">Shipping</p>
                  <p class="result">$5</p>
              </div>
          </div>
          <div class="product-total">
              <div class="d-flex justify-content-between">
                  <p class="title">Total</p>
                  <p class="result">$ <b>36</b></p>
              </div>
          </div>
      </div>
      <div class="col-lg-8">
          <form name="myForm" class="myForm" onsubmit="return">
              <div class="billing-info mb-lg-5 mb-3">
                  <div class="d-flex align-items-center justify-content-between mb-4">
                      <h2>Billing info</h2>
                      <span class="step">Step 1 of 4</span>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 pe-lg-5">
                          <div class="form-group mb-4">
                              <p>First name <span class="required">*</span></p>
                              <input name="uFirstName" type="text" class="w-100" placeholder="Enter your first name" required autofocus pattern="[a-zA-Z ]{2,30}" ng-model="firstName">
                          </div>
                          <div class="erInput text-right">
                              <span class="error" ng-show="myForm.uFirstName.$touched && myForm.uFirstName.$error.required">First name must be required</span>
                          </div>

                          <div class="form-group mb-4">
                              <p>Email <span class="required">*</span></p>
                              <input type="email" class="w-100" name="uemail" placeholder="Enter your email" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" ng-model="email">
                          </div>
                          <div class="erInput text-right">
                              <span class="error d-block" ng-show="myForm.uemail.$touched && myForm.uemail.$error.required">Email must be required</span>
                              <span class="error d-block" ng-show="myForm.uemail.$touched && myForm.uemail.$invalid">Please enter a valid email</span>
                          </div>


                          <div class="form-group mb-4">
                              <p>Address <span class="required">*</span></p>
                              <input type="text" class="w-100" name="uAddr" ng-model="uAddr" ng-minlength="10" placeholder="Enter your address" required>
                          </div>
                          <div class="erInput text-right">
                              <span class="error" ng-show="myForm.uAddr.$touched && myForm.uAddr.$error.required">Address must be required</span>
                              <span class="error" ng-show="myForm.uAddr.$touched && myForm.uAddr.$error.minlength">Address minimum 10 symbols</span>
                          </div>

                          <div class="form-group mb-4">
                              <p>Province/City</p>
                              <select name="provinceCity" class="w-100">
                                  <option value="Choose a province or city">Choose a province or city</option>
                                  <option value="province-name" ng-repeat="province in provinces"><b>=> Provice Name</b></option>
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-6 pe-lg-5">
                          <div class="form-group mb-4">
                              <p>Last name <span class="required">*</span></p>
                              <input type="text" class="w-100" name="uLastName" placeholder="Enter your last name" required pattern="[a-zA-Z ]{2,50}" ng-model="lastName">
                          </div>
                          <div class="erInput text-right">
                              <span class="error" ng-show="myForm.uLastName.$touched && myForm.uLastName.$error.required">Last name must be required</span>
                          </div>
                          <div class="form-group mb-4">
                              <p>Phone <span class="required">*</span></p>
                              <input type="text" class="w-100" name="uPhone" ng-model="uPhone" ng-minlength="10" placeholder="Enter your phone number" required pattern="[0-9 ]{10,14}">
                          </div>
                          <div class="erInput text-right">
                              <span class="error d-block" ng-show="myForm.uPhone.$touched && myForm.uPhone.$error.required">Phone must be required</span>
                              <span class="error d-block" ng-show="myForm.uPhone.$touched && myForm.uPhone.$error.minlength">Phone minimum 10 digits</span>
                              <span class="error d-block" ng-show="myForm.uPhone.$touched && myForm.uPhone.$invalid">Please enter a valid phone number</span>
                          </div>

                          <div class="form-group mb-4">
                              <p>Zip/Postal</p>
                              <input type="text" class="w-100" placeholder="Enter zip or postal">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="trigger-ship d-flex align-items-center mb-3">
                  <label class="container-filter d-flex align-items-center m-2">
                      <span class="brand-name" data-bs-toggle="collapse" data-bs-target="#collapseShipping" aria-expanded="false" aria-controls="collapseShipping">Ship to a different address?</span>
                      <input type="checkbox">
                      <span class="checkmark"></span>
                  </label>
              </div>
              <div class="billing-info ship-to-different-address mb-lg-5 mb-3 collapse" id="collapseShipping">
                  <div class="row">
                      <div class="col-lg-6 pe-lg-5">
                          <div class="form-group mb-4">
                              <p>Phone</p>
                              <input type="text" class="w-100" placeholder="Enter your phone number">
                          </div>
                          <div class="form-group mb-4">
                              <p>Address</p>
                              <input type="text" class="w-100" placeholder="Enter your address">
                          </div>
                          <div class="form-group mb-4">
                              <p>Province/City</p>
                              <select name="provinceCity" id="" class="w-100">
                                  <option value="Choose a province or city">Choose a province or city</option>
                                  <option value="province_name" ng-repeat="province in provinces"><b>=>Province Name</b></option>
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-6 pe-lg-5">
                          <div class="form-group mb-4">
                              <p>Zip/Postal</p>
                              <input type="text" class="w-100" placeholder="Enter zip or postal">
                          </div>
                      </div>
                  </div>
              </div>
              <div class="payment-method mb-lg-5 mb-3">
                  <div class="d-flex align-items-center justify-content-between mb-4">
                      <h2>Payment method</h2>
                      <span class="step">Step 2 of 4</span>
                  </div>
                  <label class="container-filter d-flex align-items-center">
                      <span class="brand-name">Payment on delivery</span>
                      <input type="radio" name="payment" checked="checked">
                      <span class="checkmark"></span>
                  </label>
                  <label class="container-filter d-flex align-items-center">
                      <img src="imgs/visa.png" alt="" data-bs-toggle="collapse" data-bs-target="#collapseVisa" aria-expanded="false" aria-controls="collapseVisa">
                      <input type="radio" name="payment">
                      <span class="checkmark"></span>
                  </label>
                  <div class="collapse" id="collapseVisa">
                      <div class="row">
                          <div class="col-lg-6 pe-lg-5">
                              <div class="form-group mb-4">
                                  <p>Cart number</p>
                                  <input type="text" class="w-100" placeholder="Enter your card number">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6 pe-lg-5">
                              <div class="form-group mb-4">
                                  <p>Cart holder</p>
                                  <input type="text" class="w-100" placeholder="Enter your card holder">
                              </div>
                          </div>
                          <div class="col-lg-3 pe-lg-5">
                              <div class="form-group mb-4">
                                  <p>Expiration date</p>
                                  <input type="text" class="w-100" placeholder="DD/MM/YY">
                              </div>
                          </div>
                          <div class="col-lg-3 pe-lg-5">
                              <div class="form-group mb-4">
                                  <p>CVC</p>
                                  <input type="text" class="w-100" placeholder="Enter CVC">
                              </div>
                          </div>
                      </div>
                  </div>
                  <label class="container-filter d-flex align-items-center">
                      <img src="imgs/paypal.png" alt="" data-bs-toggle="collapse" data-bs-target="#collapsePaypal" aria-expanded="false" aria-controls="collapsePaypal">
                      <input type="radio" name="payment">
                      <span class="checkmark"></span>
                  </label>
                  <div class="collapse" id="collapsePaypal">
                      <div class="row">
                          <div class="col-lg-6 pe-lg-5">
                              <div class="form-group mb-4">
                                  <p>Cart number</p>
                                  <input type="text" class="w-100" placeholder="Enter your card number">
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6 pe-lg-5">
                              <div class="form-group mb-4">
                                  <p>Cart holder</p>
                                  <input type="text" class="w-100" placeholder="Enter your card holder">
                              </div>
                          </div>
                          <div class="col-lg-3 pe-lg-5">
                              <div class="form-group mb-4">
                                  <p>Expiration date</p>
                                  <input type="text" class="w-100" placeholder="DD/MM/YY">
                              </div>
                          </div>
                          <div class="col-lg-3 pe-lg-5">
                              <div class="form-group mb-4">
                                  <p>CVC</p>
                                  <input type="text" class="w-100" placeholder="Enter CVC">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="order-notes mb-lg-5 mb-3">
                  <div class="mb-4">
                      <div class="d-flex align-items-center justify-content-between">
                          <h2>Order notes</h2>
                          <span class="step">Step 3 of 4</span>
                      </div>
                      <span class="sub-note">Need something else? We will make it for you!</span>
                  </div>
                  <textarea class="p-3" placeholder="Need a specific deliveryday? Sending a gift? Let's say..."></textarea>
              </div>
              <div class="confirmation mb-lg-5 mb-3">
                  <div class="mb-4">
                      <div class="d-flex align-items-center justify-content-between">
                          <h2>Confirmation</h2>
                          <span class="step">Step 4 of 4</span>
                      </div>
                      <span class="sub-note">We are getting to the end. Just few clicks and your order is ready!</span>
                  </div>
                  <label class="container-filter d-flex align-items-center">
                      <span>I agree with our terms and conditions and privacy policy</span>
                      <input type="checkbox" name="term" checked="checked" required>
                      <span class="checkmark"></span>
                  </label>
              </div>
              <input type="submit" ng-click="orderSuccess()" data-bs-toggle="modal" data-bs-target="#OrderModal" value="Commplete Order" class="py-2 px-5 complete-order d-flex align-items-center justify-content-center" ng-disabled="myForm.uFirstName.$error.required || myForm.uemail.$error.required || myForm.uemail.$invalid || myForm.uAddr.$error.required || myForm.uAddr.$error.minlength || myForm.uLastName.$error.required || myForm.uPhone.$error.required || myForm.uPhone.$error.minlength || myForm.uPhone.$invalid">
          </form>
      </div>
  </div>
</section>
@endsection
