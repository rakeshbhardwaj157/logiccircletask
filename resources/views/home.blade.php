@extends('layout.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Products Subscriptions') }}</div>

                <div class="card-body">
                    @if (count($userSubscriptions) > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Added On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach($userSubscriptions as $subscriptionData)
                                    <tr>
                                        <td>{{ $counter }}</td>
                                        <td>{{ $subscriptionData->product->title }}</td>
                                        <td>{{ $subscriptionData->product->price }}</td>
                                        <td>{{ $subscriptionData->created_at }}</td>
                                    </tr>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
                          </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
