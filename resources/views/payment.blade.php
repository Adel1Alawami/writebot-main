<head>

    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
</head>
  
<div>


    <form action="{{route('payment')}}" method="post">

        @csrf
    
        <input type="hidden" name="amount" id="" value="200">
    <button type="submit"> Payment Button </button>
    </form>
    
    

</div>

