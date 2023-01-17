@extends('layout.template')
@section('css', '/css/transactionhistory.css')
@section('title', 'Transaction History')

@section('content')
<div class="transaction-history-body-container">
    <div class="transaction-history-body-title p-4">
        <h1 class="ps-5">My Transaction History</h1>
    </div>

    @if($transactions->isEmpty())
        <h4 class="text-center">No Transaction</h4>
    @endif
    @foreach($transactions as $transaction)
        <div class="transaction-history-card mb-3">
            <div class="transaction-history-purchase-date">
                <p>Purchased <span class="text-danger">On: </span> {{ $transaction->created_at }}</p>
            </div>
            <div class="transaction-history-card-base">
                <div class="card-collection d-flex justify-content-center flex-wrap gap-3">
                    @foreach($transaction->transactionDetails as $transactionProduct)
                        <div class="card" style="width: 75rem;">
                            <div class="transaction-history-card-body p-4">
                                <div class="row">
                                    <div class="col transaction-history-card-rightside">
                                        <img src="{{Storage::url('/assets/'.$transactionProduct->product->image)}}" class="transaction-history-card-img-top" alt="" style="width: 30vw">
                                    </div>
                                    <div class="col transaction-history-card-leftside d-flex flex-column align-items-start m-auto">
                                        <p class="transaction-history-card-name">{{ $transactionProduct->product->name }}</p>
                                        <p class="transaction-history-card-quantity text-primary">Ticket(s) : {{ $transactionProduct->quantity }}</p>
                                        <p class="transaction-history-card-price" style="font-weight: 600; font-size: 16pt;">@currency($transactionProduct->product->price * $transactionProduct->quantity)</p>
                                        <p class="transaction-history-card-description">{{ $transactionProduct->product->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @php
                        $total = 0;
                        foreach ($transaction->transactionDetails as $transactionProduct){
                            $total += $transactionProduct->product->price*$transactionProduct->quantity;
                        }
                    @endphp

                </div>
                <div class="transaction-history-secondsection">
                    <p>Total Transaction Cost: <span class="text-danger" style="font-weight: 600;">@currency($total)</span></p>
                </div>
            </div>
        </div>
    @endforeach
</div>
<script>
    if({{ Session::has('alert') }}){
        alert('{{ Session::get('alert') }}');
    }
</script>
@endsection
