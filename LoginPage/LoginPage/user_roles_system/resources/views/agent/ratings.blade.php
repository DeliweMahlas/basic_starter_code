@extends('layouts')

@section('content')
    <div class="container">
        <h1>Ratings for Agent {{ $agent->name }}</h1>

        @if($ratings->isEmpty())
            <p>No ratings yet.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Review</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ratings as $rating)
                        <tr>
                            <td>{{ $rating->user->name }}</td>
                            <td>
                                <div class="star-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= $rating->rating ? 'selected' : '' }}">&starf;</span>
                                    @endfor
                                </div>
                            </td>
                            <td>{{ $rating->review }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
<style>/* Style for the star rating */
.star-rating {
    font-size: 24px;
    color: #ddd; /* Default star color */
    display: inline-block;
}

.star-rating .star {
    cursor: default;
    padding: 0 3px;
}

.star-rating .star.selected {
    color: #ffa500; /* Orange color for selected stars */
}

/* Table styling */
.table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

.table th, .table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f4f4f4;
}

.table tbody tr:hover {
    background-color: #f9f9f9;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-size: 28px;
    font-weight: bold;
}
</style>
