<!DOCTYPE html>
<html>
<head>
    <title>Feedback List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .page-header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }
        .page-number {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .generated-date {
            color: #666;
            margin-bottom: 20px;
        }
        .feedback-item {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            page-break-inside: avoid;
            border-radius: 5px;
        }
        .feedback-detail {
            margin-bottom: 8px;
            line-height: 1.6;
        }
        .feedback-label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }
        .print-button {
            text-align: center;
            margin: 20px 0;
        }
        .rating {
            color: #ffd700;
            margin-bottom: 10px;
        }
        @media print {
            .print-button {
                display: none !important;
            }
            body {
                margin: 0;
                padding: 15px;
            }
            .feedback-item {
                border: 1px solid #ddd;
                margin-bottom: 15px;
            }
            .page-header {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Feedback Report</h1>
        <div class="generated-date">Generated on {{ now()->format('F j, Y, g:i a') }}</div>
    </div>

    <div class="print-button">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="bi bi-printer me-2"></i>Print Feedback
        </button>
    </div>

    @foreach($feedbacks as $feedback)
    <div class="feedback-item">
        <div class="feedback-detail">
            <span class="feedback-label">Name:</span> {{ $feedback->nama }}
        </div>
        <div class="feedback-detail">
            <span class="feedback-label">Email:</span> {{ $feedback->email }}
        </div>
        <div class="feedback-detail">
            <span class="feedback-label">Date:</span> {{ $feedback->created_at->format('F j, Y') }}
        </div>
        <div class="feedback-detail">
            <span class="feedback-label">Time:</span> {{ $feedback->created_at->format('g:i a') }}
        </div>
        <div class="feedback-detail">
            <span class="feedback-label">Rating:</span> 
            <span class="rating">
                @for($i = 0; $i < $feedback->rating; $i++)
                    ★
                @endfor
                @for($i = $feedback->rating; $i < 5; $i++)
                    ☆
                @endfor
            </span>
        </div>
        <div class="feedback-detail">
            <span class="feedback-label">Message:</span> {{ $feedback->pesan }}
        </div>
        @if($feedback->reply)
        <div class="feedback-detail" style="margin-top: 15px; padding-top: 10px; border-top: 1px dashed #ddd;">
            <span class="feedback-label">Reply:</span> {{ $feedback->reply }}
            <div style="margin-left: 120px; font-size: 0.9em; color: #666;">
                Replied on: {{ \Carbon\Carbon::parse($feedback->replied_at)->format('F j, Y, g:i a') }}
            </div>
        </div>
        @endif
    </div>
    @endforeach

    <div class="page-footer" style="text-align: center; margin-top: 30px; font-size: 0.8em; color: #666;">
        End of Report
    </div>
</body>
</html> 