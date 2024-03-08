@extends('header')
<body>

<h1>Invoice</h1>
<img src='' class='invoice-icon' alt='Invoice icon'>
<p><span class='label'>Billed to:</span> ${{ $name }}</p>
<p><span class='label'>Subtotal:</span> ${{ $price }}</p>
<p><span class='label'>Tax:</span> ${{ $position }}</p>
<p><span class='label'>Total:</span> ${{ $eventName }}</p>
<p><span class='label'>Total:</span> ${{ $eventDescription }}</p>
<p><span class='label'>Total:</span> ${{ $eventData }}</p>


</body>
