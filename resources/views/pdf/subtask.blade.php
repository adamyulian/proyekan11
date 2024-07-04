<!DOCTYPE html>
<html>
<head>
    <title>{{ ucfirst($subtask->name) }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        /* Import Roboto Slab font from Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap');

        .container {
            margin: 20px;
            position: relative; /* Ensure container is positioned */
        }
        .header, .content, .footer {
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .content table {
            width: 100%;
            border-collapse: collapse;
        }
        .content table, .content th, .content td {
            border: 1px solid black;
        }
        .content th, .content td {
            padding: 8px;
            text-align: left;
        }
        .content th {
            background-color: #f2f2f2;
        }
        .footer {
            text-align: right;
        }
        .watermark {
            position: absolute;
            top: 50%; /* Adjust positioning as needed */
            left: 50%; /* Adjust positioning as needed */
            transform: translate(-50%, -50%) rotate(-45deg); /* Rotate and center the watermark */
            font-size: 72px; /* Increase font size for larger watermark */
            color: rgba(0, 0, 0, 0.1); /* Adjust opacity and color */
            pointer-events: none; /* Ensure watermark doesn't interfere with clicks */
            z-index: -1; /* Ensure watermark is behind content */
            font-family: 'Roboto Slab', sans-serif; /* Use Roboto Slab font */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="header">
                    <h1>Informasi Sub Task </h1>
                    <p><strong>Name:</strong> {{ ucfirst($subtask->name) }}</p>
                    <p><strong>Unit:</strong> {{ $subtask->unit->name }}</p>
                    <p><strong>Description:</strong> {{ $subtask->description }}</p>
                    <p><strong>User:</strong> {{ $subtask->user->name }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="header">
                    @php
                        // Calculate total price based on components
                        $totalPrice = $subtask->components
                            ->sum(fn($component) => $component->pivot->coeff * $component->price);

                        // Format the subtask price
                        $formattedSubtaskPrice = number_format($totalPrice, 2);
                    @endphp
                    <p><strong>{{ ucfirst($subtask->name) }} Price:</strong> Rp. {{ $formattedSubtaskPrice }} / {{ $subtask->unit->name }}</p>
                </div>
            </div>
        </div>
        <div class="content">
            <h2>Rincian Sub Task</h2>
            <table>
                <thead>
                    <tr>
                        <th style="text-align: center;">Name</th>
                        <th style="text-align: center;">Coeff</th>
                        <th style="text-align: center;">Component Price</th>
                        <th style="text-align: center;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        // Group components by type
                        $componentsByType = $subtask->components->groupBy('type');
                        $grandTotal = 0;
                    @endphp

                    @foreach($componentsByType as $type => $components)
                        <tr>
                            <td colspan="4"><strong>{{ $type }}</strong></td>
                        </tr>

                        @php
                            $typeSubtotal = 0;
                        @endphp

                        @foreach($components as $component)
                            @php
                                $componentTotal = $component->pivot->coeff * $component->price;
                                $typeSubtotal += $componentTotal;
                            @endphp

                            <tr>
                                <td>{{ $component->name }}</td>
                                <td>{{ $component->pivot->coeff }}</td>
                                <td>{{ number_format($component->price, 2) }}</td>
                                <td>Rp. {{ number_format($componentTotal, 2) }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="3" style="text-align: right;"><strong>Subtotal {{ $type }}:</strong></td>
                            <td><strong>Rp. {{ number_format($typeSubtotal, 2) }}</strong></td>
                        </tr>

                        @php
                            $grandTotal += $typeSubtotal;
                        @endphp
                    @endforeach

                    <tr>
                        <td colspan="3" style="text-align: right;"><strong>Total Price:</strong></td>
                        <td><strong>Rp. {{ number_format($grandTotal, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
         <!-- Watermark -->
         <div class="watermark">
            www.proyekan.com
        </div>
    </div>
</body>
</html>
