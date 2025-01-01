<?php
function assignTasks($totalLeads, $totalUsers) {
    // Generate dynamic leads
    $tasks = [];
    for ($i = 1; $i <= $totalLeads; $i++) {
        $tasks[] = "lead-$i";
    }

    // Generate dynamic users
    $assignUsers = [];
    for ($i = 1; $i <= $totalUsers; $i++) {
        $assignUsers[] = "user-$i";
    }

    // Calculate task assignments
    $userCount = count($assignUsers);
    $taskAssignments = [];

    foreach ($tasks as $index => $task) {
        $assignedUserId = $assignUsers[$index % $userCount];
        $taskAssignments[] = [
            'task' => $task,
            'user' => $assignedUserId,
        ];
    }

    return $taskAssignments;
}




$totalLeads = 2; 
$totalUsers = 2; 

$assignments = assignTasks($totalLeads, $totalUsers);

// Display the results
echo "Task Assignments:\n";
foreach ($assignments as $assignment) {
    echo "{$assignment['task']} ===> {$assignment['user']}\n";
}
