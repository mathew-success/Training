<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            [
                'name' => 'Task 1',
                'project_id' => 1
            ],
            [
                'name' => 'Task 2',
                'project_id' => 2
            ],
            [
                'name' => 'Task 3',
                'project_id' => 3
            ],
            [
                'name' => 'Task 4',
                'project_id' => 4
            ],
            [
                'name' => 'Task 5',
                'project_id' => 5
            ],
            [
                'name' => 'Task 6',
                'project_id' => 6
            ],
            [
                'name' => 'Task 7',
                'project_id' => 7
            ],
            [
                'name' => 'Task 8',
                'project_id' => 8
            ],
            [
                'name' => 'Task 9',
                'project_id' => 9
            ],
            [
                'name' => 'Task 10',
                'project_id' => 10
            ],
            [
                'name' => 'Task 11',
                'project_id' => 11
            ],
            [
                'name' => 'Task 12',
                'project_id' => 12
            ],
            [
                'name' => 'Task 13',
                'project_id' => 13
            ],
            [
                'name' => 'Task 14',
                'project_id' => 14
            ],
            [
                'name' => 'Task 15',
                'project_id' => 15
            ],
            [
                'name' => 'Task 16',
                'project_id' => 16
            ],
            [
                'name' => 'Task 17',
                'project_id' => 17
            ],
            [
                'name' => 'Task 18',
                'project_id' => 18
            ],
            [
                'name' => 'Task 19',
                'project_id' => 19
            ],
            [
                'name' => 'Task 20',
                'project_id' => 20
            ],
            [
                'name' => 'Task 21',
                'project_id' => 21
            ],
            [
                'name' => 'Task 22',
                'project_id' => 22
            ],
            [
                'name' => 'Task 23',
                'project_id' => 23
            ],
            [
                'name' => 'Task 24',
                'project_id' => 24
            ],
            [
                'name' => 'Task 25',
                'project_id' => 25
            ],
            [
                'name' => 'Task 26',
                'project_id' => 26
            ],
            [
                'name' => 'Task 27',
                'project_id' => 27
            ],
            [
                'name' => 'Task 28',
                'project_id' => 28
            ],
            [
                'name' => 'Task 29',
                'project_id' => 29
            ],
            [
                'name' => 'Task 30',
                'project_id' => 30
            ],
            [
                'name' => 'Task 31',
                'project_id' => 1
            ],
            [
                'name' => 'Task 32',
                'project_id' => 2
            ],
            [
                'name' => 'Task 33',
                'project_id' => 3
            ],
            [
                'name' => 'Task 34',
                'project_id' => 4
            ],
            [
                'name' => 'Task 35',
                'project_id' => 5
            ],
            [
                'name' => 'Task 36',
                'project_id' => 6
            ],
            [
                'name' => 'Task 37',
                'project_id' => 7
            ],
            [
                'name' => 'Task 38',
                'project_id' => 8
            ],
            [
                'name' => 'Task 39',
                'project_id' => 9
            ],
            [
                'name' => 'Task 40',
                'project_id' => 10
            ],
        ];

        Task::insert($tasks);
    }
}
