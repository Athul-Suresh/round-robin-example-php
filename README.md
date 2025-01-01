# Round Robin Task Assignment Function

This repository contains a simple PHP function to dynamically assign tasks to users using a round-robin algorithm. It is highly customizable and can handle any number of tasks and users.

---

## Features

- Dynamically generate tasks and users.
- Uses a round-robin algorithm for fair task distribution.
- Flexible and reusable function.
- Customizable task and user counts.

---

## Usage

### 1. Prerequisites
- PHP 7.4 or higher installed on your system.

### 2. Function
The main function is `assignTasks`. It dynamically generates tasks and users based on the input and assigns tasks to users using the round-robin method.

```php
function assignTasks($totalLeads, $totalUsers) {
    // Generate dynamic leads
    $tasks = [];
    for ($i = 1; $i <= $totalLeads; $i++) {
        $tasks[] = "lead-$i";
    }

    // Generate dynamic users
    $assignUsers = [];
    for ($i = 1; $i <= $totalUsers; $i++) {
        $assignUsers[] = "user$i";
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
```

### 3. Example Usage
```php
$totalLeads = 12; // Number of leads
$totalUsers = 5;  // Number of users

$assignments = assignTasks($totalLeads, $totalUsers);

// Display the results
echo "Task Assignments:\n";
foreach ($assignments as $assignment) {
    echo "Task: {$assignment['task']} -> User: {$assignment['user']}\n";
}
```

### 4. Example Output
For `12 leads` and `5 users`:
```
Task Assignments:
Task: lead-1 -> User: user1
Task: lead-2 -> User: user2
Task: lead-3 -> User: user3
Task: lead-4 -> User: user4
Task: lead-5 -> User: user5
Task: lead-6 -> User: user1
Task: lead-7 -> User: user2
Task: lead-8 -> User: user3
Task: lead-9 -> User: user4
Task: lead-10 -> User: user5
Task: lead-11 -> User: user1
Task: lead-12 -> User: user2
```

---

## How It Works

1. **Dynamic Task and User Generation**:
   - Tasks are generated as `lead-1`, `lead-2`, ..., `lead-N`.
   - Users are generated as `user1`, `user2`, ..., `userN`.

2. **Round Robin Logic**:
   - The modulus operator (`%`) ensures tasks are assigned in a cyclic manner to users.

3. **Output**:
   - The function returns an array containing task-user mappings.

---

## Contributing

Feel free to fork the repository and submit pull requests for improvements or additional features.

---

## License

This project is licensed under the MIT License. See the LICENSE file for details.

