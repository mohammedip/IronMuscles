<div class="grid grid-cols-5 gap-4 mb-6">
    <div class="bg-gray-800 p-4 rounded">
        <h3 class="text-lg">Adhérents</h3>
        <p class="text-2xl font-bold">{{$adherentCount}}</p>
    </div>
    <div class="bg-gray-800 p-4 rounded">
        <h3 class="text-lg">Abonnements Actifs</h3>
        <p class="text-2xl font-bold">{{$activeAbonnementsCount}}</p>
    </div>
    <div class="bg-gray-800 p-4 rounded">
        <h3 class="text-lg">Cours Aujourd'hui</h3>
        <p class="text-2xl font-bold">{{$totalTodayTraining}}</p>
    </div>
    <div class="bg-gray-800 p-4 rounded">
        <h3 class="text-lg">Machines en Maintenance</h3>
        <p class="text-2xl font-bold">{{$en_maintenance_machine}}</p>
    </div>
    <div class="bg-gray-800 p-4 rounded">
        <h3 class="text-lg">Monthly Revenue:</h3>
        <p class="text-2xl font-bold">{{$totalAmount}}</p>
    </div>
</div>
