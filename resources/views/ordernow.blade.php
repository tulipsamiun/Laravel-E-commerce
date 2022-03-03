@extends('master')
@section('content')
<div class="custom-prduct">
    <div class="col-sm-10">
    <table class="table">
    <tbody>
      <tr>
        <td>Amount</td>
        <td>$ {{$total}}</td>
      </tr>
      <tr>
        <td>Tax</td>
        <td>$ 0</td>
       </tr>
      <tr>
        <td>Delivery Charge</td>
        <td>$ 10</d>
      </tr>
      <tr>
        <td>Total Amount</td>
        <td>$ {{$total +10}}</td>
      </tr>
    </tbody>
  </table>
  <div>
  <form action="/orderplace" method="post">
      @csrf
  <div class="form-group">
    <textarea name="address" placeholder="Enter Your Address" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="pwd">Payment Method: </label>
    <label class="radio-inline">
        <input type="radio" class="radio-inline"  value ="cash" name="payment_method" checked>Online Payment
    </label>
    <label class="radio-inline">
        <input type="radio" name="payment_method" class="radio-inline" value ="cash">EMI Payment
    </label>
    <label class="radio-inline">
        <input type="radio" name="payment_method" class="radio-inline" value ="cash">Payment On Deliver
    </label>

  </div>
  <button type="submit" class="btn">Order Now</button>
</form> 
  </div>
    </div>
</div>
@endsection