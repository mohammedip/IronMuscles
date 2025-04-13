@extends('layouts.app')

@section('title', 'Planning')

@section('header', 'Planning des Cours')

@section('content')
    <!-- Include FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }

        .calendar-container {
            background: linear-gradient(135deg, #1E293B, #111827);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.3);
        }

        #calendar {
            background-color: #1F2937;
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.3);
        }

        .fc-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
        }

        /* Space between Mois | Semaine | Jour */
        .fc-toolbar-chunk:nth-child(3) {
            margin-left: 20px;
        }

        /* Space between "Aujourd'hui" and navigation buttons */
        .fc-toolbar-chunk:nth-child(1) {
            display: flex;
            gap: 15px;
        }

        .fc-toolbar-title {
            font-size: 24px !important;
            font-weight: bold;
            color: #60A5FA;
        }

        .fc-daygrid-day-number {
            color: #9CA3AF !important;
        }

        .fc-event {
            border-radius: 8px !important;
            transition: all 0.3s ease-in-out;
        }

        .fc-event:hover {
            transform: scale(1.05);
            background-color: #3B82F6 !important;
            color: white !important;
        }

        .fc-button {
            background-color: #3B82F6 !important;
            border: none !important;
            padding: 10px 15px !important;
            border-radius: 8px !important;
            transition: all 0.3s ease-in-out;
        }

        .fc-col-header {
            background-color: #1E293B !important; /* Dark background */
            color: #ffffff !important; /* White text */
        }

        /* Ensure day names (Lundi, Mardi, etc.) are visible */
        .fc-col-header-cell {
            font-size: 16px;
            font-weight: bold;
            padding: 12px;
            text-transform: capitalize; /* Keep first letter capitalized */
        }

        /* Border and spacing for better visibility */
        .fc-col-header-cell-cushion {
            color: #ffffff !important; /* Ensure text remains visible */
            padding: 10px;
            border-bottom: 2px solid #3B82F6; /* Add a subtle blue underline */
        }

        .fc-daygrid-event {
            cursor: pointer !important;
        }

        .fc-button:hover {
            background-color: #2563EB !important;
        }
    </style>

    <!-- Calendar Container -->
    <div class="calendar-container mx-auto max-w-5xl mt-10 p-6">
        <h3 class="text-3xl font-extrabold text-center text-gray-200 mb-6">📅 Mon Planning d'Entraînement</h3>
        <div id="calendar"></div>
    </div>

    <!-- Include FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/fr.js"></script>

    @section('planningScript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', 
            locale: 'fr',
            themeSystem: 'bootstrap',
            height: "auto",
            nowIndicator: true,
            headerToolbar: {
                right: 'prev today next', 
                center: 'title',
                left: '',
            },
            events: "{{ route('planning.events') }}",
            eventColor: '#3B82F6',
            eventTextColor: '#ffffff',
            eventDisplay: 'block',
            eventClick: function(info) {
                let eventData = info.event.extendedProps; 
                alert("Cours: " + eventData.programme + " - " + eventData.coach + "\nDébut: " + info.event.start.toLocaleString());
            }
        });

        calendar.render();

        });
    </script>
    @endsection
@endsection
